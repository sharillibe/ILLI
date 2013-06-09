<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE Exception;
	
	FINAL CLASS ADTClosure EXTENDS \ILLI\Core\Std\Def\ADT
	{
		public function __construct()
		{
			parent::__construct([__const_Type::SPL_CLOSURE]);
		}
		
		public function validate($__value)
		{
			return __const_Type::SPL_OBJECT === getType($__value) && $__value instanceOf $this[0];
		}
	}