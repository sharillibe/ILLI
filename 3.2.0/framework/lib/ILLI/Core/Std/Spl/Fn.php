<?PHP
	NAMESPACE ILLI\Core\Std\Spl;
	USE ILLI\Core\Std\Exception;
	USE ILLI\Core\Util\String;
	USE Closure;
	USE ReflectionFunction;
	USE SplFileObject;
	
	CLASS Fn
	{
		protected $__Closure		= NULL;
		protected $__Reflection		= NULL;
		protected $__code		= NULL;
		protected $__use		= NULL;
	
		public function __construct(Closure $__Closure)
		{
			$this->__Closure = $__Closure;
		}
		
		public function getReflection()
		{
			if(NULL === $this->__Reflection)
				$this->__Reflection = new ReflectionFunction($this->__Closure);
			
			return $this->__Reflection;
		}
	
		public function __invoke()
		{
			$args = func_get_args();
			return $this->getReflection()->invokeArgs($args);
		}
	
		public function getClosure()
		{
			return $this->__Closure;
		}
	
		public function getCode()
		{
			if(NULL === $this->__code)
				$this->__code = $this->_fetchCode();
				
			return $this->__code;
		}
	
		public function getParameters()
		{
			return $this->getReflection()->getParameters();
		}
	
		public function getUse()
		{
			if(NULL === $this->__use)
				$this->__use = $this->_fetchUse();
				
			return $this->__use;
		}
		
		public function __toString()
		{
			return $this->getCode();
		}
	
		public function __sleep()
		{
			$this->getCode();
			$this->getUse();
			return ['__code', '__use'];
		}
	
		public function __wakeup()
		{
			extract($this->getUse());
			eval('$f = '.$this->getCode().';');
			if(isset($f) && $f instanceOf Closure)
				return $this->__Closure = $f;
			
			throw new Exception();
		}
	
		protected function _fetchCode()
		{
			// Open file and seek to the first line of the closure
			$F = new SplFileObject($this->getReflection()->getFileName());
			$F->seek($this->getReflection()->getStartLine() - 1);
	
			// Retrieve all of the lines that contain __code for the closure
			$r = '';
			while($F->key() < $this->getReflection()->getEndLine())
			{
				$r .= $F->current();
				$F->next();
			}
	
			return String::lrepeat(substr($r, $b = strpos($r, 'function'), strrpos($r, '}') - $b + 1), "\t", 1, ['lines' => [0], 'last' => TRUE, 'inverse' => TRUE]);
		}
	
		protected function _fetchUse()
		{
			// Make sure the use construct is actually used
			if(!$i = stripos($this->getCode(), 'use'))
				return [];
	
			// Get the names of the variables inside the use statement
			$b = strpos($this->getCode(), '(', $i) + 1;
			$e = strpos($this->getCode(), ')', $b);
			$v = explode(',', substr($this->getCode(), $b, $e - $b));
	
			// Get the static variables of the function via reflection
			$s = $this->getReflection()->getStaticVariables();
		
			// Only keep the variables that appeared in both sets
			$u = [];
			foreach($v as $c)
			{
				$c = trim($c, ' $&amp;');
				$u[$c] = $s[$c];
			}
			
			return $u;
		}
	}