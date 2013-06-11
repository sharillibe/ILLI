<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Util\Html\Attributes;
	USE ILLI\Core\Util\Html\ElementContent;
	USE ILLI\Core\Util\Inflector;
	USE ILLI\Core\Util\String;
	USE ILLI\Core\Util\Spl;
	
	CLASS Element
	{
		CONST ns	= NULL;
		CONST name	= 'stub';
		CONST close	= TRUE;
		
		/**
		 * ADT __type_Element::content
		 *
		 * @var array
		 * @see ILLI\Core\Util\Html\__type_Element
		 * @see	ILLI\Core\Std\Def\ADV::define()
		 */
		protected static $__tContent	= ['\ILLI\Core\Util\Html\Element'];
		
		/**
		 * ADT __type_Element::parent
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
		 *		Name EXTENDS Element
		 *		__type_AttributesName EXTENDS __type_Attributes
		 *
		 *	optional (bypass ADV internal GC):
		 *		ElementContentName EXTENDS ElementContent
		 *		__type_ElementName EXTENDS __type_Element
		 *
		 *	usage:
		 *	 	$a = new Select;
		 *	 	$a->attribute->cssClass = (array) 'my';
		 *	 	$a->attribute->required = TRUE;
		 *	 		$g = new Optgroup;
		 *	 		$g->attribute->label = 'foobar';
		 *	 			$o1 = new Option;
		 *	 			$o1->attribute->value = 'foo';
		 *	 			$o1->attribute->label = 'foo';
		 *	 			$o1->content[] = 'foo';
		 *	 		$g->content[] = $o1;
		 *	 	$a->content[] = $g;
		 *	 		$o2 = new Option;
		 *	 		$o2->attribute->value = 'bar';
		 *	 		$o2->attribute->label = 'bar';
		 *	 		$o2->content[] = 'bar';
		 *	 	$a->content[] = $o2;
		 *
		 *		$a->content[] = new P; // error
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
		 * @fixed transparent model
		 *		For instance, an ins element inside a ruby element cannot contain an rt element,
		 *		because the part of the ruby element's content model that allows ins elements
		 *		is the part that allows phrasing content, and the rt element is not phrasing content.
		 *
		 * 		via http://developers.whatwg.org/content-models.html#transparent
		 *
		 *		tmp fix: use $__tContent[IContent] instead of $__tContent[IContent\ITransparent]
		 */
		public function __construct(array $__content = [], array $__attributes = [])
		{
			static $inv;
			
			isset($inv) ?: $inv = function($__baseNs, $__base, $__typeNs, $__type, $__args = [])
			{
				$pattern	= 'NAMESPACE {:typeNs}; CLASS {:type} EXTENDS \{:baseNs}\{:base} {}';
				$load		= $__typeNs.'\\'.$__type;
				
				if(FALSE === class_exists($load, TRUE))
					#! performance: use ADV static GC; create a sub class for each element
					#+ @see ILLI\Core\Std\Def\ADV::__GC
					eval(String::insert($pattern,
					[
						'typeNs'	=> $__typeNs,
						'baseNs'	=> $__baseNs,
						'type'		=> $__type,
						'base'		=> $__base
					]));
				
				return Invoke::emitClass($load, $__args);
			};
			
			#~ define __type_Element
			$this->__Element = $inv #! invoke virtual .\__type_Element as .\Element\__type_{:type}Element
			(
				__NAMESPACE__,
				'__type_Element',
				__CLASS__,
				String::insert('__type_{:type}Element', ['type' => $type = Inflector::camelize(static::name)]),
				#~ __type_Element args:
				[
					#+ __type_Element ADT
					[
						__type_Element::parent		=> static::$__tParent,
						__type_Element::attribute	=> get_class($attr = $inv #! invoke virtual .\__type_Attributes as .\Element\__type_{:type}
						(
							__NAMESPACE__,
							'__type_Attributes',
							__CLASS__,
							String::insert('__type_{:type}', ['type' => $type])
						)),
						__type_Element::wai		=> get_class($wai = $inv #! invoke virtual .\__type_WAI as .\Element\__type_{:type}WAI
						(
							__NAMESPACE__,
							'__type_WAI',
							__CLASS__,
							String::insert('__type_{:type}WAI', ['type' => $type])
						))
					],
					#+ __type_Element setup
					[
						__type_Element::ns		=> static::ns,
						__type_Element::name		=> static::name,
						__type_Element::close		=> static::close,
						__type_Element::parent		=> NULL,
						__type_Element::attribute	=> $attr,
						__type_Element::wai		=> $wai,
						__type_Element::content		=> $inv #! invoke virtual .\ElementContent as .\Element\{:type}Content
						(
							__NAMESPACE__,
							'ElementContent',
							__CLASS__,
							String::insert('{:type}Content', ['type' => $type]),
							#~ ElementContent args:
							[
								#+ ElementContent ADT
									static::$__tContent,
									
								#+ ElementContent setup
									$__content
							]
						)
					]
				]
			);
		}
		
		public function attr($__name, $__value = NULL)
		{
			is_array($__name)
				? array_walk($__name, function(&$v, $k) { $this->__Element->get()[__type_Element::attribute]->$k = $v; })
				: $this->__Element->get()[__type_Element::attribute]->$__name = $__value;
			
			return $this;
		}
		
		public function wai($__name, $__value = NULL)
		{
			is_array($__name)
				? array_walk($__name, function(&$v, $k) { $this->__Element->get()[__type_Element::wai]->$k = $v; })
				: $this->__Element->get()[__type_Element::wai]->$__name = $__value;
			
			return $this;
		}
		
		public function content($__value)
		{
			is_array($__value) ?: $__value = [$__value];
			$this->__Element->get()[__type_Element::content]->set($__value);
			array_map(function($v){ FALSE === $v instanceOf Element ?: $v->__Element->parent = $this; }, $__value);
			return $this;
		}
		
		public function append($__value)
		{
			is_array($__value) ?: $__value = [$__value];
			$this->__Element->get()[__type_Element::content]->set(array_merge($this->__Element->get()[__type_Element::content]->get(), $__value));
			array_map(function($v){ FALSE === $v instanceOf Element ?: $v->__Element->parent = $this; }, $__value);
			return $this;
		}
		
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
			endswitch;
		}
		
		/**
		 * convert element to string (magic)
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
		
		public static function create($__name, $__content = [], $__attributes = [])
		{
			static $__STATIC_c;
			
			isset($__STATIC_c) ?: $__STATIC_c = [];
			
			$t = strtolower($__name);
			$c = &$__STATIC_c[$t];
			
			isset($c) ?: $c = __CLASS__.'\\DOM'.$t;
			return new $c($__content, $__attributes);
		}
	}