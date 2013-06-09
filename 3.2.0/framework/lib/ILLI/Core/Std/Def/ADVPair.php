<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE Exception;
	
	CLASS ADVPair EXTENDS \ILLI\Core\Std\Def\ADVTuple
	{
		CONST __GC		= __CLASS__;
			
		CONST key		= 0x00;
		CONST value		= 0x01;
			
		public function __construct($__t1, $__t2, $__data1 = NULL, $__data2 = NULL)
		{
			parent::__construct([self::key => $__t1, self::value => $__t2], [self::key => $__data1, self::value => $__data2]);
		}
	}