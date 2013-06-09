<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE Exception;
	
	CLASS ADVResult EXTENDS \ILLI\Core\Std\Def\ADV
	{
		CONST __GC = __CLASS__;
		
		public function __construct($__t, $__setup = NULL)
		{
			if(NULL === $__t)
				return;
			
			parent::__construct($__t);
		}
	}