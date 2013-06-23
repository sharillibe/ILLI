<?PHP
	NAMESPACE ILLI\Core\Std\Throwable;
	USE ILLI\Core\Std\IThrowable;
	USE ILLI\Core\Util\Integer\String;
	
	CLASS Log
	{
		CONST CATCHED	= 0x00;
		CONST PARAMETER = 0x01;
		CONST EXCEPTION = 0x02;
		
		protected static $__log	= [];
		
		public static function add(IThrowable $__Throwable, array $__messageArguments)
		{
			static::$__log[$__Throwable->getHashCode()] =
			[
				self::CATCHED	=> array_unique(array_values($__Throwable->parents())),
				self::PARAMETER	=> $__messageArguments,
				self::EXCEPTION	=> $__Throwable
			];
		}
		
		public static function get()
		{
			return static::$__log;
		}
		
		public static function getAddressStack($__addressString)
		{
			$r = [];
			$a = explode(IThrowable::ADDR_SEPARATOR, $__addressString);
			
			foreach($a as $h)
				$r[$h] = &static::$__log[$h][self::EXCEPTION];
				
			return $r;
		}
		
		public static function hasCatched($__exceptionClass)
		{
			$__exceptionClass = ltrim($__exceptionClass, '\\');
			
			foreach(static::$__log[self::CATCHED] as $a)
				foreach($a as $p)
					if($__exceptionClass === $p)
						return TRUE;
						
			return FALSE;
		}
		
		public static function isEmpty()
		{
			return (bool) static::$__log[self::CATCHED];
		}
		
		public static function reset()
		{
			static::$__log = [];
		}
	}