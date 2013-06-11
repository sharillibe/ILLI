<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_ADVClass;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADT;
	USE ILLI\Core\Std\Def\ADVInstance;
	USE ILLI\Core\Std\Exception\ArgumentExpectedException;
	USE ILLI\Core\Std\Exception\ArgumentLengthZeroException;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Std\Spl\FsbCollection;
	USE ILLI\Core\Util\Spl;
	USE Exception;
	USE Closure;

	CLASS ADV
	{
		CONST __GC	= __CLASS__;
		
		protected 	$__data		= NULL;
		
		private 	$__name		= NULL;
		private static	$__gc		= [];
		private static	$__def = 
		[
			__const_Type::SPL_ARRAY			=> __const_ADVClass::SPL_ARRAY,
			__const_Type::SPL_STRICT_ARRAY		=> __const_ADVClass::SPL_STRICT_ARRAY,
			__const_Type::SPL_BOOLEAN		=> __const_ADVClass::SPL_BOOLEAN,
			__const_Type::SPL_CALLABLE		=> __const_ADVClass::SPL_CALLABLE,
			__const_Type::SPL_CLASS			=> __const_ADVClass::SPL_CLASS,
			__const_Type::SPL_CLOSURE		=> __const_ADVClass::SPL_CLOSURE,
			__const_Type::SPL_DIRECTORY		=> __const_ADVClass::SPL_DIRECTORY,
			__const_Type::SPL_DOUBLE		=> __const_ADVClass::SPL_DOUBLE,
			__const_Type::SPL_FILE			=> __const_ADVClass::SPL_FILE,
			__const_Type::SPL_FLAG			=> __const_ADVClass::SPL_FLAG,
			__const_Type::SPL_FLOAT			=> __const_ADVClass::SPL_DOUBLE,
			__const_Type::SPL_FUNCTION		=> __const_ADVClass::SPL_FUNCTION,
			__const_Type::SPL_INTERFACE		=> __const_ADVClass::SPL_INTERFACE,
			__const_Type::SPL_INTEGER		=> __const_ADVClass::SPL_LONG,
			__const_Type::SPL_LONG			=> __const_ADVClass::SPL_LONG,
			__const_Type::SPL_METHOD		=> __const_ADVClass::SPL_METHOD,
			__const_Type::SPL_OBJECT		=> __const_ADVClass::SPL_OBJECT,
			__const_Type::SPL_PAIR			=> __const_ADVClass::SPL_PAIR,
			__const_Type::SPL_RESOURCE		=> __const_ADVClass::SPL_RESOURCE,
			__const_Type::SPL_STRING		=> __const_ADVClass::SPL_STRING,
			__const_Type::SPL_TRAIT			=> __const_ADVClass::SPL_TRAIT,
			__const_Type::SPL_TUPLE			=> __const_ADVClass::SPL_TUPLE
		];
		
		protected function createHashAddr($__defineTypes = [])
		{
			if(FALSE === is_array($__defineTypes))
				throw new ArgumentExpectedException
				([
					'target'	=> get_called_class(),
					'expected'	=> __const_Type::SPL_ARRAY,
					'detected'	=> $t = getType($v = $__defineTypes),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			return ($c = get_called_class()) === static::__GC ? Spl::nameWithHash(static::__GC, $this) : $c;
		}
		
		public function __construct($__defineType)
		{
			if(FALSE === is_array($__defineType)
			&& FALSE === is_string($__defineType))
				throw new ArgumentExpectedException
				([
					'target'	=> get_called_class(),
					'expected'	=> implode('|', [__const_Type::SPL_ARRAY, __const_Type::SPL_STRING]),
					'detected'	=> $t = getType($v = $__defineType),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			if([] === $__defineType || '' === $__defineType)
				throw new ArgumentLengthZeroException;
			
			$t = &self::$__gc[$this->__name = $this->createHashAddr($d = (array) $__defineType)];
			
			if(FALSE === isset($t))
				$t = FsbCollection::fromArray(ADT::define($d));
		}
		
		public function __clone()
		{
			static $__STATIC_map;
			
			isset($__STATIC_map) ? $__STATIC_map : $__STATIC_map = function($__value)
			{
				if(FALSE === is_object($__value))
					return $__value;
				
				if($__value instanceOf Closure)
					$__value->bindTo($this);
				
				return clone $__value;
			};
			
			if(is_array($this->__data))
			{
				foreach($this->__data as $k => $v)
					$this->__data[$k] = $__STATIC_map($v);
			}
			else
			if(is_object($this->__data))
			{
				$this->__data = clone $__STATIC_map($this->__data);
			}
		}
		
		public function validate($__value = NULL)
		{
			NULL !== $__value ?: $__value = $this->__data;
			
			return $this->getGC()->evaluate('validate', [$__value]);
		}
		
		public function type($__value = NULL)
		{
			NULL !== $__value ?: $__value = $this->__data;
			
			if(NULL === $__value)
				return NULL;
			
			foreach($this->getGC() as $ADT)
				if(TRUE === $ADT->validate($__value))
					return $ADT;
				
			return NULL;
		}
		
		public function is($__expected, $__value = NULL)
		{
			NULL !== $__value ?: $__value = $this->__data;
			
			if(NULL === ($ADT = $this->type($__value)))
				return FALSE;
				
			foreach((array) $__expected as $_)
				if($ADT instanceOf $_
				|| in_array($_, $ADT->getGC()->toArray()))
					return TRUE;
				
			return FALSE;
		}
		
		public function set($__value)
		{
			if(FALSE === $this->validate($__value))
				throw new ArgumentExpectedException
				([
					'target'	=> get_called_class(),
					'expected'	=> implode('|', array_unique($this->getGC()->invoke('toString'))),
					'detected'	=> $t = getType($v = $__value),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			$this->__data = $__value;
			return $this;
		}
		
		public function get()
		{
			return $this->__data;
		}
			
		final public static function define($__type)
		{
			if(FALSE === is_string($__type))
				throw new ArgumentExpectedException([
					'target'	=> __METHOD__,
					'expected'	=> __const_Type::SPL_STRING.' ILLI\Core\Std\Def\__const_Type::SPL*',
					'detected'	=> getType($v = $__type),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			$n = &self::$__def[$__type];
			
			if(FALSE === isset($n))
				return Invoke::emitClass('ILLI\Core\Std\Def\ADVInstance', func_get_args());
			
			$a = func_get_args();
			array_shift($a);
			
			return Invoke::emitClass($n, $a);
		}
		
		final public function getGC()
		{
			return self::$__gc[$this->getName()];
		}
		
		final public function getName()
		{
			return $this->__name;
		}
		
		public function __destruct()
		{
			if(get_called_class() === static::__GC)
				unset(self::$__gc[$this->getName()]);
		}
	}