<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Exception;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\__const_ADVClass;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Std\Exception\ClassNotFoundException;
	USE ILLI\Core\Util\String;
	USE ILLI\Core\Util\Inflector;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Util\Html\Attributes;
	USE ILLI\Core\Util\Html\ElementContent;
	
	/**
	 * @todo parentExclude/contentExclude:
	 *		article implements iFlow
	 *		address content iFlow exclude 'article'...
	 *
	 *		-> address content:	permitted iFlow with no iSectioning/iHeading
	 *		-> article parent:	permitted iFlow, must not be a descendant of an 'address'
	 */
	CLASS Element
	{
		CONST content	= __type_Element::content;
		
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
			0 => '<{:ns}{:name}{:attributes} />',
			1 => '<{:ns}{:name}{:attributes}>{:content}</{:ns}{:name}>'
		];
		
		/**
		 * element def
		 *
		 * @var __type_Element
		 */
		protected $__Type = NULL;
		
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
		 * :gcType<string>
		 *	a valid __const_Type
		 *
		 * @param	array	$__defineOffsetType	[{:offset} => {:gcType}]
	 	 * @param	array	$__data			the initial data [{:offset} => {:gcValue}]
		 * @see		ILLI\Core\Util\Html\__type_Element::__construct()
		 * @see		ILLI\Core\Util\Html\__type_Attributes::__construct()
		 * @see		ILLI\Core\Util\Html\__ElementContent::__construct()
		 */
		public function __construct($__defineOffsetType = [], $__data = [])
		{
			static $inv;
			
			isset($inv) ?: $inv = function($__baseNs, $__base, $__typeNs, $__type, $__args = [])
			{
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
				
				return Invoke::emitClass($load, $__args);
			};
			
			$val = __type_Element::mergeOffsetValues($__data,
			[
				__type_Element::name		=> 'stub',
				__type_Element::close		=> TRUE
			]);
			
			$val[__type_Element::parent] = NULL;
			
			$type = Inflector::camelize($val[__type_Element::name]);
			
			#! performance: use ADV static GC; create a sub class for each element
			#+ @see ILLI\Core\Std\Def\ADV::__GC
			
			#~ element attributes
			$val[__type_Element::attribute] = $inv
			(
				__NAMESPACE__,
				'__type_Attributes',
				__CLASS__,
				String::insert('__type_{:type}', ['type' => $type])
			);
			
			#~ element content storage
			$val[__type_Element::content] = $inv
			(
				__NAMESPACE__,
				'ElementContent',
				__CLASS__,
				String::insert('{:type}Content',['type' => $type]),
				[
					static::$__tContent,
					isset($__data[__type_Element::content])
						? $__data[__type_Element::content]
						: []
				]
			);
			
			#~ element tuple
			$this->__Type = $inv
			(
				__NAMESPACE__,
				'__type_Element',
				__CLASS__,
				String::insert('__type_{:type}Element', ['type' => $type]),
				[
					[
						__type_Element::parent		=> static::$__tParent,
						__type_Element::attribute	=> get_class($val[__type_Element::attribute])
					],
					$val
				]
			);
		}
		
		/**
		 * direct access read by constant name
		 *
		 * @read	ILLI\Core\Util\Html\__type_Element::attributes
		 * @read	ILLI\Core\Util\Html\__type_Element::close
		 * @read	ILLI\Core\Util\Html\__type_Element::content
		 * @read	ILLI\Core\Util\Html\__type_Element::name
		 * @read	ILLI\Core\Util\Html\__type_Element::parent
		 * @param 	string 	$__constantName		constant with defined tuple index
		 * @return	mixed	type based on ADT
		 */
		public function __get($__constantName)
		{
			$t = $this->__Type->get();
			return $t[constant(get_class($this->__Type).'::'.$__constantName)];
		}
		
		/**
		 * direct access write by constant name
		 *
		 * @write	ILLI\Core\Util\Html\__type_Element::content
		 * @param 	string 	$__constantName		constant with defined tuple index
		 * @param	mixed	$__value		type based on ADT
		 * @see		ILLI\Core\Util\Html\__type_Element::content
		 */
		public function __set($__constantName, $__value)
		{
			if(constant(get_class($this->__Type).'::'.$__constantName) === __type_Element::content)
			{
				$this->__Type->get()[__type_Element::content]->set($__value);
				
				if($__value instanceOf Element)
					$__value->__Type->parent = $this;
			}
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
			$t = $this->__Type->get();
			$r = $t[__type_Element::content] instanceOf ElementContent ? $t[__type_Element::content]->render() : NULL;
			$a = $t[__type_Element::attribute]->render();
			$n = $t[__type_Element::ns];
			
			return String::insert
			(
				static::$__template[NULL === $r && FALSE === $t[__type_Element::close] ? 0 : 1],
				[
					'ns'		=> NULL === $n ? '' : $n.':',
					'name'		=> $t[__type_Element::name],
					'content'	=> $r,
					'attributes'	=> NULL === $a ? '' : ' '.$a
				]);
		}
	}