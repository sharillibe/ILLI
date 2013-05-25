<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\Attributes;
	USE ILLI\Core\Util\String;
	
	CLASS __type_Element EXTENDS \ILLI\Core\Std\Def\ADVTuple
	{
		//CONST __GC		= __CLASS__;	#! Element is a pseudo-abstract class
		
		CONST name		= 0x00;
		CONST close		= 0x01;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct
			(
				parent::mergeOffsetTypes($__defineOffsetType, [
					__type_Element::name		=> __const_Type::SPL_STRING,
					__type_Element::close		=> __const_Type::SPL_BOOLEAN
				]),
				parent::mergeOffsetValues($__data, [
					__type_Element::name		=> 'stub',
					__type_Element::close		=> TRUE
				])
			);
		}
		
		
		
		/*
		protected static $__template =
		[
			0 => '<{:name}{:attributes}></{:name}>',
			1 => '<{:name}{:attributes} />',
			2 => '<{:name}{:attributes}>{:content}</{:name}>'
		];
		
		public function __toString()
		{
			return (string) $this->render();
		}
		
		public function render()
		{
			$c = NULL !== ($c = $this->content) ? $c : NULL;
			
			return String::insert
			(
				static::$__template[$c ? 2 : (TRUE === $this->close ? 0 : 1)],
				['name' => $this->name, 'content' => $c, 'attributes' => (NULL === ($a = $this->attribute->render()) ? '' : ' '.$a)]
			);
		}
		
		public function __set($__constantName, $__value)
		{
			if($__constantName === 'name')
				return;
				
			parent::__set($__constantName, $__value);
			
			if($__constantName === 'content'
			&& $this->content instanceOf Element)
				$this->content->parent = $this;
		}
		*/
	}