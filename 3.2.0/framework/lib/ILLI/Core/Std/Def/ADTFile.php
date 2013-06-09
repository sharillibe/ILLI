<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE Exception;
	
	FINAL CLASS ADTFile EXTENDS \ILLI\Core\Std\Def\ADT
	{
		public function __construct()
		{
			parent::__construct([__const_Type::SPL_FILE]);
		}
		
		public function validate($__value)
		{
			return __const_Type::SPL_STRING === getType($__value) && TRUE === file_exists($__value);
		}
	}