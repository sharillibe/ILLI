<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE Exception;
	
	FINAL CLASS ADTCallable EXTENDS \ILLI\Core\Std\Def\ADT
	{
		public function __construct()
		{
			parent::__construct([__const_Type::SPL_CALLABLE]);
		}
		
		public function validate($__value)
		{
			return is_callable($__value);
		}
	}