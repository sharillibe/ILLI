<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADT;
	USE ILLI\Core\Std\Def\ADVTuple\ComponentMethodCallException;
	USE ILLI\Core\Std\Def\ADVTuple\ComponentInitializationException;
	USE ILLI\Core\Std\Exception\ArgumentExpectedException;
	USE ILLI\Core\Std\Exception\ArgumentLengthZeroException;
	USE ILLI\Core\Std\Exception\IndexInUseException;
	USE ILLI\Core\Std\Exception\IndexOutOfRangeException;
	USE ILLI\Core\Std\Exception\ClassConstantNotFoundException;
	USE ILLI\Core\Std\Spl\Fsb;
	USE ILLI\Core\Std\Spl\FsbCollection;
	USE Exception;
	
	CLASS ADVTuple EXTENDS \ILLI\Core\Std\Def\ADV
	{
		#:ILLI\Core\Std\Def\ADV:
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
			 * Instantiate a new ADT-Value-Pair for value of type tuple.
			 *
			 * A tuple is an object capable to hold a collection of elements. Each element can be of a different type.
			 *
			 * :offset<long>
			 *	zero-based index
			 *
			 * :gcType<string>
			 *	a valid __const_Type
			 *
			 * @param	array	$__defineOffsetType	[{:offset} => {:gcType}]
		 	 * @param	array	$__data			the initial data [{:offset} => {:gcValue}]
			 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when $__defineOffsetType is not of type array
			 * @fires	ILLI\Core\Std\Exception\ArgumentLengthZeroException when $__defineOffsetType is an empty array
			 * @catchable	ILLI\Core\Std\Def\ADVTuple\ComponentInitializationException
			 * @throws	ILLI\Core\Std\Def\ADVTuple\ComponentMethodCallException::ERROR_M_CTOR_E_P0_EXPECTED
			 * @throws	ILLI\Core\Std\Def\ADVTuple\ComponentMethodCallException::ERROR_M_CTOR_E_P0_LENGTH
			 * @see		ILLI\Core\Std\Def\ADV::__construct()
			 * @see		ILLI\Core\Std\Def\ADT::define()
			 *
			 * @testing	ADT collection-cache:
			 * 			::$__gc stores the full-matrix only.
			 * 			to bypass hundrets of FsbCollections and ADT*-instances of the same type we need a local static ADT-cache
			 *			to x-link from $__STATIC_adt[typeAddr]->typeCollection -> ::$__gc[tuplename][index]->typeCollection
			 */
			public function __construct($__defineOffsetType, $__data = NULL)
			{
				$c = get_called_class();
				
				try
				{
					if(FALSE === is_array($__defineOffsetType))
					{
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						$E = new ArgumentExpectedException
						([
							'target'	=> $c,
							'expected'	=> __const_Type::SPL_ARRAY,
							'detected'	=> $t = getType($v = $__defineOffsetType),
							'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
						]);
						
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_CTOR_E_P0_EXPECTED)
							: new $e($E, $a, $e::ERROR_M_CTOR_E_P0_EXPECTED);
					}
					
					if([] === $__defineOffsetType)
					{
						$e = $c.'\ComponentMethodCallException';
						$E = new ArgumentLengthZeroException;
						$a = ['method' => __METHOD__];
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_CTOR_E_P0_LENGTH)
							: new $e($E, $a, $e::ERROR_M_CTOR_E_P0_LENGTH);
					}
					
					parent::__construct([__const_Type::SPL_ARRAY]);
					
					$t = &self::$__gc[$this->getName()];
					
					if(TRUE === isset($t))
					{
						$this->set((array) $__data);
						return;
					}
					
					$d = $this->parseDef($__defineOffsetType);
					$r = [];
					
					static $__STATIC_adt;
					isset($__STATIC_adt) ?: $__STATIC_adt = [];
					
					foreach($d as $i => $o)
					{
						$o = (array) $o;
						if([] !== $o)
						{
							$q = $o;
							sort($q);
							$q = implode('|', array_unique($q));
							
							if(FALSE === isset($__STATIC_adt[$q]))
								$__STATIC_adt[$q] = FsbCollection::fromArray(ADT::define($o));
							
							$r[] = &$__STATIC_adt[$q];
						}
						else
						{
							throw new Exception('test this... void?');
							//$r[] = FsbCollection::fromArray([]);
						}
					}
					
					$t = Fsb::fromArray($r);
					
					$this->set((array) $__data);
				}
				catch(ComponentInitializationException $E)
				{
					throw $E;
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
					FALSE === ($__value instanceOf FsbCollection) ?: $__value = $__value->toArray();
					
					if(FALSE === parent::validate($__value))
						return FALSE;
						
					foreach($__value as $k => $v)
					{
						if(NULL !== $v
						&& FALSE === $this->validateVal($k, $v))
							return FALSE;
					}
					
					return TRUE;
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
			 * M::type()	 		// -> closure
			 *
			 * @param	mixed $__value
			 * @return	ILLI\Core\Std\Def\ADT	first matching ADT
			 * @return	NULL			nothing matched
			 * @catchable	ILLI\Core\Std\Def\ADV\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_M_TYPE
			 * @note	ADT for ADVTuple::$__data is of type ADVArray
			 */
			public function type($__value = NULL)
			{
				try
				{
					NULL !== $__value ?: $__value = $this->__data;
					return parent::type($__value instanceOf FsbCollection ? $__value->toArray() : $__value);
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
					return parent::is($__expected, $__value instanceOf FsbCollection ? $__value->toArray() : $__value);
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
			 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException on offset-value validation-fail
			 * @catchable	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_SET
			 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_SET_E_P0_EXPECTED
			 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_SET_E_P0_V_EXPECTED
			 * @see		::validate()
			 */
			public function set($__value)
			{
				$c = get_called_class();
				$e = $c.'\ComponentMethodCallException';
				$a = ['method' => __METHOD__];
					
				try
				{
					FALSE === ($__value instanceOf FsbCollection) ?: $__value = $__value->toArray();
					
					if(FALSE === parent::validate($__value))
					{
						$E = new ArgumentExpectedException
						([
							'target'	=> get_called_class(),
							'expected'	=> implode('|', array_unique($this->getGC()->invoke('toString'))),
							'detected'	=> $t = getType($v = $__value),
							'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
						]);
						
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_SET_E_P0_EXPECTED)
							: new $e($E, $a, $e::ERROR_M_SET_E_P0_EXPECTED);
					}
					
					$r = array_fill_keys(range(0, $this->getTupleGC()->getSize() - 1), NULL);
					
					foreach($this->getTupleGC() as $k => $GC)
					{
						if(FALSE === isset($__value[$k])
						|| NULL === $__value[$k])
							continue;
						
						$v = &$__value[$k];
						
						if(FALSE === $GC->evaluate('validate', [$v]))
						{
							$E = new ArgumentExpectedException([
								'target'	=> $this->getName().'['.$k.']',
								'expected'	=> implode('|', array_unique($GC->invoke('toString'))), 
								'detected'	=> $t = getType($v),
								'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
							]);
							
							$a +=
							[
								'offset'	=> $k,
								'class'		=> $c
							];
							
							throw ($c === __CLASS__ || FALSE === class_exists($e))
								? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_SET_E_P0_V_EXPECTED)
								: new $e($E, $a, $e::ERROR_M_SET_E_P0_V_EXPECTED);
						}
						
						$r[$k] = &$v;
					}
					
					$this->__data = FsbCollection::fromArray($r);
					return $this;
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
		#::
		
		/**
		 * direct access by constant name
		 *
		 * @param 	string 	$__constantName		constant with defined tuple index
		 * @param	mixed	$__value		type based on ADT
		 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when $__constantName is of type numeric or not of type string
		 * @fires	ILLI\Core\Std\Exception\ClassConstantNotFoundException when $__constantName is not a declared constant
		 * @fires	ILLI\Core\Std\Exception\IndexOutOfRangeException when value of $__constantName is not in tuple scope
		 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException $__value validation-fail
		 * @catchable	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M___SET
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M___SET_E_P0_EXPECTED
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M___SET_E_P0_NOT_DEFINED
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M___SET_E_P0_OUT_OF_RANGE
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M___SET_E_P1_EXPECTED
		 */
		public function __set($__constantName, $__value)
		{
			$c = get_called_class();
			$e = $c.'\ComponentMethodCallException';
			$a = ['method' => __METHOD__];
			
			try
			{
				if(FALSE === is_string($__constantName)
				|| TRUE === is_numeric($__constantName))
				{
					$E = new ArgumentExpectedException
					([
						'target'	=> get_called_class(),
						'expected'	=> __const_Type::SPL_STRING,
						'detected'	=> $t = getType($v = $__constantName),
						'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
					]);
					
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M___SET_E_P0_EXPECTED)
						: new $e($E, $a, $e::ERROR_M___SET_E_P0_EXPECTED);
				}
				
				if(FALSE === defined($constName = get_called_class().'::'.$__constantName))
				{
					$E = new ClassConstantNotFoundException(['class' => $c, 'const' => $__constantName]);
					
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M___SET_E_P0_NOT_DEFINED)
						: new $e($E, $a, $e::ERROR_M___SET_E_P0_NOT_DEFINED);
				}
				
				$constValue = constant($constName);
				
				if(FALSE === isset($this->__data[$constValue]))
				{
					$E = new IndexOutOfRangeException([
						'offset'	=> $constValue,
					]);
					
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M___SET_E_P0_OUT_OF_RANGE)
						: new $e($E, $a, $e::ERROR_M___SET_E_P0_OUT_OF_RANGE);
				}
				
				if(FALSE === $this->validateVal($constValue, $__value))
				{
					$E = new ArgumentExpectedException([
						'target'	=> $this->getName().'['.$constValue.'] ('.$__constantName.')',
						'expected'	=> implode('|', array_unique($this->getValGC($constValue)->invoke('toString'))), 
						'detected'	=> $t = getType($v = $__value),
						'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
					]);
					
					$a +=
					[
						'offset'	=> $__constantName,
						'class'		=> $c
					];
					
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M___SET_E_P1_EXPECTED)
						: new $e($E, $a, $e::ERROR_M___SET_E_P1_EXPECTED);
				}
				
				$this->__data[$constValue] = $__value;
				
				return $this;
			}
			catch(ComponentMethodCallException $E)
			{
				throw $E;
			}
			catch(Exception $E)
			{
				$a = ['method' => __METHOD__];
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M___SET)
					: new $e($E, $a, $e::ERROR_M___SET);
			}
		}
		
		/**
		 * direct access by constant name
		 *
		 * @param 	string 	$__constantName		constant with defined tuple index
		 * @return	mixed	type based on ADT
		 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when $__constantName is of type numeric or not of type string
		 * @fires	ILLI\Core\Std\Exception\ClassConstantNotFoundException when $__constantName is not a declared constant
		 * @fires	ILLI\Core\Std\Exception\IndexOutOfRangeException when value of $__constantName is not in tuple scope
		 * @catchable	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M___GET
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M___GET_E_P0_EXPECTED
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M___GET_E_P0_NOT_DEFINED
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M___GET_E_P0_OUT_OF_RANGE
		 */
		public function __get($__constantName)
		{
			$c = get_called_class();
			$e = $c.'\ComponentMethodCallException';
			$a = ['method' => __METHOD__];
			
			try
			{
				if(FALSE === is_string($__constantName)
				|| TRUE === is_numeric($__constantName))
				{
					$E = new ArgumentExpectedException
					([
						'target'	=> get_called_class(),
						'expected'	=> __const_Type::SPL_STRING,
						'detected'	=> $t = getType($v = $__constantName),
						'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
					]);
					
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M___GET_E_P0_EXPECTED)
						: new $e($E, $a, $e::ERROR_M___GET_E_P0_EXPECTED);
				}
				
				if(FALSE === defined($constName = get_called_class().'::'.$__constantName))
				{
					$E = new ClassConstantNotFoundException(['class' => $c, 'const' => $__constantName]);
					
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M___GET_E_P0_NOT_DEFINED)
						: new $e($E, $a, $e::ERROR_M___GET_E_P0_NOT_DEFINED);
				}
				
				$constValue = constant($constName);
				
				if(FALSE === isset($this->__data[$constValue]))
				{
					$E = new IndexOutOfRangeException([
						'offset'	=> $constValue,
					]);
					
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M___GET_E_P0_OUT_OF_RANGE)
						: new $e($E, $a, $e::ERROR_M___GET_E_P0_OUT_OF_RANGE);
				}
				
				return $this->__data[$constValue];
			}
			catch(ComponentMethodCallException $E)
			{
				throw $E;
			}
			catch(Exception $E)
			{
				$a = ['method' => __METHOD__];
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M___GET)
					: new $e($E, $a, $e::ERROR_M___GET);
			}
		}
		
		/**
		 * merge offset ADT collection
		 *
		 * "define" can not overide "defined":
		 *
		 * 	$new = [1 => long, 2 => string]
		 * 	merge($new, [0 => double, 1 => string] // error offset 1: defined as string
		 *
		 * 	$new = [2 => long, 3 => string]
		 * 	merge($new, [0 => double, 1 => string] // [0 => double, 1 => string, 2 => long, 3 => string]
		 *
		 * @param	array	$__define	tuple ADT
		 * @param	array	$__defined	proto ADT
		 * @return	array
		 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when $__define is not of type array
		 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when $__defined is not of type array
		 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when offset in $__define is not of type long
		 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when offset in $__defined is not of type long
		 * @fires	ILLI\Core\Std\Exception\IndexInUseException when offset in $__define is declared as offset in $__defined
		 * @catchable	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_MERGE_OFFSET_TYPES
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_MERGE_OFFSET_TYPES_E_P0_EXPECTED
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_MERGE_OFFSET_TYPES_E_P1_EXPECTED
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_MERGE_OFFSET_TYPES_E_P0_K_EXPECTED
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_MERGE_OFFSET_TYPES_E_P1_K_EXPECTED
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_MERGE_OFFSET_TYPES_E_P1_K_IN_USE
		 */
		public static function mergeOffsetTypes($__define, $__defined)
		{
			$c = get_called_class();
			$e = $c.'\ComponentMethodCallException';
			$a = ['method' => __METHOD__];
			
			try
			{
				if(FALSE === is_array($__define))
				{
					$E = new ArgumentExpectedException
					([
						'target'	=> get_called_class(),
						'expected'	=> __const_Type::SPL_ARRAY,
						'detected'	=> $t = getType($v = $__define),
						'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
					]);
					
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_MERGE_OFFSET_TYPES_E_P0_EXPECTED)
						: new $e($E, $a, $e::ERROR_M_MERGE_OFFSET_TYPES_E_P0_EXPECTED);
				}
				
				if(FALSE === is_array($__defined))
				{
					$E = new ArgumentExpectedException
					([
						'target'	=> get_called_class(),
						'expected'	=> __const_Type::SPL_ARRAY,
						'detected'	=> $t = getType($v = $__define),
						'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
					]);
					
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_MERGE_OFFSET_TYPES_E_P1_EXPECTED)
						: new $e($E, $a, $e::ERROR_M_MERGE_OFFSET_TYPES_E_P1_EXPECTED);
				}
				
				$r = [];
				
				foreach($__defined as $const => $value)
				{
					if(FALSE === is_integer($const))
					{
						$E = new ArgumentExpectedException
						([
							'target'	=> get_called_class(),
							'expected'	=> __const_Type::SPL_LONG,
							'detected'	=> $t = getType($v = $const),
							'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
						]);
						
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_MERGE_OFFSET_TYPES_E_P1_K_EXPECTED)
							: new $e($E, $a, $e::ERROR_M_MERGE_OFFSET_TYPES_E_P1_K_EXPECTED);
					}
					
					$r[$const] = $value;
				}
				
				foreach($__define as $const => $value)
				{
					if(FALSE === is_integer($const))
					{
						$E = new ArgumentExpectedException
						([
							'target'	=> get_called_class(),
							'expected'	=> __const_Type::SPL_LONG,
							'detected'	=> $t = getType($v = $const),
							'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
						]);
						
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_MERGE_OFFSET_TYPES_E_P0_K_EXPECTED)
							: new $e($E, $a, $e::ERROR_M_MERGE_OFFSET_TYPES_E_P0_K_EXPECTED);
					}
					
					if(isset($r[$const]))
					{
						$E = new IndexInUseException(['offset' => count($r) - 1]);
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_MERGE_OFFSET_TYPES_E_P0_K_IN_USE)
							: new $e($E, $a, $e::ERROR_M_MERGE_OFFSET_TYPES_E_P0_K_IN_USE);
					}
						
					$r[$const] = $value;
				}
				
				return $r;
			}
			catch(ComponentMethodCallException $E)
			{
				throw $E;
			}
			catch(Exception $E)
			{
				$a = ['method' => __METHOD__];
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_MERGE_OFFSET_TYPES)
					: new $e($E, $a, $e::ERROR_M_MERGE_OFFSET_TYPES);
			}
		}
		
		/**
		 * merge offset data collection
		 *
		 * "defined" as default values -> can not overide "define":
		 *
		 * @param	array	$__define	tuple data
		 * @param	array	$__defined	proto data
		 * @return	array
		 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when $__defined is not of type array
		 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when offset in $__define is not of type long
		 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when offset in $__defined is not of type long
		 * @catchable	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_MERGE_OFFSET_TYPES
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_MERGE_OFFSET_TYPES_E_P1_EXPECTED
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_MERGE_OFFSET_TYPES_E_P0_K_EXPECTED
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_MERGE_OFFSET_TYPES_E_P1_K_EXPECTED
		 */
		public static function mergeOffsetValues($__define, array $__defined)
		{
			$c = get_called_class();
			$e = $c.'\ComponentMethodCallException';
			$a = ['method' => __METHOD__];
			
			try
			{
				if(FALSE === is_array($__defined))
				{
					$E = new ArgumentExpectedException
					([
						'target'	=> get_called_class(),
						'expected'	=> __const_Type::SPL_ARRAY,
						'detected'	=> $t = getType($v = $__defined),
						'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
					]);
					
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_MERGE_OFFSET_VALUES_E_P1_EXPECTED)
						: new $e($E, $a, $e::ERROR_M_MERGE_OFFSET_VALUES_E_P1_EXPECTED);
				}
				
				$r = [];
				
				$__define = (array) $__define;
					
				foreach($__define as $k => $v)
				{
					if(FALSE === is_integer($k))
					{
						$E = new ArgumentExpectedException
						([
							'target'	=> get_called_class(),
							'expected'	=> __const_Type::SPL_LONG,
							'detected'	=> $t = getType($v = $k),
							'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
						]);
						
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_MERGE_OFFSET_VALUES_E_P0_K_EXPECTED)
							: new $e($E, $a, $e::ERROR_M_MERGE_OFFSET_VALUES_E_P0_K_EXPECTED);
					}
					
					$r[$k] = $v;
				}
					
				foreach($__defined as $k => $v)
				{
					if(FALSE === is_integer($k))
					{
						$E = new ArgumentExpectedException
						([
							'target'	=> get_called_class(),
							'expected'	=> __const_Type::SPL_LONG,
							'detected'	=> $t = getType($v = $k),
							'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
						]);
						
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_MERGE_OFFSET_VALUES_E_P1_K_EXPECTED)
							: new $e($E, $a, $e::ERROR_M_MERGE_OFFSET_VALUES_E_P1_K_EXPECTED);
					}
					
					isset($r[$k]) ?: $r[$k] = $v;
				}
				
				return $r;
			}
			catch(ComponentMethodCallException $E)
			{
				throw $E;
			}
			catch(Exception $E)
			{
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_MERGE_OFFSET_VALUES)
					: new $e($E, $a, $e::ERROR_M_MERGE_OFFSET_VALUES);
			}
		}
		
		/**
		 * offset value validation
		 *
		 * use ADT to validate the value at offset
		 *
		 * @param	long $__offset
		 * @param	mixed $__value
		 * @return	boolean
		 * @catchable	ILLI\Core\Std\Def\ADV\ComponentMethodCallException
		 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_M_VALIDATE_VAL
		 * @see		ILLI\Core\Std\Def\ADT::validate()
		 */
		public function validateVal($__offset, $__value = NULL)
		{
			try
			{
				NULL !== $__value ?: $__value = $this->__data[$__offset];
				return $this->getValGC($__offset)->evaluate('validate', [$__value]);
			}
			catch(Exception $E)
			{
				$c = get_called_class();
				$e = $c.'\ComponentMethodCallException';
				$a = ['method' => __METHOD__];
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_VALIDATE_VAL)
					: new $e($E, $a, $e::ERROR_M_VALIDATE_VAL);
			}
		}
		
		/**
		 * offset value ADT
		 *
		 * get the first matching ADT of value. use ::$__data[$__offset] when $__value is NULL.
		 *
		 * T = new [<long|double>5]
		 * T::typeVal(0)		// -> T[0] = 5: return <long>ADT
		 * T::typeVal(0, 10)		// -> $__value 5 at $__offset 0 is acceptable: return <long>ADT
		 * T::typeVal(0, 5.5)		// -> $__value 5.5 at $__offset 0 is acceptable: return <double>ADT
		 * T::typeVal(0, 'foo')		// -> nothing matched, return NULL
		 *
		 * M = new [<class|function|closure>function(){}]
		 * M::typeVal(0) 		// -> closure
		 *
		 * @param	long $__offset
		 * @param	mixed $__value
		 * @return	ILLI\Core\Std\Def\ADT	first matching ADT
		 * @return	NULL			nothing matched
		 * @catchable	ILLI\Core\Std\Def\ADV\ComponentMethodCallException
		 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_M_TYPE_VAL
		 */
		public function typeVal($__offset, $__value = NULL)
		{
			try
			{
				NULL !== $__value ?: $__value = $this->__data[$__offset];
				
				foreach($this->getValGC($__offset) as $ADT)
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
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_TYPE_VAL)
					: new $e($E, $a, $e::ERROR_M_VALIDATE_VAL);
			}
		}
		
		/**
		 * offset value expected
		 *
		 * T = new [<long>5]
		 * T::isVal(0, 'long')		// true -> <long>T[0] = 5
		 * T::isVal(0, 'long', 10)	// true -> <long>T[0] accepts int
		 * T::isVal(0, 'long', 5.5)	// false -> <long>T[0] accepts int
		 * T::isVal(0, 'double')	// false -> no <double>ADT found
		 * T::isVal(0, 'double', 10)	// false -> no <double>ADT found
		 * T::isVal(0, 'long', 10.5)	// false -> no <double>ADT found
		 *
		 * @param	long $__offset
		 * @param	string $__expected
		 * @param	mixed $__value
		 * @return	TRUE		offset value ADT is an instance of $__expected or $__expected is an acceptable offset value gcType
		 * @return	FALSE		nothing matched
		 * @catchable	ILLI\Core\Std\Def\ADV\ComponentMethodCallException
		 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_M_IS_VAL
		 */
		public function isVal($__offset, $__expected, $__value = NULL)
		{
			try
			{	
				NULL !== $__value ?: $__value = $this->__data[$__offset];
				
				if(NULL === ($ADT = $this->typeVal($__offset, $__value)))
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
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_IS_VAL)
					: new $e($E, $a, $e::ERROR_M_VALIDATE_VAL);
			}
		}
		
		#:gc:
			/**
			 * cache ADT for offset
			 *
			 * :index<long>
			 *	tuple offset
			 *
			 * :hashAddr<string>
			 * 	instance of get_called_class(): ILLI\Core\Std\Def\ADV*
			 *	instance of __CLASS__:		ILLI\Core\Std\Def\ADVTuple<hash>
			 *
			 * :ADT<ILLI\Core\Std\Def\ADT>
			 *	the ADT for {:index}
			 *
			 * @var		array [{:hashAddr} => ILLI\Core\Std\Spl\Fsb[{:index} => ILLI\Core\Std\Spl\FsbCollection[long offset => {:ADT}]]]
			 */
			private static $__gc	= NULL;
			
			/**
			 * get ADT definition for tuple
			 *
			 * @return 	ILLI\Core\Std\Spl\Fsb
			 * @catchable	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_GET_TUPLE_GC
			 */
			public function getTupleGC()
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
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_GET_TUPLE_GC)
						: new $e($E, $a, $e::ERROR_M_GET_TUPLE_GC);
				}
			}
			
			/**
			 * get ADT definition for tuple offset
			 *
			 * @return 	ILLI\Core\Std\Spl\FsbCollection
			 * @catchable	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_GET_VAL_GC
			 */
			public function getValGC($__offset)
			{
				try
				{
					return self::$__gc[$this->getName()]->offsetGet($__offset);
				}
				catch(Exception $E)
				{
					$c = get_called_class();
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_GET_VAL_GC)
						: new $e($E, $a, $e::ERROR_M_GET_VAL_GC);
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
			 * @param	array $__defineOffsetType [{:offset} => {:gcType}]
			 * @return	array
			 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when $__defineOffsetType is not of type array
			 * @fires	ILLI\Core\Std\Exception\ArgumentLengthZeroException when $__defineOffsetType is empty
			 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_PARSE_DEF
			 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_PARSE_DEF_E_P0_EXPECTED
			 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_PARSE_DEF_E_P0_LENGTH
			 */
			protected function parseDef(array $__defineOffsetType)
			{
				$c = get_called_class();
				$a = ['method' => __METHOD__];
				
				try
				{
					if(FALSE === is_array($__defineOffsetType))
					{
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						$E = new ArgumentExpectedException
						([
							'target'	=> $c,
							'expected'	=> __const_Type::SPL_ARRAY,
							'detected'	=> $t = getType($v = $__defineOffsetType),
							'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
						]);
						
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_PARSE_DEF_E_P0_EXPECTED)
							: new $e($E, $a, $e::ERROR_M_PARSE_DEF_E_P0_EXPECTED);
					}
					
					if([] === $__defineOffsetType)
					{
						$E = new ArgumentLengthZeroException;
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_PARSE_DEF_E_P0_LENGTH)
							: new $e($E, $a, $e::ERROR_M_PARSE_DEF_E_P0_LENGTH);
					}
						
					return $__defineOffsetType;
							
				}
				catch(ComponentMethodCallException $E)
				{
					throw $E;
				}
				catch(Exception $E)
				{
					$e = $c.'\ComponentMethodCallException';
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_PARSE_DEF)
						: new $e($E, $a, $e::ERROR_M_PARSE_DEF);
				}
			}
		#::
	}