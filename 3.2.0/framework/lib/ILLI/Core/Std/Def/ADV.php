<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_ADVClass;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADT;
	USE ILLI\Core\Std\Def\ADVInstance;
	USE ILLI\Core\Std\Def\ADV\ComponentInitializationException;
	USE ILLI\Core\Std\Def\ADV\ComponentMethodCallException;
	USE ILLI\Core\Std\Exception\ArgumentExpectedException;
	USE ILLI\Core\Std\Exception\ArgumentLengthZeroException;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Std\Spl\FsbCollection;
	USE ILLI\Core\Util\Spl;
	USE Exception;

	/*
        // anonymous tuple:
        $a = new ADVTuple(['string']);
        $b = new ADVTuple(['integer']);
       
        // anonymous pair:
        $c = new ADVPair('directory', 'file', __DIR__, __FILE__);
        $d = new ADVPair('directory', 'string', __DIR__, __FILE__);
       
        // user-land anonymous
        class anonymous extends ADVPair
        {
                CONST __GC = __CLASS__; // must define GC-stop!
        }
       
        $e = new anonymous('directory', 'file', __DIR__, __FILE__);
        $f = new anonymous('directory', 'string', __DIR__, 'x');
       
        // user concrete
        class concrete extends ADVPair
        {
                // note: __GC is not defined!
        }
       
        $e = new concrete('directory', 'file', __DIR__, __FILE__);
        $f = new concrete('directory', 'string', __DIR__, 'x');		# exception: x is not a file -> prevly declared as dir/file
        */
        
        /**
         * @todo	differentiation prevly declared anonymous/concrete ADV, see ::__GC, ::create HashAddr, ::__construct(), ::$__gc
         */
	CLASS ADV
	{
		/**
		 * gc-stop: late-state comparison to differentiate anonymous/concrete instances
		 *
		 * @const	string __CLASS__
		 * @see		::createHashAddr()
		 * @see		::__destruct()
		 * @testing
		 */
		CONST __GC	= __CLASS__;
		
		/**
		 * stored value, type defined by ADT
		 *
		 * @var		mixed
		 * @see		::$__gc
		 */
		protected 	$__data		= NULL;
		
		/**
		 * Instantiate a new ADT-Value-Pair.
		 * 
		 * The ADV stores data. The expected data-type (definition) is defined by ADT-definition(s).
		 * A definition can be a base-type or a collection of base-types:
		 * 	<long> forbids all except integers.
		 * 	<string|array> forbids all except strings and arrays.
		 *
		 * :offset<long>
		 *	zero-based index
		 *
		 * :gcType<string>
		 *	a valid __const_Type
		 *
		 * @param	string	$__defineType	{:gcType}
		 * @param	array	$__defineType	[{:offset} => {:gcType}]
		 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when $__defineType is not of type array or string
		 * @fires	ILLI\Core\Std\Exception\ArgumentLengthZeroException when $__defineType is an empty array or string
		 * @catchable	ILLI\Core\Std\Def\ADV\ComponentInitializationException
		 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_M_CTOR_E_P0_EXPECTED
		 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_M_CTOR_E_P0_LENGTH
		 * @see		ILLI\Core\Std\Def\ADV::__construct()
		 * @see		ILLI\Core\Std\Def\ADT::define()
		 */
		public function __construct($__defineType)
		{
			$c = get_called_class();
			
			try
			{	
				if(FALSE === is_array($__defineType)
				&& FALSE === is_string($__defineType))
				{
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					$E = new ArgumentExpectedException
					([
						'target'	=> $c,
						'expected'	=> implode('|', [__const_Type::SPL_ARRAY, __const_Type::SPL_STRING]),
						'detected'	=> $t = getType($v = $__defineType),
						'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
					]);
					
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_CTOR_E_P0_EXPECTED)
						: new $e($E, $a, $e::ERROR_M_CTOR_E_P0_EXPECTED);
				}
				
				if(!$__defineType)
				{
					$e = $c.'\ComponentMethodCallException';
					$E = new ArgumentLengthZeroException;
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_CTOR_E_P0_LENGTH)
						: new $e($E, $a, $e::ERROR_M_CTOR_E_P0_LENGTH);
				}
				
				$t = &self::$__gc[$this->__name = $this->createHashAddr($d = (array) $__defineType)];
				
				if(TRUE === isset($t))
					return;
				
				$t = FsbCollection::fromArray(ADT::define($d));
			}
			catch(Exception $E)
			{
				$e = $c.'\ComponentInitializationException';
				$a = ['class' => $c];
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentInitializationException($E, $a)
					: new $e($E, $a);
			}
		}
		
		/**
		 * value validation
		 *
		 * use ADT to validate the value
		 *
		 * @param	mixed $__value
		 * @return	boolean
		 * @catchable	ILLI\Core\Std\Def\ADV\ComponentMethodCallException
		 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_M_VALIDATE
		 * @see		ILLI\Core\Std\Def\ADT::validate()
		 */
		public function validate($__value = NULL)
		{
			try
			{
				NULL !== $__value ?: $__value = $this->__data;
				return $this->getGC()->evaluate('validate', [$__value]);
			}
			catch(Exception $E)
			{
				$c = get_called_class();
				$e = $c.'\ComponentMethodCallException';
				$a = ['method' => __METHOD__];
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_VALIDATE)
					: new $e($E, $a, $e::ERROR_M_VALIDATE);
			}
		}
		
		/**
		 * value ADT
		 *
		 * get the first matching ADT of value. use ::$__data when $__value is NULL.
		 *
		 * T = new <long|double>5
		 * T::type()			// -> T = 5: return <long>ADT
		 * T::type(10)			// -> $__value is acceptable: return <long>ADT
		 * T::type(5.5)			// -> $__value is acceptable: return <double>ADT
		 * T::type('foo')		// -> nothing matched, return NULL
		 *
		 * M = new <class|function|closure>function(){}
		 * M::type(0) 			// -> closure
		 *
		 * @param	mixed $__value
		 * @return	ILLI\Core\Std\Def\ADT	first matching ADT
		 * @return	NULL			nothing matched
		 * @catchable	ILLI\Core\Std\Def\ADV\ComponentMethodCallException
		 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_M_TYPE
		 */
		public function type($__value = NULL)
		{
			try
			{
				NULL !== $__value ?: $__value = $this->__data;
				if(NULL === $__value)
					return NULL;
				
				foreach($this->getGC() as $ADT)
					if(TRUE === $ADT->validate($__value))
						return $ADT;
					
				return NULL;
			}
			catch(Exception $E)
			{
				$c = get_called_class();
				$e = $c.'\ComponentMethodCallException';
				$a = ['method' => __METHOD__];
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_TYPE)
					: new $e($E, $a, $e::ERROR_M_TYPE);
			}
		}
		
		/**
		 * value expected
		 *
		 * T = new <long>5
		 * T::isVal('long')		// true -> <long>T[0] = 5
		 * T::isVal('long', 10)		// true -> <long>T[0] accepts int
		 * T::isVal('long', 5.5)	// false -> <long>T[0] accepts int
		 * T::isVal('double')		// false -> no <double>ADT found
		 * T::isVal('double', 10)	// false -> no <double>ADT found
		 * T::isVal('long', 10.5)	// false -> no <double>ADT found
		 *
		 * @param	string $__expected
		 * @param	mixed $__value
		 * @return	TRUE		ADT is an instance of $__expected or $__expected is an acceptable gcType
		 * @return	FALSE		nothing matched
		 * @catchable	ILLI\Core\Std\Def\ADV\ComponentMethodCallException
		 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_M_IS
		 */
		public function is($__expected, $__value = NULL)
		{
			try
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
			catch(Exception $E)
			{
				$c = get_called_class();
				$e = $c.'\ComponentMethodCallException';
				$a = ['method' => __METHOD__];
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_IS)
					: new $e($E, $a, $e::ERROR_M_IS);
			}
		}
		
		/**
		 * store data when type equals with ADT
		 *
		 * @param	mixed $__value
		 * @return	this
		 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException on validation-fail
		 * @catchable	ILLI\Core\Std\Def\ADV\ComponentMethodCallException
		 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_M_SET
		 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_M_SET_E_P0_EXPECTED
		 * @see		::validate()
		 */
		public function set($__value)
		{
			$c = get_called_class();
			$e = $c.'\ComponentMethodCallException';
			$a = ['method' => __METHOD__];
				
			try
			{
				if(TRUE === $this->validate($__value))
				{
					$this->__data = $__value;
					return $this;
				}
				
				$E = new ArgumentExpectedException
				([
					'target'	=> $c,
					'expected'	=> implode('|', array_unique($this->getGC()->invoke('toString'))),
					'detected'	=> $t = getType($v = $__value),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
				
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_SET_E_P0_EXPECTED)
					: new $e($E, $a, $e::ERROR_M_SET_E_P0_EXPECTED);
				
			}
			catch(ComponentMethodCallException $E)
			{
				throw $E;
			}
			catch(Exception $E)
			{
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_SET)
					: new $e($E, $a, $e::ERROR_M_SET);
			}
		}
		
		/**
		 * get the stored data or NULL when nothing was set
		 *
		 * @return	mixed|NULL
		 * @catchable	ILLI\Core\Std\Def\ADV\ComponentMethodCallException
		 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_M_GET
		 */
		public function get()
		{
			try
			{
				return $this->__data;
			}
			catch(Exception $E)
			{
				$c = get_called_class();
				$e = $c.'\ComponentMethodCallException';
				$a = ['method' => __METHOD__];
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_GET)
					: new $e($E, $a, $e::ERROR_M_GET);
			}
		}
		
		#:define:
			/**
			 * ADV class-mapping
			 *
			 * :gcType<string>
			 *	a valid __const_Type
			 *
			 * :advClass<string>
			 *	a valid __const_ADVClass
			 *
			 * @var		array [{:type} => {:advClass}]
			 * @see		::value()
			 * @see		ILLI\Core\Std\Def\__const_ADVClass
			 * @see		ILLI\Core\Std\Def\__const_Type
			 * @note	you can not define a NULL-value-pair
			 * @note	ILLI\Core\Std\Def\__const_ADVClass::SPL_INSTANCE will be created by ::value()
			 */
			private static $__def = 
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
			
			/**
			 * create ADV from __const_Type
			 *
			 * :gcType<string>
			 *	 a valid __const_Type or class-/interface-name
			 *
			 * @param	string $__type {:gcType}
			 * @return	ILLI\Core\Std\Def\ADV
			 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when $__type is not of type string
			 * @catchable	ILLI\Core\Std\Def\ADV\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_M_DEFINE
			 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_M_DEFINE_E_P0_EXPECTED
			 * @see		::$__adv
			 * @see		ILLI\Core\Std\Def\ADVInstance
			 * @note	unlisted types: interpreting {:gcType} as class/interface and define the type-value-pair as ADVInstance
			 */
			final public static function define($__type)
			{
				$c = get_called_class();
				
				try
				{
					if(FALSE === is_string($__type))
					{
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						$E = new ArgumentExpectedException([
							'target'	=> __METHOD__,
							'expected'	=> __const_Type::SPL_STRING.' ILLI\Core\Std\Def\__const_Type::SPL*',
							'detected'	=> getType($v = $__type),
							'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
						]);
						
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_DEFINE_E_P0_EXPECTED)
							: new $e($E, $a, $e::ERROR_M_DEFINE_E_P0_EXPECTED);
					}
					
					$n = &self::$__def[$__type];
					
					if(FALSE === isset($n))
						#+ instance-based ADV: ADTInstance<instanceOf myClass>
						#+ allow definition of ADV as subADT: ADVInstance<instanceOf ADV*>
						return Invoke::emitClass('ILLI\Core\Std\Def\ADVInstance', func_get_args());
					
					$a = func_get_args();
					array_shift($a);
					
					#+ default ADV: ADVArray, ADVBoolean, ..., ADV*
					return Invoke::emitClass($n, $a);
				}
				catch(ComponentMethodCallException $E)
				{
					throw $E;
				}
				catch(Exception $E)
				{
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_DEFINE)
						: new $e($E, $a, $e::ERROR_M_DEFINE);
				}
			}
		#::
		
		#:gc:
			/**
			 * ADV definition gc
			 *
			 * :hashAddr<string>
			 * 	instance of get_called_class(): ILLI\Core\Std\Def\ADT*
			 *	instance of __CLASS__:		ILLI\Core\Std\Def\ADT<hash>
			 *
			 * :ADT<ILLI\Core\Std\Def\ADT>
			 *	the ADT for the type-value-pair
			 *
			 * @var		array [{:hashAddr} => ILLI\Core\Std\Spl\FsbCollection[long offset => {:ADT}]]
			 */
			private static	$__gc		= [];
		
			/**
			 * gc hash address
			 *
			 * @var		mixed
			 * @see		::$__gc
			 */
			private 	$__name		= NULL;
		
			/**
			 * get ADT definition
			 *
			 * @return 	ILLI\Core\Std\Spl\FsbCollection
			 * @catchable	ILLI\Core\Std\Def\ADV\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_M_GET_GC
			 */
			final public function getGC()
			{
				try
				{
					return self::$__gc[$this->getName()];
				}
				catch(Exception $E)
				{
					$c = get_called_class();
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_GET_GC)
						: new $e($E, $a, $e::ERROR_M_GET_GC);
				}
			}
			
			/**
			 * get gc hash address
			 *
			 * @return	string
			 * @catchable	ILLI\Core\Std\Def\ADV\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_GET_NAME
			 * @see		::$__gc
			 */
			final public function getName()
			{
				try
				{
					return $this->__name;
				}
				catch(Exception $E)
				{
					$c = get_called_class();
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_M_GET_NAME)
						: new $e($E, $a, $e::ERROR_M_GET_NAME);
				}
			}
		
			/**
			 * generate gc-hash-address from called-class or from spl_object_hash
			 *
			 * :offset<long>
			 *	zero-based index
			 *
			 * :gcType<string>
			 *	a valid __const_Type
			 *
			 * @param	array $__defineTypes [{:offset} => {:gcType}]
			 * @return	string
			 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when $__defineTypes is not of type array
			 * @catchable	ILLI\Core\Std\Def\ADV\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_CREATE_HASH_ADDR
			 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_M_CREATE_HASH_ADDR_E_P0_EXPECTED
			 * @see		::$__gc
			 */
			protected function createHashAddr($__defineTypes = [])
			{
				$c = get_called_class();
				
				try
				{
					if(FALSE === is_array($__defineTypes))
					{
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						$E = new ArgumentExpectedException
						([
							'target'	=> $c,
							'expected'	=> __const_Type::SPL_ARRAY,
							'detected'	=> $t = getType($v = $__defineTypes),
							'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
						]);
						
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_CREATE_HASH_ADDR_E_P0_EXPECTED)
							: new $e($E, $a, $e::ERROR_M_CREATE_HASH_ADDR_E_P0_EXPECTED);
					}
					
					#~ performanced ADV: cache request by called-class; otherwise by hash
					return $c === static::__GC ? Spl::nameWithHash(static::__GC, $this) : $c;
				}
				catch(ComponentMethodCallException $E)
				{
					throw $E;
				}
				catch(Exception $E)
				{
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_CREATE_HASH_ADDR)
						: new $e($E, $a, $e::ERROR_M_CREATE_HASH_ADDR);
				}
			}
		
			/**
			 * Destroy anonymous ATV definitions
			 *
			 * @catchable	ILLI\Core\Std\Def\ADV\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_M_DTOR
			 */
			public function __destruct()
			{
				$c = get_called_class();
				
				try
				{
					if($c === static::__GC)
						unset(self::$__gc[$this->getName()]);
				}
				catch(Exception $E)
				{
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_DTOR)
						: new $e($E, $a, $e::ERROR_DTOR);
				}
			}
		#::
	}