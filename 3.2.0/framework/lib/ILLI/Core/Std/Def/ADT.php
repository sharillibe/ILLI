<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_ADTClass;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADTInstance;
	USE ILLI\Core\Std\Def\ADT\ComponentInitializationException;
	USE ILLI\Core\Std\Def\ADT\ComponentMethodCallException;
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
		/**
		 * Instantiate a new Abstract Data Type Definition.
		 *
		 * ADT is the definition as is and doesn't store data.
		 *
		 * A definition can be a base-type or a collection of base-types:
		 * 	<long> forbids all except integers.
		 * 	<string|array> forbids all except strings and arrays.
		 *
		 * define ADT:
		 *
		 * :offset<long>
		 *	zero-based index
		 *
		 * :gcType<string>
		 *	a valid __const_Type
		 *
		 * @param	array $__defineTypes [{:offset} => {:gcType}]
		 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when $__defineTypes is not of type array
		 * @fires	ILLI\Core\Std\Exception\ArgumentLengthZeroException when $__defineTypes is an empty array
		 * @catchable	ILLI\Core\Std\Def\ADT\ComponentInitializationException
		 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_CTOR_E_P0_EXPECTED
		 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_CTOR_E_P0_LENGTH
		 * @see		::validate()
		 * @see		::__destruct()
		 * @see		ILLI\Core\Std\Def\__const_Type
		 * @see		ILLI\Core\Std\Def\ADTInstance
		 */
		public function __construct($__defineTypes = [])
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
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_CTOR_E_P0_EXPECTED)
						: new $e($E, $a, $e::ERROR_M_CTOR_E_P0_EXPECTED);
				}
					
				if([] === $__defineTypes)
				{
					$e = $c.'\ComponentMethodCallException';
					$E = new ArgumentLengthZeroException;
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_CTOR_E_P0_LENGTH)
						: new $e($E, $a, $e::ERROR_M_CTOR_E_P0_LENGTH);
				}
				
				$n = $this->createHashAddr($__defineTypes);
				$t = &self::$__gc[$n];		
				
				parent::setSize(1);
				parent::offsetSet(0, $n);
				
				if(FALSE === isset($t))
					$t = Fsb::fromArray($this->parseDef($__defineTypes));
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
		 * The type of given value equals with one of the registered gc-types.
		 *
		 * @param	mixed $__value
		 * @return	boolean
		 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
		 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_VALIDATE
		 * @see		ILLI\Core\Std\Def\__const_Type
		 */
		public function validate($__value)
		{
			try
			{
				return NULL !== $this->type($__value);
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
		 * Get the first matching ADT of value.
		 *
		 * @param	mixed $__value
		 * @return	NULL|ADT
		 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
		 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_TYPE
		 */
		public function type($__value)
		{
			try
			{
				$v = &$__value;
				$t = getType($v);
				
				foreach($this->getGC() as $h)
				{
					if($t === $h
					||($t === __const_Type::SPL_OBJECT && (class_exists($h) || interface_exists($h)) && (is_subclass_of($v, $h) || $v instanceOf $h)))
						return $h;
				}
				
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
		 * expected ADT
		 *
		 * compare gcType with $__expected
		 *
		 * @param	string $__expected
		 * @param	mixed $__value
		 * @return	boolean
		 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
		 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_TYPE
		 */
		public function is($__expected, $__value)
		{
			try
			{
				foreach((array) $__expected as $_)
					if($this->type($__value) === $__expected)
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
		
		#:define:
			/**
			 * ADT class-mapping
			 *
			 * :gcType<string>
			 *	a valid __const_Type
			 *
			 * :adtClass<string>
			 *	a valid __const_ADTClass
			 *
			 * @var		array [{:gcType} => {:adtClass}]
			 * @see		::define()
			 * @see		ILLI\Core\Std\Def\__const_ADTClass
			 * @see		ILLI\Core\Std\Def\__const_Type
			 * @note	ILLI\Core\Std\Def\__const_ADTClass::SPL_INSTANCE will be created by undefined type-requests in ::define()
			 */
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
			
			/**
			 * create ADT from __const_Type
			 *
			 * :rOffset<long>
			 *	offset in result-array
			 *
			 * :gcOffset<long>
			 *	zero-based index
			 *
			 * :gcType<string>
			 *	 a valid __const_Type or class-/interface-name
			 *
			 * @param	string	$__type 	{:gcType}
			 * @param	array 	$__type 	[{:rOffset} => {:gcType}]
			 * @param	array 	$__type 	[{:rOffset} => [{:gcOffset} => {:gcType}]]
			 * @return	ILLI\Core\Std\Def\ADT
			 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when {:gcType} is not of type string
			 * @fires	ILLI\Core\Std\Exception\ArgumentLengthZeroException when $__type is an empty array
			 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_DEFINE
			 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_DEFINE_E_P0_EXPECTED
			 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_DEFINE_E_P0_LENGTH
			 * @see		::$__def
			 * @see		ILLI\Core\Std\Def\ADTInstance
			 * @note	unlisted types: interpreting {:gcType} as class/interface and define the abstract-data-type as ADTInstance
			 */
			final public static function define($__type)
			{
				$c = get_called_class();
				
				try
				{
					if(FALSE === is_string($__type))
					{
						if(TRUE === is_array($__type))
						{
							if([] === $__type)
							{
								/*
								$e = $c.'\ComponentMethodCallException';
								$E = new ArgumentLengthZeroException;
								$a = ['method' => __METHOD__];
								throw ($c === __CLASS__ || FALSE === class_exists($e))
									? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_DEFINE_E_P0_LENGTH)
									: new $e($E, $a, $e::ERROR_M_DEFINE_E_P0_LENGTH);
								*/
								$__type = [__const_Type::SPL_VOID];
							}
							
							$r = [];
							
							foreach($__type as $k => $v)
								$r[$k] = self::define($v);
							
							return $r;
						}
						
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						$E = new ArgumentExpectedException([
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
						
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_DEFINE_E_P0_EXPECTED)
							: new $e($E, $a, $e::ERROR_M_DEFINE_E_P0_EXPECTED);
							
					}
					
					$n = &self::$__def[$__type];
					$a = func_get_args();
					
					if(FALSE === isset($n))
					{
						$a[0] = (array) $a[0];
						#+ instance-based ADT: ADTInstance<instanceOf myClass>
						#+ allow definition of ADT as subADT (ADT-classes are not listed as array-keys in ::$__def): ADTInstance<instanceOf ADT*>
						return Invoke::emitClass('ILLI\Core\Std\Def\ADTInstance', $a);
					}
					
					array_shift($a);
					
					#+ default ADT: ADTArray, ADTBoolean, ..., ADT*
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
			 * ADT definition gc
			 *
			 * :hashAddr<string>
			 *	absolute ADT:
			 * 		instance of get_called_class(): ILLI\Core\Std\Def\ADT*
			 *	anonymous ADT:
			 *		instance of __CLASS__:		ILLI\Core\Std\Def\ADT<hash>
			 *
			 * :adtDef<ILLI\Core\Std\Spl\Fsb>
			 *	collection of defined __const_Type(s)
			 *
			 * @var		array [{:hashAddr} => {:adtDef}]
			 * @note	anonymous ADT: temporary gc; absolute ADT: permanent gc
			 * @note	gc[{:hashAddr}] is traversable
			 * @see		:gc:ILLI\Core\Std\Spl\Fsb:
			 */
			private static $__gc = [];
		
			/**
			 * get gc hash address
			 *
			 * @return	string
			 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_GET_NAME
			 * @see		::$__gc
			 */
			final public function getName()
			{
				try
				{
					return parent::offsetGet(0);
				}
				catch(Exception $E)
				{
					$c = get_called_class();
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_GET_NAME)
						: new $e($E, $a, $e::ERROR_M_GET_NAME);
				}
			}
		
			/**
			 * get ADT-gc
			 *
			 * @return	ILLI\Core\Std\Spl\Fsb
			 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_GET_GC
			 * @see		::$__gc
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
			 * join registered gc-type(s)
			 *
			 * @return	ILLI\Core\Std\Spl\Fsb
			 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_TO_STRING
			 * @see		::$__gc
			 * @see		ILLI\Core\Std\Def\__const_Type
			 */
			final public function toString()
			{
				try
				{
					return implode('|', $this->getGC()->toArray());
				}
				catch(Exception $E)
				{
					$c = get_called_class();
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_TO_STRING)
						: new $e($E, $a, $e::ERROR_M_TO_STRING);
				}
			}
		
			/**
			 * validate typedef request
			 *
			 * :offset<long>
			 *	zero-based index
			 *
			 * :gcType<string>
			 *	a valid __const_Type
			 *
			 * @param	array $__defineTypes [{:offset} => {:gcType}]
			 * @return	array
			 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when $__defineTypes is not of type array
			 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when {:gcType} is not of type string
			 * @fires	ILLI\Core\Std\Exception\ArgumentLengthZeroException when result-array is empty
			 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_PARSE_DEF
			 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_PARSE_DEF_E_P0_EXPECTED
			 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_PARSE_DEF_E_P0_V_EXPECTED
			 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_PARSE_DEF_E_R_LENGTH
			 */
			protected function parseDef($__defineTypes)
			{
				$c = get_called_class();
				$e = $c.'\ComponentMethodCallException';
                                $a = ['method' => __METHOD__];
				
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
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_PARSE_DEF_E_P0_EXPECTED)
							: new $e($E, $a, $e::ERROR_M_PARSE_DEF_E_P0_EXPECTED);
					}
					
					$r = [];
					
					foreach($__defineTypes as $k => $v)
					{
						if(TRUE === is_string($v))
						{
							$r[$k] = $v;
							continue;
						}
						
						$E = new ArgumentExpectedException([
							'target'	=> $this->getName().'['.$k.']',
							'expected'	=> __const_TYPE::SPL_STRING, 
							'detected'	=> $t = getType($v),
							'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
						]);
						
						$a +=
						[
							'offset'	=> $k,
							'class'		=> $c
						];
						
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_PARSE_DEF_E_P0_V_EXPECTED)
							: new $e($E, $a, $e::ERROR_M_PARSE_DEF_E_P0_V_EXPECTED);
							
					}
					
					if([] !== $r)
						return $r;
					
					$E = new ArgumentLengthZeroException;
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_PARSE_DEF_E_R_LENGTH)
						: new $e($E, $a, $e::ERROR_M_PARSE_DEF_E_R_LENGTH);
				}
				catch(ComponentMethodCallException $E)
				{
					throw $E;
				}
				catch(Exception $E)
				{
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_TO_STRING)
						: new $e($E, $a, $e::ERROR_M_PARSE_DEF);
				}
			}
		
			/**
			 * Destroy anonymous ATD definitions
			 *
			 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_DTOR
			 */
			public function __destruct()
			{
				$c = get_called_class();
					
				try
				{
					if($c === __CLASS__)
						unset(self::$__gc[$this->getName()]);
				}
				catch(Exception $E)
				{
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_DTOR)
						: new $e($E, $a, $e::ERROR_M_DTOR);
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
			 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_CREATE_HASH_ADDR
			 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_CREATE_HASH_ADDR_E_P0_EXPECTED
			 * @see		::$__gc
			 */
			protected function createHashAddr($__defineTypes = [])
			{
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
					
					#~ performanced ADT: cache request by called-class; otherwise by hash
					return ($c = get_called_class()) === __CLASS__ ? Spl::nameWithHash($c, $this) : $c;
				}
				catch(ComponentMethodCallException $E)
				{
					throw $E;
				}
				catch(Exception $E)
				{
					$c = get_called_class();
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_CREATE_HASH_ADDR)
						: new $e($E, $a, $e::ERROR_M_CREATE_HASH_ADDR);
				}
			}
			
			#:ILLI\Core\Std\Spl\Fsb:
				#+ forward Fsb::*() to ::$__gc::*()
			
				/**
				 * @return	integer
				 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
				 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_GET_SIZE
				 */
				final public function getSize()
				{
					try
					{
						return $this->getGC()->getSize();
					}
					catch(Exception $E)
					{
						$c = get_called_class();
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_GET_SIZE)
							: new $e($E, $a, $e::ERROR_M_GET_SIZE);
					}
				}
				
				/**
				 * @return	integer
				 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
				 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_OFFSET_EXISTS
				 */
				final public function offsetExists($__offset)
				{
					try
					{
						return $this->getGC()->offsetExists($__offset);
					}
					catch(Exception $E)
					{
						$c = get_called_class();
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_OFFSET_EXISTS)
							: new $e($E, $a, $e::ERROR_M_OFFSET_EXISTS);
					}
				}
				
				/**
				 * @return	integer
				 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
				 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_OFFSET_GET
				 */
				final public function offsetGet($__offset)
				{
					try
					{
						return $this->getGC()->offsetGet($__offset);
					}
					catch(Exception $E)
					{
						$c = get_called_class();
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_OFFSET_GET)
							: new $e($E, $a, $e::ERROR_M_OFFSET_GET);
					}
				}
				
				/**
				 * @return	integer
				 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
				 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_COUNT
				 */
				final public function count()
				{
					try
					{
						return $this->getGC()->count();
					}
					catch(Exception $E)
					{
						$c = get_called_class();
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_COUNT)
							: new $e($E, $a, $e::ERROR_M_COUNT);
					}
				}
				
				/**
				 * @return	integer
				 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
				 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_CURRENT
				 */
				final public function current()
				{
					try
					{
						return $this->getGC()->current();
					}
					catch(Exception $E)
					{
						$c = get_called_class();
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_CURRENT)
							: new $e($E, $a, $e::ERROR_M_CURRENT);
					}
				}
				
				/**
				 * @return	integer
				 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
				 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_KEY
				 */
				final public function key()
				{
					try
					{
						return $this->getGC()->key();
					}
					catch(Exception $E)
					{
						$c = get_called_class();
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_KEY)
							: new $e($E, $a, $e::ERROR_M_KEY);
					}
				}
				
				/**
				 * @return	integer
				 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
				 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_NEXT
				 */
				final public function next()
				{
					try
					{
						return $this->getGC()->next();
					}
					catch(Exception $E)
					{
						$c = get_called_class();
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_NEXT)
							: new $e($E, $a, $e::ERROR_M_NEXT);
					}
				}
				
				/**
				 * @return	integer
				 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
				 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_REWIND
				 */
				final public function rewind()
				{
					try
					{
						return $this->getGC()->rewind();
					}
					catch(Exception $E)
					{
						$c = get_called_class();
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_REWIND)
							: new $e($E, $a, $e::ERROR_M_REWIND);
					}
				}
				
				/**
				 * @return	integer
				 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
				 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_VALID
				 */
				final public function valid()
				{
					try
					{
						return $this->getGC()->valid();
					}
					catch(Exception $E)
					{
						$c = get_called_class();
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_VALID)
							: new $e($E, $a, $e::ERROR_M_VALID);
					}
				}
				
				/**
				 * @return	integer
				 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
				 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_END
				 */
				final public function end()
				{
					try
					{
						return $this->getGC()->end();
					}
					catch(Exception $E)
					{
						$c = get_called_class();
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_END)
							: new $e($E, $a, $e::ERROR_M_END);
					}
				}
				
				/**
				 * @return	integer
				 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
				 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_KEYS
				 */
				final public function keys()
				{
					try
					{
						return $this->getGC()->keys();
					}
					catch(Exception $E)
					{
						$c = get_called_class();
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_KEYS)
							: new $e($E, $a, $e::ERROR_M_KEYS);
					}
				}
				
				/**
				 * @return	integer
				 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
				 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_PREV
				 */
				final public function prev()
				{
					try
					{
						return $this->getGC()->prev();
					}
					catch(Exception $E)
					{
						$c = get_called_class();
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_PREV)
							: new $e($E, $a, $e::ERROR_M_PREV);
					}
				}
				
				/**
				 * @return	integer
				 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
				 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_VALUES
				 */
				final public function values()
				{
					try
					{
						return $this->getGC()->values();
					}
					catch(Exception $E)
					{
						$c = get_called_class();
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_VALUES)
							: new $e($E, $a, $e::ERROR_M_VALUES);
					}
				}
			
				#:NotSupported:
					#! disable gc element modifiers
					
					/**
					 * @notSupported
				 	 * @fires	ILLI\Core\Std\Exception\NotSupportedException
				 	 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
				 	 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_SET_SIZE
					 */
					final public function setSize($__size)
					{
						$c = get_called_class();
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						$E = new NotSupportedException(['target' => __METHOD__]);
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_SET_SIZE)
							: new $e($E, $a, $e::ERROR_M_SET_SIZE);
					}
					
					/**
					 * @notSupported
				 	 * @fires	ILLI\Core\Std\Exception\NotSupportedException
				 	 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
				 	 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_OFFSET_SET
					 */
					final public function offsetSet($__offset, $__value)
					{
						$c = get_called_class();
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						$E = new NotSupportedException(['target' => __METHOD__]);
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_OFFSET_SET)
							: new $e($E, $a, $e::ERROR_M_OFFSET_SET);
					}
					
					/**
					 * @notSupported
				 	 * @fires	ILLI\Core\Std\Exception\NotSupportedException
				 	 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
				 	 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_OFFSET_UNSET
					 */
					final public function offsetUnset($__offset)
					{
						$c = get_called_class();
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						$E = new NotSupportedException(['target' => __METHOD__]);
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_OFFSET_UNSET)
							: new $e($E, $a, $e::ERROR_M_OFFSET_UNSET);
					}
					
					/**
					 * @notSupported
				 	 * @fires	ILLI\Core\Std\Exception\NotSupportedException
				 	 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
				 	 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_FROM_ARRAY
					 */
					final public static function fromArray($__array, $__saveIndexes = TRUE)
					{
						$c = get_called_class();
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						$E = new NotSupportedException(['target' => __METHOD__]);
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_FROM_ARRAY)
							: new $e($E, $a, $e::ERROR_M_FROM_ARRAY);
					}
				#::
			#::
		#::
	}