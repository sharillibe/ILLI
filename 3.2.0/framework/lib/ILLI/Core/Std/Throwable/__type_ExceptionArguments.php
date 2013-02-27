<?PHP
	NAMESPACE ILLI\Core\Std\Throwable;
	USE ILLI\Core\Std\Def\constType;
	
	CLASS __type_ExceptionArguments EXTENDS \ILLI\Core\Std\Tuple
	{
		CONST message			= 0x0;
		CONST messageArguments		= 0x1;
		CONST code			= 0x2;
		CONST previousException		= 0x3;
		
		public function __construct(array $__define = [])
		{
			$defined =
			[
				self::message			=> constType::SPL_STRING,
				self::messageArguments		=> constType::SPL_ARRAY,
				self::code			=> constType::SPL_INTEGER,
				self::previousException		=> 'ILLI\Core\Std\IThrowable'
			];
			
			$define = $this->mergeTypes($defined, $__define);
			parent::__construct($define);
		}
	}