<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE Exception;
	
	FINAL CLASS ADTDirectory EXTENDS \ILLI\Core\Std\Def\ADT
	{
		public function __construct()
		{
			parent::__construct([__const_Type::SPL_DIRECTORY]);
		}
		
		public function validate($__value)
		{
			return __const_Type::SPL_STRING === getType($__value) && TRUE === is_dir($__value);
		}
	}