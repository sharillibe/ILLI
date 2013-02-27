<?PHP
	NAMESPACE ILLI\Core\Std\Throwable;
	USE ILLI\Core\Std\Def\constType;
	
	CLASS __type_ExceptionArguments EXTENDS \ILLI\Core\Std\Tuple
	{
		CONST message			= 0x0;
		CONST messageArguments		= 0x1;
		CONST code			= 0x2;
		CONST context			= 0x3;
		CONST file			= 0x4;
		CONST line			= 0x5;
		
		public function __construct(array $__define = [])
		{
			$defined =
			[
				self::message		=> constType::SPL_STRING,
				self::messageArguments	=> constType::SPL_ARRAY,
				self::code		=> constType::SPL_INTEGER,
				self::context		=> constType::SPL_STRING,
				self::file		=> constType::SPL_FILE_PATH,
				self::line		=> constType::SPL_INTEGER
			];
			
			$define = $this->mergeTypes($defined, $__define);
			parent::__construct($define);
		}
	}