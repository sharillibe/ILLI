<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Util\Html\Attributes;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Option EXTENDS \ILLI\Core\Util\Html\Element
	{
		protected static $__tAttributes = '\ILLI\Core\Util\Html\__type_AttributesOption';
		protected static $__tContent	= [__const_Type::SPL_STRING];
		protected static $__tParent	= ['ILLI\Core\Util\Html\Select', 'ILLI\Core\Util\Html\OptGroup'
							//, 'ILLI\Core\Util\Html\DataList'
							];
		
		public function __construct($__data = NULL)
		{
			$__data				= (array) $__data;
			$__data[__type_Element::name]	= 'option';
			$__data[__type_Element::close]	= TRUE;
			parent::__construct([], $__data);
		}
	}