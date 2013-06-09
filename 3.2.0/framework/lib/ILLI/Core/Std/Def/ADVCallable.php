<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADVCallable\ComponentMethodCallException;
	USE ILLI\Core\Std\Def\ADVCallable\ComponentInitializationException;
	USE Exception;
	
	CLASS ADVCallable EXTENDS \ILLI\Core\Std\Def\ADV
	{
		public function __construct($__data = NULL)
		{
			parent::__construct([__const_Type::SPL_CALLABLE]);
				
			if(NULL !== $__data)
				$this->set($__data);
		}
	}