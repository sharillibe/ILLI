<?PHP
	NAMESPACE ILLI\Core\Std;
	USE ILLI\Core\Shell\Lib;
	USE ILLI\Core\Std\Throwable\External;
	USE ILLI\Core\Std\Throwable\Failure;
	USE ILLI\Core\Std\Throwable\Trapped;
	USE ILLI\Core\Std\Throwable\Fatal;
	USE ILLI\Core\Std\Throwable\Log;
	USE ILLI\Core\Std\Throwable\Export;
	USE ILLI\Core\Std\IThrowable;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Util\Set;
	USE ILLI\Core\Util\String;
	USE Closure;
	USE ReflectionClass;
	USE Exception AS PHPException;
	USE ErrorException;
	
	CLASS Throwable EXTENDS \Exception IMPLEMENTS \ILLI\Core\Std\IThrowable
	{
		CONST ERROR_CONSTRUCT		= 500;
		CONST CONSTRUCT			= 'Unknown Error.';
		
		CONST TRAP			= FALSE;
		CONST SHUTDOWN			= FALSE;
		CONST DISPLAY			= TRUE;
		
		private $__hash			= NULL;
		private $__addr			= NULL;
		private $__solved		= FALSE;
		private $__solvedBy		= [];
		private $__Next			= NULL;
		
		public function __construct()
		{
			$this->__addr = $this->getHashCode();
			
			
			$_ = (object) [
				'__messageArguments'	=> [],
				'__messageCode'		=> 0,
				'__unparsedMessage'	=> NULL,
				'__previousException'	=> NULL,
				'__isCodeTouched'	=> FALSE,
				'__isMessageTouched'	=> FALSE
			];
			
			foreach(func_get_args() as $a)
			{
				$t = getType($a);
				
				switch($t):
					case 'integer':
						$_->__isCodeTouched	= TRUE;
						$_->__messageCode	= $a;
						break;
					case 'string':
						$_->__isMessageTouched	= TRUE;
						$_->__unparsedMessage	= $a;
						break;
					case 'array':
						$_->__messageArguments 	= $a;
						break;
					case 'object' && $a instanceOf PHPException:
						switch(TRUE):
							case $a instanceOf IThrowable:
								$_->__previousException = $a;
								break;
							case $a instanceOf ErrorException:
								$_->__unparsedMessage	= Failure::CONSTRUCT;
								$_->__messageCode	= Failure::ERROR_CONSTRUCT;
								$_->__previousException = Failure::import($a);
								$_->__isMessageTouched	= TRUE;
								$_->__isCodeTouched	= TRUE;
								break;
							case $a instanceOf PHPException:
								$_->__unparsedMessage	= External::CONSTRUCT;
								$_->__messageCode	= External::ERROR_CONSTRUCT;
								$_->__previousException	= External::import($a);
								$_->__isMessageTouched	= TRUE;
								$_->__isCodeTouched	= TRUE;
								break;
						endswitch;
						
						$_->__previousException->setNext($this);
						
						$this->__addr = String::insert('{:p}{:s}{:c}',
						[
							'p'	=> $_->__previousException->getAddress(),
							's'	=> IThrowable::ADDR_SEPARATOR,
							'c'	=> $this->__addr
						]);
						break;
				endswitch;
			}
			
			#+ load default code when nothing was set
			if(FALSE === $_->__isCodeTouched)
				$_->__messageCode = static::ERROR_CONSTRUCT;
			
			#+ load default message by code from constant, when no message was set
			if(FALSE === $_->__isMessageTouched)
			{
				$constants = (new ReflectionClass(get_called_class()))->getConstants();
				
				foreach($constants as $name => $value)
				{
					if($value !== $_->__messageCode)
						continue;
					
					$const = str_replace('ERROR_', '', $name);
					
					if(FALSE === isset($constants[$const]))
						continue;
						
					$_->__unparsedMessage = $constants[$const];
					break;
				}
				
				if(NULL === $_->__unparsedMessage)
					$_->__unparsedMessage = static::CONSTRUCT;
			}
			
			Log::add($this, $_->__messageArguments);
			
			parent::__construct
			(
				String::insert($_->__unparsedMessage, $_->__messageArguments),
				$_->__messageCode,
				$_->__previousException
			);
		}
		
		public function setNext(IThrowable $__Exception)
		{
			if(NULL === $this->__Next)
				$this->__Next = $__Exception;
			
			return $__Exception;
		}
		
		public function hasNext()
		{
			return $this->__Next instanceOf IThrowable;
		}
		
		public function getNext()
		{
			return $this->__Next;
		}
		
		public function hasPrevious()
		{
			return $this->getPrevious() instanceOf PHPException;
		}
		
		public function isExternal()
		{
			return $this instanceOf External;
		}
		
		public function isFailure()
		{
			return $this instanceOf Failure;
		}
		
		public function getAddress()
		{
			return $this->__addr;
		}
		
		public function getHashCode()
		{
			if(NULL !== $this->__hash)
				return $this->__hash;
				
			static $c;
			isset($c) ?: $c = [];
			
			do
			{
				$this->__addr = $this->__hash = String::cuid();
			}
			while(TRUE === isset($c[$this->__hash]));
			
			$c[$this->__hash] = TRUE;
			
			return $this->__hash;
		}
		
		public function isSolved()
		{
			return $this->__solved;
		}
		
		public function getAddressCode()
		{
			$r = [];
			
			foreach($this->getAddressStack() as $E)
				$r[] = $E->getCode();
				
			return implode(IThrowable::ADDR_SEPARATOR, array_reverse($r));
		}
		
		public function getAddressStack($__addressString = NULL)
		{
			return Log::getAddressStack(NULL === $__addressString ? $this->getAddress() : $__addressString);
		}
		
		public function solveAddressStack($__addressString = NULL)
		{
			foreach($this->getAddressStack($__addressString) as $E)
				$E->asSolved();
				
			return $this;
		}
		
		public function asSolved()
		{
			$this->__solved		= TRUE;
			$this->__solvedBy	= debug_backtrace(0, 2)[1];
			return $this;
		}
		
		public static function parents($__splClassName = NULL)
		{
			$arg = NULL === $__splClassName ? get_called_class() : $__splClassName;
			
			$classes = [$arg];
    			while($arg = get_parent_class($arg))
    				$classes[] = $arg;
    				
    			return array_reverse($classes);
		}
		
		public static function hasCatched($__exceptionClass)
		{
			return Log::hasCatched($__exceptionClass);
		}
		
		public static function hasErrorsLogged()
		{
			return Log::isEmpty();
		}
		
		#:export:
			public function toMessage()
			{
				return Export::message($this);
			}
			
			public function toTrack()
			{
				return Export::track($this);
			}
		#::
		
		
		#:originator:
			public function getFireArgs()
			{
				return $this->getFire()['args'];
			}
			
			public function getFireClass()
			{
				return $this->getFire()['class'];
			}
			
			public function getFireFunction()
			{
				return $this->getFire()['function'];
			}
			
			public function getFireType()
			{
				return $this->getFire()['type'];
			}
			
			public function getFireLine()
			{
				return $this->getFire()['line'];
			}
			
			public function getFireFile()
			{
				return $this->getFire()['file'];
			}
			
			public function getFireSource(array $__config = [])
			{
				$__config +=
				[
					'file' => $this->getFire()['file'],
					'line' => $this->getFire()['line']
				];
				
				if('[internal]' === ($f = $__config['file'])
				|| FALSE === file_exists($f))
					return '';
					
				$f = explode(PHP_EOL, file_get_contents($f));
				$c = $__config['line'] - 1;
				$r = [];
				
				foreach(range($c - 3, $c + 3) as $i)
				{
					if(FALSE === isset($f[$i]))
						continue;
					
					$r[$i + 1] = string::insert('{:line}{:sep}{:source}',
					[
						'line'		=> str_pad($i + 1, 8, '0', STR_PAD_LEFT),
						'sep'		=> $i === $c ? "*\t" : "\t",
						'source'	=> $f[$i]
					]);
				}
				
				return $r;
			}
			
			public function getFireMethod()
			{
				return $this->getFire()['class'].$this->getFire()['type'].$this->getFire()['function'];
			}
			
			public function getFire()
			{
				$t = [];
				$t = TRUE === $this->isExternal() ? $this->getExternal()->getTrace() : $this->getTrace();
				
				$d = [
					'class'		=> '[internal]',
					'line'		=> '[internal]',
					'file'		=> '[internal]',
					'type'		=> '::',
					'function'	=> '',
					'args'		=> []
				];
				
				if(FALSE === isset($t[0]))
					return $d;
					
				switch(TRUE):
					case $this instanceOf Trapped:
					case $this instanceOf Fatal:
						return [
							'file' => $t[0]['args'][2],
							'line' => $t[0]['args'][3]
						] + $d;
						break;
				endswitch;
				
				return $t[0] + $d;
			}
		#::
		
		#:handle:
			protected static $__config	= [];
			protected static $__parse	= [];
			protected static $__handle	= [];
			protected static $__prepare	= [];
			protected static $__handler	= NULL;
			protected static $__parser	= NULL;
			
			private static $__isRunning	= FALSE;
			
			public static function config(array $__config = [])
			{
				return static::$__config = array_merge($__config, static::$__config);
			}
			
			public static function run()
			{
				if(TRUE === self::$__isRunning)
					return;
					
				self::$__isRunning = TRUE;
				
				$c = get_called_class();
			
				$handler = &static::$__handler;
				
				$handler ?: $handler = function($__info)
				{
					$a = &static::$__parser;
					$p = &static::$__parse;
					$f = &static::$__handle['fire'];
					$c = &static::$__config;
					$i = (array) (is_object($__info) ? $f($__info, TRUE) : $__info) +
					[
						'type'		=> NULL,
						'message'	=> NULL,
						'code'		=> 0,
						'file'		=> NULL,
						'line'		=> 0,
						'trace'		=> [],
						'context'	=> NULL,
						'Exception'	=> NULL
					];
					
					foreach(['origin', 'trace'] as $_)
					{
						$__	= static::$__prepare[$_];
						$i[$_]	= $__($i['trace']);
					}
					
					foreach($c as $k => $_)
					{
						foreach(array_keys($c) as $k)
						{
							if(isset(static::$__handle[$k]))
								continue;
								
							if(FALSE === isset($i[$k])
							|| FALSE === isset($p[$k]))
								continue 2;
								
							if(TRUE === isset($p[$k])
							&& FALSE === $p[$k]($c, $i))
							{
								continue 2;
							}
						}
						
						if(NULL !== $a)
							if(FALSE === $a($i))
								return FALSE;
						
						if(FALSE === isset($c['fire']))
							return FALSE;
						
						$h = $c['fire'];
						return FALSE !== $h($i);
					}
					
					return TRUE;
				};
				
				static::$__parse +=
				[
					'type' => function($c, $i)
					{
						return (boolean) array_filter((array) $c['type'], function($t) use ($i)
						{
							return $t === $i['type'] || is_subclass_of($i['type'], $t);
						});
					},
					'code' => function($c, $i)
					{
						return $i['code'] === ($c['code'] & $i['code']);
					},
					'file' => function($c, $i)
					{
						foreach((array) $c['file'] as $pat)
						{
							if(TRUE === (bool) strpos($i['file'], $pat))
								return TRUE;
						}
						
						return FALSE;
					},
					'stack' => function($c, $i)
					{
						return (boolean) array_intersect((array) $c['stack'], $i['stack']);
					},
					'message' => function($c, $i)
					{
						return (boolean) preg_match($c['message'], $i['message']);
					}
				];
				
				static::$__prepare +=
				[
					'origin' => function(array $__stack)
					{
						foreach($__stack as $frame)
							if(isset($frame['class']))
								return trim($frame['class'], '\\');
					},
					'trace' => function(array $__stack)
					{
						$r = [];
					
						foreach($__stack as $v)
							if(isset($v['function']))
								$r[] = TRUE === isset($v['class'])
									? implode('::', [trim($v['class'], '\\'), $v['function']])
									: $v['function'];
						
						return $r;
					}
				];
				
				static::$__handle +=
				[
					'shutdown' => function()
					{
					},
					'fatal' => function($code, $message, $file, $line = 0) use (&$handler)
					{
						$E = Fatal::import(new ErrorException($message, $code, 1, $file, $line));
						throw $E;
					},
					'raise' => function($code, $message, $file, $line = 0)
					{
						$E = Failure::import(new ErrorException($message, $code, 1, $file, $line));
						throw $E;
					},
					'trap' => function($code, $message, $file, $line = 0) use (&$handler)
					{
						$handler(Trapped::import(new ErrorException($message, $code, 1, $file, $line)));
					},
					'fire' => function($Exception, $return = FALSE) use ($c, &$handler)
					{
						if(ob_get_length())
							ob_end_clean();
					
						$t = $c::$__prepare['trace'];
						
						$i = compact('Exception') +
						[
							'type'	=> get_class($Exception),
							'stack'	=> $t($Exception->getTrace())
						];
					
						foreach(['message', 'file', 'line', 'trace', 'code'] as $k)
							$i[$k] = $Exception->{'get'.ucfirst($k)}();
						
						return TRUE === $return ? $i : $handler($i);
					}
				];
				
				TRUE === static::TRAP
					? set_error_handler(static::$__handle['trap'])
					: set_error_handler(static::$__handle['raise']);
					
				set_exception_handler(static::$__handle['fire']);
				
				if(TRUE === static::SHUTDOWN)
				{
					ini_set('track_errors',			1);
					ini_set("display_errors",		0);
					ini_set("display_startup_errors",	0);
				
					static $__STATIC_shutdown;
					
					$__STATIC_shutdown ?: $__STATIC_shutdown = Invoke::emitInvokable(function() use ($c)
					{
						$f = &static::$__handle['fatal'];
						$t = &static::$__handle['trap'];
						$s = &static::$__handle['shutdown'];
						$u = $c::TRAP;
						
						register_shutdown_function(function() use (&$f, &$s, &$t, &$u)
						{
							if(NULL !== ($e = error_get_last()))
								Invoke::emitInvokable(TRUE === $u ? $t : $f, [$e['type'], $e['message'], $e['file'], $e['line']]);
							
							Invoke::emitInvokable($s);
						});
						
						return TRUE;
					});
				}
			}
			
			public static function stop()
			{
				restore_error_handler();
				restore_exception_handler();
				self::$__isRunning	= FALSE;
				static::$__handler	= NULL;
				static::$__config	= [];
				static::$__parse	= [];
				static::$__handle	= [];
				static::$__prepare	= [];
			}
			
			public static function isRunning()
			{
				return self::$__isRunning;
			}
		#::
		
		
		
		
		
		/*
		
		public function toSet($__addressString = NULL)
		{
			$__fn_file = function($f)
			{
				$f = str_replace(Lib::appPath(), '/var/www/dev', $f);
				$f = str_replace(Lib::libPath(), '/var/www/dev', $f);
				$f = str_replace('/var/www/clients/client5/web22/web/dev', '/var/www/dev', $f);
				$f = str_replace('index.php', '__MAIN__.ddl', $f);
				$f = str_replace('.php', '.ddl', $f);
				
				return $f;
			};
			
			$r = [];
			foreach(array_reverse($this->toArray()) as $k => $v)
			{
				$m = [
					"\t".$k.': '.$__fn_file($v)
				];
				
				$r[] = implode(PHP_EOL, $m);
			}
			
			$r[] = 'SET';
			return implode(PHP_EOL, array_reverse($r));
		}
		
		protected function toArray(array $__options = [])
		{
			$__options +=
			[
				'filter'	=> function($__propertyName, $__value)
				{
					return !(substr($__propertyName, 0, 2) === '__');
				},
				'parents'	=> NULL // merge|recursive|extend
			];
			
			$props = [];
			$class = get_called_class();
			$props['class'] 	= $class;
			$props['ch'] 	= $this->getHashCode();
			$props['chaddr'] 	= $this->getAddress();
			$props['ecaddr']	 	= $this->getAddressCode();
			$props['status'] 	= (FALSE === $this->isSolved() ? 'UNSOLVED' : 'SOLVED');
			
			foreach($this as $property => $value)
				$props[$property] = $value;
				
			if($this->hasPrevious())
				$props['prev'] = $this->getPrevious()->toArray();
					
			if($this instanceOf External)
			{
				$ext = &$props['import'];
				$ext['class'] = get_class($E = $this->getExternal());
				foreach($E as $k => $v)
					$ext[$k] = $v;
					
				$ext = array_change_key_case($ext, CASE_UPPER);
			}
			
			$result = [];
			
			foreach($props as $property => $value)
			{
				if(is_callable($__options['filter'])
				&& FALSE === $__options['filter']($property, $value))
					continue;
					
				switch(TRUE):
					case is_array($value):
					case (!is_object($property)):
						$result[$property] = $value;
						break;
					case (isset($__options['handlers'][$class = get_class($value)])):
						$result[$property] = $__options['handlers'][$class]($value);
						break;
					case (method_exists($value, 'to')):
						$result[$property] = $value->to('array', $__options);
						break;
					case ($vars = get_object_vars($value)):
						$result[$property] = $vars;
						break;
					case (method_exists($value, '__toString')):
						$result[$property] = (string) $value;
						break;
					default:
						$result[$property] = $value;
						break;
				endswitch;
			}
			$result['message'] = json_encode($result['message']);
			$result = Set::flatten(array_change_key_case($result, CASE_UPPER));
			return $result;
		}
		
		*/
	}