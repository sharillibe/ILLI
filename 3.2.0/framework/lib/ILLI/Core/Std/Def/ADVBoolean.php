<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE Exception;
	
	CLASS ADVBoolean EXTENDS \ILLI\Core\Std\Def\ADV
	{
		public function __construct($__data = NULL)
		{
			parent::__construct([__const_Type::SPL_BOOLEAN]);
				
			if(NULL !== $__data)
				$this->set($__data);
		}
	}