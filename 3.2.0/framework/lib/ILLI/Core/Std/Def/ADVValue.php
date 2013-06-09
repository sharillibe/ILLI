<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\ADVPair\ComponentMethodCallException;
	USE ILLI\Core\Std\Def\ADVPair\ComponentInitializationException;
	USE Exception;
	
	CLASS ADVValue EXTENDS \ILLI\Core\Std\Def\ADVTuple
	{
		CONST __GC		= __CLASS__;
		
		CONST value		= 0x00;
		
		public function __construct($__t, $__data = NULL)
		{
			parent::__construct([self::value => $__t], [self::value => $__data]);
		}
	}