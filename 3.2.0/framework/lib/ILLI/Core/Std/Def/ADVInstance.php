<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE Exception;
	
	CLASS ADVInstance EXTENDS \ILLI\Core\Std\Def\ADV
	{
		public function __construct($__className, $__data = NULL)
		{
			parent::__construct((array) $__className);
				
			if(NULL !== $__data)
				$this->set($__data);
		}
	}