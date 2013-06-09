<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE Exception;
	
	FINAL CLASS ADTTrait EXTENDS \ILLI\Core\Std\Def\ADT
	{
		public function __construct()
		{
			parent::__construct([__const_Type::SPL_TRAIT]);
		}
		
		public function validate($__value)
		{
			return __const_Type::SPL_STRING === getType($__value) && TRUE === trait_exists($__value);
		}
	}