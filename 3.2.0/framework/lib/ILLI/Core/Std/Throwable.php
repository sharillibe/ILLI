<?PHP
	NAMESPACE ILLI\Core\Std;
	USE ILLI\Core\Shell\Lib;
	USE ILLI\Core\Std\Throwable\External;
	USE ILLI\Core\Std\Throwable\Failure;
	USE ILLI\Core\Std\Throwable\Log;
	USE ILLI\Core\Std\Throwable\Export;
	USE ILLI\Core\Std\IThrowable;
	USE ILLI\Core\Util\Set;
	USE ILLI\Core\Util\String;
	USE Closure;
	USE ReflectionClass;
	USE Exception AS PHPException;
	USE ErrorException;
	
	CLASS Throwable EXTENDS \Exception IMPLEMENTS \ILLI\Core\Std\IThrowable
	{
		CONST ERROR_CONSTRUCT	= 500;
		CONST CONSTRUCT		= 'Unknown Error.';
		
		private $__hash		= NULL;
		private $__addr		= NULL;
		private $__solved	= FALSE;
		private $__solvedBy	= [];
		private $__Next		= NULL;
		
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
		
		public function getFireSource()
		{
			if(FALSE === file_exists($f = $this->getFire()['file']))
				return '';
				
			$f = explode(PHP_EOL, file_get_contents($f));
			$c = $this->getFire()['line'] - 1;
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
			
			if(FALSE === isset($t[0]))
				return [];
			
			return $t[0] + 
			[
				'class'		=> '[internal]',
				'line'		=> '[internal]',
				'file'		=> '[internal]',
				'type'		=> '::',
				'function'	=> '',
				'args'		=> []
			];
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
		
		public static function reset()
		{
			return Log::reset();
		}
		
		public static function hasCatched($__exceptionClass)
		{
			return Log::hasCatched($__exceptionClass);
		}
		
		public static function hasErrorsLogged()
		{
			return Log::isEmpty();
		}
		
		public function toMessage()
		{
			return Export::message($this);
		}
		
		public function toTrack()
		{
			return Export::track($this);
		}
		
		
		
		
		
		
		
		
		
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
	}