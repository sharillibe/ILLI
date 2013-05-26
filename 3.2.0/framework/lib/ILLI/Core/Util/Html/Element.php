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
	 * HTML helper base element
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
	 *	 		$g = new OptGroup;
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
	 */
	CLASS Element
	{
		CONST content	= __type_Element::content;
		CONST parent	= __type_Element::parent;
		
		protected static $__tContent	= ['\ILLI\Core\Util\Html\Element'];
		protected static $__tParent	= ['\ILLI\Core\Util\Html\Element'];
		
		protected static $__template =
		[
			0 => '<{:name}{:attributes} />',
			1 => '<{:name}{:attributes}></{:name}>',
			2 => '<{:name}{:attributes}>{:content}</{:name}>'
		];
		
		protected $__Type = NULL;
		
		public function __construct($__defineOffsetType = [], $__data = [])
		{
			static $inv;
			
			isset($inv) ?: $inv = function($__baseNs, $__base, $__typeNs, $__type, $__args = [])
			{
				$pattern	= 'NAMESPACE {:typeNs}; CLASS {:type} EXTENDS \{:baseNs}\{:base} {}';
				$load		= $__typeNs.'\\'.$__type;
				
				// bypass ADV GC: create a sub-class for each element
				if(FALSE === class_exists($load, TRUE))
					eval(String::insert($pattern, ['typeNs' => $__typeNs, 'baseNs' => $__baseNs, 'type' => $__type, 'base' => $__base]));
				
				return Invoke::emitClass($load, $__args);
			};
			
			$val = __type_Element::mergeOffsetValues($__data,
			[
				__type_Element::name		=> 'stub',
				__type_Element::close		=> TRUE
			]);
			
			$type = Inflector::camelize($val[__type_Element::name]);
			
			$val[__type_Element::parent]	= NULL;
			$val[__type_Element::attribute]	= $inv(__NAMESPACE__, '__type_Attributes',	__CLASS__, String::insert('__type_{:type}', ['type' => $type]));
			
			$val[__type_Element::content]	= $inv(__NAMESPACE__, 'ElementContent',		__CLASS__, String::insert('{:type}Content', ['type' => $type]), [static::$__tContent, isset($__data[__type_Element::content]) ? $__data[__type_Element::content] : []]);
			$this->__Type			= $inv(__NAMESPACE__, '__type_Element',		__CLASS__, String::insert('__type_{:type}Element', ['type' => $type]), [
			[
					__type_Element::parent		=> static::$__tParent,
					__type_Element::attribute	=> get_class($val[__type_Element::attribute])
			], $val]);
		}
		
		public function __get($__name)
		{
			$t = $this->__Type->get();
			return $t[constant(get_class($this->__Type).'::'.$__name)];
		}
		
		public function __set($__name, $__value)
		{
			if(constant(get_class($this->__Type).'::'.$__name) === __type_Element::content)
			{
				$this->__Type->get()[__type_Element::content]->set($__value);
				
				if($__value instanceOf Element)
					$__value->__Type->parent = $this;
			}
		}
		
		public function __toString()
		{
			return (string) $this->render();
		}
		
		public function render()
		{
			$t = $this->__Type->get();
			$r = ($c = $t[__type_Element::content]) instanceOf ElementContent ? $c->render() : NULL;
			
			return String::insert(static::$__template[NULL === $r ? TRUE === $t[__type_Element::close] ? 1 : 0 : 2], [
				'name'		=> $t[__type_Element::name],
				'content'	=> $r,
				'attributes'	=> NULL === ($a = $t[__type_Element::attribute]->render()) ? '' : ' '.$a
			]);
		}
	}