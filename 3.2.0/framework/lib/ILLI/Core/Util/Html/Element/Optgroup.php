<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Optgroup EXTENDS \ILLI\Core\Util\Html\Element
	{
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\Element\Option'
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\Element\Select'
		];
		
		public function __construct($__data = NULL)
		{
			$__data				= (array) $__data;
			$__data[__type_Element::name]	= 'optgroup';
			$__data[__type_Element::close]	= TRUE;
			parent::__construct([], $__data);
		}
	}