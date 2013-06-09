<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE Exception;
	
	CLASS ADVArguments EXTENDS \ILLI\Core\Std\Def\ADVTuple
	{
		CONST __GC = __CLASS__;
		
		public function __construct(array $__t, array $__setup = [])
		{
			if([] === $__t)
				return;
			
			parent::__construct($__t, $__setup);
		}
	}