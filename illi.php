<?PHP
	NAMESPACE Server
	{
		CLASS Init
		{
			const ENCODING		= 'UTF-8';
			
			CONST DO_SETUP		= 1;
			CONST DO_SERVER		= 2;
			CONST DO_DEV		= 4;
			
			protected static $__map =
			[
				self::DO_SETUP	=> 'setup',
				self::DO_SERVER	=> 'debug',
				self::DO_DEV	=> 'development'
			];
			
			static function run($__flag)
			{
				foreach(static::$__map as $f => $m)
					if($__flag & $f)
						static::$m();
			}
			
			protected static function setup()
			{
				date_default_timezone_set('Europe/Paris');
			}
			
			protected static function debug()
			{
				error_reporting(E_ALL | E_STRICT | E_DEPRECATED | E_USER_ERROR | E_USER_WARNING | E_USER_NOTICE);
				ini_set("display_errors", 1);
				ini_set("display_startup_errors", 1);
				ini_set("error_log", "none");
			}
			
			protected static function development()
			{
				clearstatcache();
				header('Content-Type: text/plain; charset='.static::ENCODING);
			}
		}
	}
	
	NAMESPACE Invoke
	{
		CLASS Init
		{
			static $__init = [];
			
			static function add($__app, $__version, $__baseDir, array $__path = [])
			{
				static::$__init[$__app] = function() use ($__version, $__baseDir, $__path)
				{
					[] !== $__path ?: $__path = ['config', 'bootstrap.php'];
					$path = implode(DIRECTORY_SEPARATOR, array_merge([$__baseDir, $__version, 'framework'], $__path));
					require_once $path;
				};
			}
			
			static function run()
			{
				foreach(static::$__init as $app => $load)
				{
					$load();
					unset(static::$__init[$app]);
				}
			}
			
			static function remove($__app)
			{
				unset(static::$__init[$__app]);
			}
			
			static function illi()
			{
				static::add('ILLI', '3.2.0', __DIR__);
			}
		}
	}