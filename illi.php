<?PHP
	NAMESPACE Server;
	INTERFACE Config
	{
		const ENCODING         = 'UTF-8';
		const ILLI_VERSION     = '3.2.0';
		const ILLI_VERSION_DEC = 30200;
		const ILLI_ENABLED     = TRUE;
	}
	
	FINAL CLASS Init IMPLEMENTS Config
	{
		private static $__isDebug		= FALSE;
		private static $__isDevelopment		= FALSE;
		
		public static $dir = NULL;
		
		static function setup()
		{
			self::$dir = __DIR__;
			date_default_timezone_set('Europe/Dublin');
		}
		
		static function debug()
		{
			self::$__isDebug = true;
			error_reporting(E_ALL | E_STRICT | E_DEPRECATED | E_USER_ERROR | E_USER_WARNING | E_USER_NOTICE);
			ini_set("display_errors", 1);
			ini_set("display_startup_errors", 1);
			ini_set("error_log", "none");
		}
		
		static function development()
		{
			self::$__isDevelopment = true;
			clearstatcache();
			header('Content-Type: text/plain; charset='.Config::ENCODING);
		}
		
		static function illi()
		{
			require_once static::file(['config', 'bootstrap.php']);
			
			//var_dump(new \ILLI\Core\Test);
			//var_dump(new \Doctrine\Test);
			//var_dump(new \ILLI\Core\Lib);
			//var_dump(new \App\foo\Test);
		}
		
		static function file(array $__path)
		{
			return implode(DIRECTORY_SEPARATOR, array_merge([dirname(__FILE__), Config::ILLI_VERSION, 'framework'], $__path));
		}
	}