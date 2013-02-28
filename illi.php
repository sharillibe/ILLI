<?PHP
	NAMESPACE Server
	{
		CLASS Init
		{
			const ENCODING        			= 'UTF-8';
			
			private static $__isDebug		= FALSE;
			private static $__isDevelopment		= FALSE;
			
			public static $dir = NULL;
			
			static function setup()
			{
				self::$dir = __DIR__;
				date_default_timezone_set('Europe/Paris');
			}
			
			static function debug()
			{
				self::$__isDebug = TRUE;
				error_reporting(E_ALL | E_STRICT | E_DEPRECATED | E_USER_ERROR | E_USER_WARNING | E_USER_NOTICE);
				ini_set("display_errors", 1);
				ini_set("display_startup_errors", 1);
				ini_set("error_log", "none");
			}
			
			static function development()
			{
				self::$__isDevelopment = TRUE;
				clearstatcache();
				header('Content-Type: text/plain; charset='.static::ENCODING);
			}
		}
	}
	
	NAMESPACE Invoke
	{
		CLASS Init
		{
			const ILLI = '3.2.0';
			
			static function illi()
			{
				$_ = function($_)
				{
					return implode(DIRECTORY_SEPARATOR, array_merge([dirname(__FILE__), static::ILLI, 'framework'], $_));
				};
				
				require_once $_(['config', 'bootstrap.php']);
			}
		}
	}