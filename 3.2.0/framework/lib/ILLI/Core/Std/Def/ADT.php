<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_ADTClass;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADTInstance;
	USE ILLI\Core\Std\Exception\ArgumentExpectedException;
	USE ILLI\Core\Std\Exception\ArgumentLengthZeroException;
	USE ILLI\Core\Std\Exception\ArgumentInUseException;
	USE ILLI\Core\Std\Exception\NotSupportedException;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Std\Spl\Fsb;
	USE ILLI\Core\Util\Spl;
	USE Exception;
	
	CLASS ADT EXTENDS \ILLI\Core\Std\Spl\Fsb
	{
		private static $__gc = [];
		
		private static $__def = 
		[
			__const_Type::SPL_ARRAY			=> __const_ADTClass::SPL_ARRAY,
			__const_Type::SPL_BOOLEAN		=> __const_ADTClass::SPL_BOOLEAN,
			__const_Type::SPL_CALLABLE		=> __const_ADTClass::SPL_CALLABLE,
			__const_Type::SPL_CLASS			=> __const_ADTClass::SPL_CLASS,
			__const_Type::SPL_CLOSURE		=> __const_ADTClass::SPL_CLOSURE,
			__const_Type::SPL_DIRECTORY		=> __const_ADTClass::SPL_DIRECTORY,
			__const_Type::SPL_DOUBLE		=> __const_ADTClass::SPL_DOUBLE,
			__const_Type::SPL_FILE			=> __const_ADTClass::SPL_FILE,
			__const_Type::SPL_FLAG			=> __const_ADTClass::SPL_FLAG,
			__const_Type::SPL_FLOAT			=> __const_ADTClass::SPL_DOUBLE,
			__const_Type::SPL_FUNCTION		=> __const_ADTClass::SPL_FUNCTION,
			__const_Type::SPL_INTERFACE		=> __const_ADTClass::SPL_INTERFACE,
			__const_Type::SPL_INTEGER		=> __const_ADTClass::SPL_LONG,
			__const_Type::SPL_LONG			=> __const_ADTClass::SPL_LONG,
			__const_Type::SPL_METHOD		=> __const_ADTClass::SPL_METHOD,
			__const_Type::SPL_NULL			=> __const_ADTClass::SPL_NULL,
			__const_Type::SPL_OBJECT		=> __const_ADTClass::SPL_OBJECT,
			__const_Type::SPL_RESOURCE		=> __const_ADTClass::SPL_RESOURCE,
			__const_Type::SPL_STRING		=> __const_ADTClass::SPL_STRING,
			__const_Type::SPL_TRAIT			=> __const_ADTClass::SPL_TRAIT,
			__const_Type::SPL_VOID			=> __const_ADTClass::SPL_VOID
		];
		
		protected function parseDef($__defineTypes)
		{
			if(FALSE === is_array($__defineTypes))
				throw new ArgumentExpectedException
				([
					'target'	=> __METHOD__,
					'expected'	=> __const_Type::SPL_ARRAY,
					'detected'	=> $t = getType($v = $__defineTypes),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			$r = [];
			
			foreach($__defineTypes as $k => $v)
			{
				if(FALSE === is_string($v))
					throw new ArgumentExpectedException([
						'target'	=> $this->getName().'['.$k.']',
						'expected'	=> __const_TYPE::SPL_STRING, 
						'detected'	=> $t = getType($v),
						'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
					]);
				
				$r[$k] = $v;
			}
			
			if([] !== $r)
				return $r;
			
			throw new ArgumentLengthZeroException;
		}
		
		protected function createHashAddr($__defineTypes = [])
		{
			if(FALSE === is_array($__defineTypes))
				throw new ArgumentExpectedException
				([
					'target'	=> __METHOD__,
					'expected'	=> __const_Type::SPL_ARRAY,
					'detected'	=> $t = getType($v = $__defineTypes),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			return ($c = get_called_class()) === __CLASS__
				? Spl::nameWithHash($c, $this)
				: $c;
		}
		
		public function __construct($__defineTypes = [])
		{
			if(FALSE === is_array($__defineTypes))
				throw new ArgumentExpectedException
				([
					'target'	=> __METHOD__,
					'expected'	=> __const_Type::SPL_ARRAY,
					'detected'	=> $t = getType($v = $__defineTypes),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
				
			if([] === $__defineTypes)
				throw new ArgumentLengthZeroException;
			
			$n = $this->createHashAddr($__defineTypes);
			$t = &self::$__gc[$n];		
			
			parent::setSize(1);
			parent::offsetSet(0, $n);
			
			if(FALSE === isset($t))
				$t = Fsb::fromArray($this->parseDef($__defineTypes));
		}
		
		public function __destruct()
		{
			if(get_called_class() === __CLASS__)
				unset(self::$__gc[$this->getName()]);
		}
		
		public function validate($__value)
		{
			return NULL !== $this->type($__value);
		}
		
		public function type($__value)
		{
			$v = &$__value;
			$t = getType($v);
			
			foreach($this->getGC() as $h)
				if($t === $h || ($t === __const_Type::SPL_OBJECT && (class_exists($h) || interface_exists($h)) && (is_subclass_of($v, $h) || $v instanceOf $h)))
					return $h;
			
			return NULL;
		}
		
		public function is($__expected, $__value)
		{
			foreach((array) $__expected as $_)
				if($this->type($__value) === $__expected)
					return TRUE;
			
			return FALSE;
		}
		
		final public static function define($__type)
		{			
			if(FALSE === is_string($__type))
			{
				if(TRUE === is_array($__type))
				{
					if([] === $__type)
						$__type = [__const_Type::SPL_VOID];
					
					$r = [];
					
					foreach($__type as $k => $v)
						$r[$k] = self::define($v);
					
					return $r;
				}
				
				throw new ArgumentExpectedException([
					'target'	=> __METHOD__,
					'expected'	=> implode('|',
					[
						__const_Type::SPL_STRING.' ILLI\Core\Std\Def\__const_Type::SPL*',
						__const_Type::SPL_CLASS.' *',
						__const_Type::SPL_ARRAY.' ['.implode(', ',
						[
							__const_Type::SPL_STRING.' ILLI\Core\Std\Def\__const_Type::SPL*',
							'…',
							__const_Type::SPL_CLASS.' *'
						]).']',
					]),
					'detected'	=> getType($v = $__type),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			}
			
			$n = &self::$__def[$__type];
			$a = func_get_args();
			
			if(FALSE === isset($n))
			{
				$a[0] = (array) $a[0];
				return Invoke::emitClass('ILLI\Core\Std\Def\ADTInstance', $a);
			}
			
			array_shift($a);
			
			return Invoke::emitClass($n, $a);
		}
		
		final public function getName()
		{
			return parent::offsetGet(0);
		}
		
		final public function getGC()
		{
			return self::$__gc[$this->getName()];
		}
		
		final public function toString()
		{
			return implode('|', $this->getGC()->toArray());
		}
		
		final public function getSize()
		{
			return $this->getGC()->getSize();
		}
		
		final public function offsetExists($__offset)
		{
			return $this->getGC()->offsetExists($__offset);
		}
		
		final public function offsetGet($__offset)
		{
			return $this->getGC()->offsetGet($__offset);
		}
		
		final public function count()
		{
			return $this->getGC()->count();
		}
		
		final public function current()
		{
			return $this->getGC()->current();
		}
		
		final public function key()
		{
			return $this->getGC()->key();
		}
		
		final public function next()
		{
			return $this->getGC()->next();
		}
		
		final public function rewind()
		{
			return $this->getGC()->rewind();
		}
		
		final public function valid()
		{
			return $this->getGC()->valid();
		}
		
		final public function end()
		{
			return $this->getGC()->end();
		}
		
		final public function keys()
		{
			return $this->getGC()->keys();
		}
		
		final public function prev()
		{
			return $this->getGC()->prev();
		}
		
		final public function values()
		{
			return $this->getGC()->values();
		}
	
		final public function add($__value)
		{
			throw new NotSupportedException(['target' => __METHOD__]);
		}
		
		final public function setSize($__size)
		{
			throw new NotSupportedException(['target' => __METHOD__]);
		}
		
		final public function offsetSet($__offset, $__value)
		{
			throw new NotSupportedException(['target' => __METHOD__]);
		}
		
		final public function offsetUnset($__offset)
		{
			throw new NotSupportedException(['target' => __METHOD__]);
		}
		
		final public static function fromArray($__array, $__saveIndexes = TRUE)
		{
			throw new NotSupportedException(['target' => __METHOD__]);
		}
	}