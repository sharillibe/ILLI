<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Util\Html\Attributes;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\__const_ADVClass;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Util\String;
	
	CLASS Element
	{
		CONST attribute		= 0x02;
		CONST content		= 0x03;
		CONST parent		= 0x04;
		
		protected static $__tAttributes = '\ILLI\Core\Util\Html\__type_Attributes';
		
		protected static $__dT =
		[
			Element::content	=> ['ILLI\Core\Util\Html\Element'],
			Element::parent		=> ['ILLI\Core\Util\Html\Element']
		];
		
		protected $__Type = NULL;
		
		/**
		 * @todo load content into strictArray
		 *		-> no accessors in ADV classes
		 */
		public function __construct($__defineOffsetType = [], $__data = [])
		{
			$this->__Type = new __type_Element
			(
				__type_Element::mergeOffsetTypes($__defineOffsetType, [
					Element::attribute		=> static::$__tAttributes,
					//__type_Element::content		=> __const_ADVClass::SPL_STRICT_ARRAY,
					Element::content		=> static::$__dT[Element::content],
					Element::parent			=> static::$__dT[Element::parent]
				]),
				__type_Element::mergeOffsetValues($__data, [
					__type_Element::name		=> 'stub',
					__type_Element::close		=> TRUE,
					Element::attribute		=> Invoke::emitClass(static::$__tAttributes),
					/*
					__type_Element::content		=> Invoke::emitClass(__const_ADVClass::SPL_STRICT_ARRAY, [
						[__const_Type::SPL_LONG],
						[static::$__defineT[__type_Element::content]],
						isset($__data[__type_Element::content]) ? $__data[__type_Element::content] : NULL
					]),
					*/
					Element::content		=> isset($__data[Element::content]) ? $__data[Element::content] : NULL,
					Element::parent			=> NULL
				])
			);
		}
		
		public function __get($__name)
		{
			$t = $this->__Type->get();
			if($__name === 'attribute')
				return $t[Element::attribute];
		}
		
		protected static $__template =
		[
			0 => '<{:name}{:attributes} />',
			1 => '<{:name}{:attributes}></{:name}>',
			2 => '<{:name}{:attributes}>{:content}</{:name}>'
		];
		
		public function __toString()
		{
			return (string) $this->render();
		}
		
		public function render()
		{
			// $s = [];
			//foreach(NULL !== ($c = $this->__Type->content) && NULL !== ($c = $c->get()) ? $c : [] as $v)
			//	$s[] = $v instanceOf Element ? $v->render() : $v;
					
			$t = $this->__Type->get();
			$c = NULL !== ($c = $t[Element::content]) ? $c instanceOf Element ? $c->render() : $c : NULL;
			
			return String::insert
			(
				static::$__template[$c ? 2 : (TRUE === $t[__type_Element::close] ? 1 : 0)],
				['name' => $t[__type_Element::name], 'content' => $c, 'attributes' => (NULL === ($a = $t[Element::attribute]->render()) ? '' : ' '.$a)]
			);
		}
	}