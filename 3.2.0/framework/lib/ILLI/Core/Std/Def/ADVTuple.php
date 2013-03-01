<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADT;
	USE ILLI\Core\Std\Def\ADVTuple\ComponentMethodCallException;
	USE ILLI\Core\Std\Def\ADVTuple\ComponentInitializationException;
	USE ILLI\Core\Std\Exception\ArgumentExpectedException;
	USE ILLI\Core\Std\Exception\ArgumentLengthZeroException;
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
			 * @param	array	$__data			the initial data
			 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when $__defineOffsetType is not of type array
			 * @fires	ILLI\Core\Std\Exception\ArgumentLengthZeroException when $__defineOffsetType is an empty array
			 * @catchable	ILLI\Core\Std\Def\ADVTuple\ComponentInitializationException
			 * @throws	ILLI\Core\Std\Def\ADVTuple\ComponentMethodCallException::ERROR_M_CTOR_E_P0_EXPECTED
			 * @throws	ILLI\Core\Std\Def\ADVTuple\ComponentMethodCallException::ERROR_M_CTOR_E_P0_LENGTH
			 * @see		ILLI\Core\Std\Def\ADV::__construct()
			 * @see		ILLI\Core\Std\Def\ADT::define()
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
						if(NULL !== $__data)
						{
							$this->set($__data);
						}
						
						return;
					}
					
					$d = $this->parseDef($__defineOffsetType);
					$r = [];
					
					foreach($d as $o)
						$r[] = FsbCollection::fromArray(NULL === $o ? [] : ADT::define((array) $o));
					
					$t = Fsb::fromArray($r);
					
					if(NULL !== $__data)
						$this->set($__data);
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
			public function validate($__value)
			{
				try
				{
					if(FALSE === parent::validate($__value))
						return FALSE;
						
					foreach($__value as $k => $v)
						if(FALSE === $this->validateVal($v))
							return FALSE;
					
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
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_SET)
						: new $e($E, $a, $e::ERROR_SET);
				}
			}
		#::
		
		/**
		 * offset value validation
		 *
		 * use ADT to validate the value at offset
		 *
		 * @param	mixed $__value
		 * @return	boolean
		 * @catchable	ILLI\Core\Std\Def\ADV\ComponentMethodCallException
		 * @throws	ILLI\Core\Std\Def\ADV\ComponentMethodCallException::ERROR_M_VALIDATE_VAL
		 * @see		ILLI\Core\Std\Def\ADT::validate()
		 */
		public function validateVal($__offset, $__value)
		{
			try
			{
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