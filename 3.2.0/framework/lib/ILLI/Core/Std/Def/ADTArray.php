<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE Exception;
	
	FINAL CLASS ADTArray EXTENDS \ILLI\Core\Std\Def\ADT
	{
		public function __construct()
		{
			parent::__construct([__const_Type::SPL_ARRAY]);
		}
		
		public function validate($__value)
		{
			return $this[0] === getType($__value);
		}
	}