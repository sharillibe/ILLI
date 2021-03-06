<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE Exception;
	
	FINAL CLASS ADTLong EXTENDS \ILLI\Core\Std\Def\ADT
	{
		public function __construct()
		{
			parent::__construct([__const_Type::SPL_LONG]);
		}
		
		public function validate($__value)
		{
			return __const_Type::SPL_INTEGER === getType($__value);
		}
	}