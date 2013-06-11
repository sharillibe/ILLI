<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Std\Spl\FsbCollection;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Util\Html\Attributes;
	USE ILLI\Core\Util\Html\ElementContent;
	USE ILLI\Core\Util\Inflector;
	USE ILLI\Core\Util\String;
	USE ILLI\Core\Util\Spl;
	
	CLASS Element
	{
		CONST COPY_NS		= 0b0001;
		CONST COPY_ATTR		= 0b0010;
		CONST COPY_WAI		= 0b0100;
		CONST COPY_CONTENT	= 0b1000;
		
		/**
		 * element inherit config: namespace
		 */
		CONST ns		= NULL;
		
		/**
		 * element inherit config: name
		 */
		CONST name		= 'stub';
		
		/**
		 * element inherit config: tag close
		 */
		CONST close		= TRUE;
		
		/**
		 * element inherit config: default copy flag
		 */
		CONST copy		= 0b1111;
		
		/**
		 * element setup cache
		 *	[get_called_class() => [
		 *		<string>ns			=> NULL,
		 *		<string>name			=> DOM{:nodename}::name,
		 *		<bool>close			=> DOM{:nodename}::close,
		 *		<Element>parent			=> NULL,
		 *		<class>Content			=> ILLI\Core\Util\Html\Element\{:Nodename}Content,
		 *		<class>__type_Attributes	=> ILLI\Core\Util\Html\Element\__type_{:Nodename},
		 *		<class>__type_WAI		=> ILLI\Core\Util\Html\Element\__type_{:Nodename}WAI,
		 *	]]
		 *
		 * @see ::__construct()
		 * @see ::__clone()
		 * @see ::copy()
		 */
		private static $__GC		= [];
		
		/**
		 * ADT __type_Element::content
		 *
		 * declaration of acceptable content
		 *
		 * @var array
		 * @see ILLI\Core\Util\Html\__type_Element
		 * @see	ILLI\Core\Std\Def\ADV::define()
		 */
		protected static $__tContent	= ['\ILLI\Core\Util\Html\Element'];
		
		/**
		 * ADT __type_Element::parent
		 *
		 * declaration of acceptable parent
		 *
		 * @var array
		 * @see ILLI\Core\Util\Html\__type_Element
		 * @see	ILLI\Core\Std\Def\ADV::define()
		 */
		protected static $__tParent	= ['\ILLI\Core\Util\Html\Element'];
		
		/**
		 * dom node patterns
		 *
		 * @var array
		 * @see ILLI\Core\Util\Html\__type_Element::close
		 * @see ILLI\Core\Util\String::insert()
		 */
		protected static $__template =
		[
			0 => '<{:ns}{:name}{:wai}{:attributes} />',
			1 => '<{:ns}{:name}{:wai}{:attributes}>{:content}</{:ns}{:name}>'
		];
		
		/**
		 * element def
		 *
		 * @var __type_Element
		 */
		protected $__Element = NULL;
		
		/**
		 * Instantiate a new HTML Element
		 *
		 *	required:
		 *		DOM{:nodename} EXTENDS Element
		 *		__type_{:Nodename} EXTENDS __type_Attributes
		 *		__type_{:Nodename}WAI EXTENDS __type_WAI
		 *
		 *	extend element GC:
		 *		{:nodename}Content EXTENDS ElementContent
		 *		__type_{:nodename}Element EXTENDS __type_Element
		 *
		 *	basic:
		 *		print Element::create('span', 'text', ['class' => ['icon', 'foo'], 'id' => 'test']);
		 *			// <span class="icon foo" id="test">text</span>
		 *
		 *	usage:
		 *		print Element::create('a')
		 *			->attr('href', 'http://google.de')
		 *			->attr('id', 'google-link')
		 *			->wai('role', 'button')
		 *			->content(Element::create('span')->content('link'));
		 *			// <a role="button" id="google-link" href="http://google.de"><span>link</span></a>
		 *
		 * @see		ILLI\Core\Util\Html\__type_Element::__construct()
		 * @see		ILLI\Core\Util\Html\__type_Attributes::__construct()
		 * @see		ILLI\Core\Util\Html\__ElementContent::__construct()
		 *
		 *
		 * @todo parentExclude/contentExclude:
		 *		article implements iFlow
		 *		address content iFlow exclude 'article'...
		 *
		 *		-> address content:	permitted iFlow with no iSectioning/iHeading
		 *		-> article parent:	permitted iFlow, must not be a descendant of an 'address'
		 *
		 * @todo schema attr ns
		 *
		 * @todo adaptable types
		 *
		 * @todo transparent model
		 *		For instance, an ins element inside a ruby element cannot contain an rt element,
		 *		because the part of the ruby element's content model that allows ins elements
		 *		is the part that allows phrasing content, and the rt element is not phrasing content.
		 *
		 * 		via http://developers.whatwg.org/content-models.html#transparent
		 *
		 *		tmp fix: use $__tContent[IContent] instead of $__tContent[IContent\ITransparent]
		 */
		public function __construct($__content = [], array $__attributes = [])
		{
			static $__STATIC_createMock;
			
			isset($__STATIC_createMock) ?: $__STATIC_createMock = function($__baseNs, $__base, $__typeNs, $__type)
			{
				#! performance: use ADV::$__GC; create a sub class for each element
				#+ @see ILLI\Core\Std\Def\ADV::__GC
				
				$pattern	= 'NAMESPACE {:typeNs}; CLASS {:type} EXTENDS \{:baseNs}\{:base} {}';
				$load		= $__typeNs.'\\'.$__type;
				
				if(FALSE === class_exists($load, TRUE))
					eval(String::insert($pattern,
					[
						'typeNs'	=> $__typeNs,
						'baseNs'	=> $__baseNs,
						'type'		=> $__type,
						'base'		=> $__base
					]));
				
				return $load;
			};
			
			
			$t	= &self::$__GC[get_called_class()];
			$type	= Inflector::camelize(static::name);
			
			isset($t) ?: $t = 
			[
				#! static ADVArrayStrict::$__GC: .\ElementContent as .\Element\{:type}Content
				__type_Element::content		=> $__STATIC_createMock(__NAMESPACE__, 'ElementContent', __CLASS__, String::insert('{:type}Content', ['type' => $type])),
				
				#! static ADVTuple::$__GC: .\__type_Attributes as .\Element\__type_{:type}
				__type_Element::attribute	=> $__STATIC_createMock(__NAMESPACE__, '__type_Attributes', __CLASS__, String::insert('__type_{:type}', ['type' => $type])),
				
				#! static ADVTuple::$__GC: .\__type_WAI as .\Element\__type_{:type}WAI
				__type_Element::wai		=> $__STATIC_createMock(__NAMESPACE__, '__type_WAI', __CLASS__, String::insert('__type_{:type}WAI', ['type' => $type])),
			];
			
			#~ define __type_Element
			$this->__Element = Invoke::emitClass
			(
				#! static ADVTuple::$__GC: .\__type_Element as .\Element\__type_{:type}Element
				$__STATIC_createMock(__NAMESPACE__, '__type_Element', __CLASS__, String::insert('__type_{:type}Element', ['type' => $type])),
				#! setup __type_Element
				[
					#+ extend .\__type_Element ADT,
						[
							#! extend ADT::parent via ::$__tParent
							__type_Element::parent		=> static::$__tParent,
							#! extend ADT::attribute with virtual class .\Element\__type_{:type}
							__type_Element::attribute	=> $t[__type_Element::attribute],
							#! extend ADT::wai with virtual class .\Element\__type_{:type}WAI
							__type_Element::wai		=> $t[__type_Element::wai]
						],
					#+ .\__type_Element initial data
						[
							#~ invoke node attribute Tuple: .\Element\__type_{:type}
							__type_Element::attribute	=> Invoke::emitClass($t[__type_Element::attribute]),
							#~ invoke node wai Tuple: .\Element\__type_{:type}WAI
							__type_Element::wai		=> Invoke::emitClass($t[__type_Element::wai]),
							#~ invoke node content StrictArray: .\Element\{:type}Content
							#! extend .\Element\{:type}Content ADT via ::$__tContent; set initial data via $__content
							__type_Element::content		=> Invoke::emitClass($t[__type_Element::content], [static::$__tContent]),
						]
						#! use element defaults: ns, name, close, parent
						+
						[
							__type_Element::ns		=> static::ns,
							__type_Element::name		=> static::name,
							__type_Element::close		=> static::close,
							__type_Element::copy		=> static::copy,
							__type_Element::parent		=> NULL
						]
				]
			);
			
			$this->content($__content)->attr($__attributes);
			var_dump($t);
		}
		
		/**
		 * copy element including content, wai, attributes
		 *
		 *	$a = Element::create('a')->attr('href', 'http://google.de')->attr('id', 'google-link')->wai('role', 'button')
		 *		->content($span = Element::create('span')->content('link'));
		 *
		 *	$copy = $a->copy(Element::COPY_WAI | Element::COPY_CONTENT);
		 *
		 *	$span->content = 'Gooooooooooooooogle';
		 *
		 *	var_dump($a->render(), $copy->render());
		 *		string(94) "<a role="button" id="google-link" href="http://google.de"><span>Gooooooooooooooogle</span></a>"
		 *		string(38) "<a role="button"><span>link</span></a>"
		 *
		 * @param	long	$__flag	subjects to clone
		 * @see		::COPY_ATTR
		 * @see		::COPY_WAI
		 * @see		::COPY_CONTENT
		 */
		public function copy($__flag = NULL)
		{
			static $__STATIC_map;
			
			isset($__STATIC_map) ?: $__STATIC_map = function($__value)
			{
				return is_object($__value) ? clone $__value : $__value;
			};
			
			$t	= &self::$__GC[get_called_class()];
			$Copy	= new $this;
			
			NULL === $__flag ?: $__flag = static::copy;
			
			$Copy->__Element = new $this->__Element
			(
				#! copy ADT attribute/wai/content (late state setup)
				#+ @see __type_Element::__construct()
				$this->__Element->getTupleGC([__type_Element::parent, __type_Element::attribute, __type_Element::wai]),
				#! clone or create empty __type_Element sub tuple
				[
					__type_Element::ns		=> self::COPY_NS === ($__flag & self::COPY_NS) ? $this->__Element->get()[__type_Element::ns] : NULL,
					__type_Element::attribute	=> self::COPY_ATTR === ($__flag & self::COPY_ATTR) ? clone $this->__Element->get()[__type_Element::attribute] : Invoke::emitClass($t[__type_Element::attribute]),
					__type_Element::wai		=> self::COPY_WAI === ($__flag & self::COPY_WAI) ? clone $this->__Element->get()[__type_Element::wai] : Invoke::emitClass($t[__type_Element::wai]),
					__type_Element::content		=> Invoke::emitClass($t[__type_Element::content], [static::$__tContent, self::COPY_CONTENT === ($__flag & self::COPY_CONTENT) ? FsbCollection::fromArray($this->__Element->get()[__type_Element::content]->get())->map($__STATIC_map, ['collect' => FALSE]) : []])
					
				]
				#! use element defaults: name, close, parent
				+
				[
					__type_Element::name		=> static::name,
					__type_Element::close		=> static::close,
					__type_Element::copy		=> static::copy,
					__type_Element::parent		=> NULL
				]
			);
			
			return $Copy;
		}
		
		/**
		 * clone element including ns, content, attributes, wai
		 *
		 * @see ::copy()
		 */
		public function __clone()
		{
			$this->__Element = $this->copy(static::copy)->__Element;
		}
		
		/**
		 * seed attributes or set attribute
		 *
		 * @param	array $__name	attributes [name => value]
		 * @param	string $__name	attribute name
		 * @param	string $__value	attribute value
		 */
		public function attr($__name, $__value = NULL)
		{
			is_array($__name)
				? array_walk($__name, function(&$v, $k) { $this->__Element->get()[__type_Element::attribute]->$k = $v; })
				: $this->__Element->get()[__type_Element::attribute]->$__name = $__value;
			
			return $this;
		}
		
		/**
		 * seed wai or set wai
		 *
		 * @param	array $__name	wai [name => value]
		 * @param	string $__name	wai name
		 * @param	string $__value	wai value
		 */
		public function wai($__name, $__value = NULL)
		{
			is_array($__name)
				? array_walk($__name, function(&$v, $k) { $this->__Element->get()[__type_Element::wai]->$k = $v; })
				: $this->__Element->get()[__type_Element::wai]->$__name = $__value;
			
			return $this;
		}
		
		/**
		 * seed wai or set wai
		 *
		 * @param	Element $__value	type defined in ::$__tContent
		 * @param	string	$__value	when defined in ::$__tContent
		 */
		public function content($__value)
		{
			is_array($__value) ?: $__value = [$__value];
			$this->__Element->get()[__type_Element::content]->set($__value);
			array_map(function($v){ FALSE === $v instanceOf Element ?: $v->__Element->parent = $this; }, $__value);
			return $this;
		}
		
		/**
		 *	usage:
		 *		$div = Element::create('div')
		 *			->attr('id', 'outer')
		 *			->content(Element::create('div')->attr('id', 'inner'));
		 *			// <div id="outer"><div id="inner"></div></div>
		 *
		 *		$div->wrapAll(Element::create('div')->attr('id', 'container'));
		 *			// <div id="outer"><div id="container"><div id="inner"></div></div></div>
		 *
		 *	@param 	string	$__value	create new Element <$__value />
		 *	@param 	Element	$__value	use Element <Element::name />.
		 *	@param 	$this	$__value	clone current Instance <$this::name />.
		 *	@return	$this
		 */
		public function wrapAll($__value)
		{
			if(is_string($__value))
			{
				$__value = $this->create($__value);
			}
			else
			if(FALSE === $__value instanceOf Element)
			{
				$__value = $this;
			}
			
			if($__value === $this)
				$__value = clone $this;
			
			$this->content($__value->content($this->__Element->get()[__type_Element::content]->get()));
			
			return $this;
		}
		
		/**
		 *	append element content
		 *
		 *	@param 	mixed	$__value	defined in ::$__tContent
		 *	@param 	array	$__value	an array of content elements; type defined in ::$__tContent
		 *	@return	$this
		 */
		public function append($__value)
		{
			is_array($__value) ?: $__value = [$__value];
			$this->__Element->get()[__type_Element::content]->set(array_merge($this->__Element->get()[__type_Element::content]->get(), $__value));
			array_map(function($v){ FALSE === $v instanceOf Element ?: $v->__Element->parent = $this; }, $__value);
			return $this;
		}
		
		/**
		 *	prepend element content
		 *
		 *	@param 	mixed	$__value	defined in ::$__tContent
		 *	@param 	array	$__value	an array of content elements; type defined in ::$__tContent
		 *	@return	$this
		 */
		public function prepend($__value)
		{
			is_array($__value) ?: $__value = [$__value];
			$this->__Element->get()[__type_Element::content]->set(array_merge($__value, $this->__Element->get()[__type_Element::content]->get()));
			array_map(function($v){ FALSE === $v instanceOf Element ?: $v->__Element->parent = $this; }, $__value);
			return $this;
		}
		
		/**
		 * direct access read by constant name
		 *
		 * @read	ILLI\Core\Util\Html\__type_Element::attribute
		 * @read	ILLI\Core\Util\Html\__type_Element::wai
		 * @read	ILLI\Core\Util\Html\__type_Element::close
		 * @read	ILLI\Core\Util\Html\__type_Element::content
		 * @read	ILLI\Core\Util\Html\__type_Element::name
		 * @read	ILLI\Core\Util\Html\__type_Element::ns
		 * @read	ILLI\Core\Util\Html\__type_Element::parent
		 * @param 	string 	$__constantName		constant with defined tuple index
		 * @return	mixed	type based on ADT
		 */
		public function __get($__constantName)
		{
			$t = $this->__Element->get();
			return $t[constant(Spl::inspectableConstant(get_class($this->__Element), $__constantName))];
		}
		
		/**
		 * direct access write by constant name;
		 *
		 * alias ::attr(), ::wai(), ::content():
		 *
		 *	$l->attribute		= ['id' => 'yolo']; 	-> $l->attr(['id' => 'yolo']);
		 *	$l->attribute->id	= 'yolo2';		-> $l->attr('id', 'yolo2');
		 *
		 * @write	ILLI\Core\Util\Html\__type_Element::ns
		 * @write	ILLI\Core\Util\Html\__type_Element::content
		 * @write	ILLI\Core\Util\Html\__type_Element::attribute
		 * @write	ILLI\Core\Util\Html\__type_Element::wai
		 * @param 	string 	$__constantName		constant with defined tuple index
		 * @param	mixed	$__value		type based on ADT
		 * @see		ILLI\Core\Util\Html\__type_Element::content
		 */
		public function __set($__constantName, $__value)
		{
			switch(constant(Spl::inspectableConstant(get_class($this->__Element), $__constantName))):
				case __type_Element::content:	return $this->content($__value);
				case __type_Element::attribute:	return $this->attr($__value);
				case __type_Element::wai:	return $this->wai($__value);
				case __type_Element::ns:	$this->__Element->get()[__type_Element::ns] = $__value; break;
			endswitch;
		}
		
		/**
		 * convert element to string
		 *
		 * @return string DOM node
		 * @see ::render()
		 */
		public function __toString()
		{
			return (string) $this->render();
		}
		
		/**
		 * convert element to string
		 *
		 * @return string DOM node
		 */
		public function render()
		{
			$t = $this->__Element->get();
			$r = $t[__type_Element::content] instanceOf ElementContent ? $t[__type_Element::content]->render() : NULL;
			$a = $t[__type_Element::attribute]->render();
			$w = $t[__type_Element::wai]->render();
			$n = $t[__type_Element::ns];
			
			return String::insert
			(
				static::$__template[NULL === $r && FALSE === $t[__type_Element::close] ? 0 : 1],
				[
					'ns'		=> NULL === $n ? '' : $n.':',
					'name'		=> $t[__type_Element::name],
					'content'	=> $r,
					'attributes'	=> NULL === $a ? '' : ' '.$a,
					'wai'		=> NULL === $w ? '' : ' '.$w
				]);
		}
		
		/**
		 * create new element
		 *
		 * @param 	mixed	$__value	defined in ::$__tContent
		 * @param 	array	$__value	an array of content elements; type defined in ::$__tContent
		 * @return	Element
		 */
		public static function create($__name, $__content = [], $__attributes = [])
		{
			static $__STATIC_c;
			
			isset($__STATIC_c) ?: $__STATIC_c = [];
			
			$t = strtolower($__name);
			$c = &$__STATIC_c[$t];
			
			return Invoke::emitClass(isset($c) ? $c : $c = __CLASS__.'\\DOM'.$t, [$__content, $__attributes]);
		}
	}