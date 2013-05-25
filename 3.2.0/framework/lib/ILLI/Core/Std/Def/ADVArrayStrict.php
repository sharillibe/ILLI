<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADT;
	USE ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException;
	USE ILLI\Core\Std\Def\ADVArrayStrict\ComponentInitializationException;
	USE ILLI\Core\Std\Exception\ArgumentExpectedException;
	USE ILLI\Core\Std\Spl\Fsb;
	USE ILLI\Core\Std\Spl\FsbCollection;
	USE Exception;
	
	CLASS ADVArrayStrict EXTENDS \ILLI\Core\Std\Def\ADV
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
			 * Instantiate a new ADT-Value-Pair for value of type strict array.
			 *
			 * A strictArray is an object capable to hold a collection of elements.
			 * The base-type for this ADV is a regular array. The difference to ADVArray is the optional type-definition for offset-key and offset-value.
			 * The key must be of type long, double or string.
			 *
			 * :offset<long>
			 *	zero-based index
			 *
			 * :gcTypeK<string>
			 *	__const_Type::SPL_STRING|__const_Type::SPL_LONG|__const_Type::SPL_DOUBLE
			 *
			 * :gcTypeV<string>
			 *	a valid __const_Type
			 *
			 * @param	string	$__defineKeyType	{:gcTypeK}
			 * @param	array	$__defineKeyType	[{:offset} => {:gcTypeK}]
			 * @param	string	$__defineValType	{:gcTypeV}
			 * @param	array	$__defineValType	[{:offset} => {:gcTypeV}]
			 * @param	array	$__data			the initial data
			 * @catchable	ILLI\Core\Std\Def\ADVArrayStrict\ComponentInitializationException
			 * @see		ILLI\Core\Std\Def\ADV::__construct()
			 * @see		ILLI\Core\Std\Def\ADT::define()
			 */
			public function __construct($__defineKeyType = NULL, $__defineValType = NULL, $__data = NULL)
			{
				try
				{
					parent::__construct([__const_Type::SPL_ARRAY]);
					
					$t = &self::$__gc[$this->getName()];
					
					if(FALSE === isset($t))
					{
						$t = Fsb::fromArray
						(
							[
								FsbCollection::fromArray(NULL === $__defineKeyType ? [] : ADT::define((array) $__defineKeyType)),
								FsbCollection::fromArray(NULL === $__defineValType ? [] : ADT::define((array) $__defineValType))
							]
						);
					}
					
					if(NULL !== $__data)
						$this->set($__data);
				}
				catch(ComponentInitializationException $E)
				{
					throw $E;
				}
				catch(Exception $E)
				{
					$c = get_called_class();
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
			 * use ADT to validate the value, the offset-name and the offset-value
			 *
			 * @param	mixed $__value
			 * @return	boolean
			 * @catchable	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_VALIDATE
			 * @see		ILLI\Core\Std\Def\ADT::validate()
			 */
			public function validate($__value = NULL)
			{
				try
				{
					if(FALSE === parent::validate($__value))
						return FALSE;
					
					foreach($__value as $k => $v)
					{
						if(FALSE === $this->validateKey($k))
							return FALSE;
							
						if(FALSE === $this->validateVal($v))
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
						? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_M_VALIDATE)
						: new $e($E, $a, $e::ERROR_M_VALIDATE);
				}
			}
			
			/**
			 * store data when type equals with ADT
			 *
			 * @param	mixed $__value
			 * @return	this
			 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException on validation-fail
			 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException on offset-name validation-fail
			 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException on offset-value validation-fail
			 * @catchable	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_SET
			 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_SET_E_P0_EXPECTED
			 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_SET_E_P0_K_EXPECTED
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
					
					$i = 0;
					foreach($__value as $k => $v)
					{
						if(FALSE === $this->validateKey($k))
						{
							$E = new ArgumentExpectedException([
								'target'	=> $this->getName().'['.$i.']',
								'expected'	=> implode('|', array_unique($this->getKeyGC()->invoke('toString'))), 
								'detected'	=> $t = getType($k),
								'value'		=> is_object($k) ? get_class($k) : (is_scalar($k) ? $k : NULL)
							]);
							
							$a +=
							[
								'offset'	=> $i,
								'class'		=> $c
							];
							
							throw ($c === __CLASS__ || FALSE === class_exists($e))
								? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_SET_E_P0_K_EXPECTED)
								: new $e($E, $a, $e::ERROR_M_SET_E_P0_K_EXPECTED);
						}
							
						if(FALSE === $this->validateVal($v))
						{
							$E = new ArgumentExpectedException([
								'target'	=> $this->getName().'['.$i.']',
								'expected'	=> implode('|', array_unique($this->getValGC()->invoke('toString'))), 
								'detected'	=> $t = getType($v),
								'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
							]);
							
							$a +=
							[
								'offset'	=> $i,
								'class'		=> $c
							];
							
							throw ($c === __CLASS__ || FALSE === class_exists($e))
								? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_SET_E_P0_V_EXPECTED)
								: new $e($E, $a, $e::ERROR_M_SET_E_P0_V_EXPECTED);
						}
						
						$i++;
					}
				
					$this->__data = $__value;
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
			
			#:gc:
				/**
				 * Destroy anonymous ATV definitions
				 *
				 * @catchable	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException
				 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_DTOR
				 */
				public function __destruct()
				{
					try
					{
						if(($c = get_called_class()) === __CLASS__)
							unset(self::$__gc[$this->getName()]);
						
						parent::__destruct();
					}
					catch(Exception $E)
					{
						$c = get_called_class();
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_DTOR)
							: new $e($E, $a, $e::ERROR_DTOR);
					}
				}
			#::
		#::
		
		/**
		 * offset key validation
		 *
		 * use gc-ADT to validate the offset-name
		 *
		 * @param	mixed $__value
		 * @return	boolean
		 * @catchable	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_VALIDATE_KEY
		 * @see		ILLI\Core\Std\Def\ADT::validate()
		 */
		public function validateKey($__value)
		{
			try
			{
				return $this->getKeyGC()->evaluate('validate', [$__value]);
			}
			catch(Exception $E)
			{
				$c = get_called_class();
				$e = $c.'\ComponentMethodCallException';
				$a = ['method' => __METHOD__];
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_VALIDATE_KEY)
					: new $e($E, $a, $e::ERROR_M_VALIDATE_KEY);
			}
		}
		
		/**
		 * offset value validation
		 *
		 * use gc-ADT to validate the offset-value
		 *
		 * @param	mixed $__value
		 * @return	boolean
		 * @catchable	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException
		 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_VALIDATE_VAL
		 * @see		ILLI\Core\Std\Def\ADT::validate()
		 */
		public function validateVal($__value)
		{
			try
			{
				return $this->getValGC()->evaluate('validate', [$__value]);
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
			 * cache ADT for key and value
			 *
			 * :index<long>
			 *	0	key
			 *	1	value
			 *
			 * :hashAddr<string>
			 * 	instance of get_called_class(): ILLI\Core\Std\Def\ADV*
			 *	instance of __CLASS__:		ILLI\Core\Std\Def\ADVArrayStrict<hash>
			 *
			 * :ADT<ILLI\Core\Std\Def\ADT>
			 *	the ADT for {:index}
			 *
			 * @var		array [{:hashAddr} => ILLI\Core\Std\Spl\FsbCollection[{:index} => ILLI\Core\Std\Spl\FsbCollection[long offset => {:ADT}]]]
			 */
			private static $__gc = NULL;
			
			/**
			 * get ADT definition for offset-key
			 *
			 * @return 	ILLI\Core\Std\Spl\FsbCollection
			 * @catchable	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_GET_KEY_GC
			 */
			public function getKeyGC()
			{
				try
				{
					return self::$__gc[$this->getName()]->offsetGet(0);
				}
				catch(Exception $E)
				{
					$c = get_called_class();
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_GET_KEY_GC)
						: new $e($E, $a, $e::ERROR_M_GET_KEY_GC);
				}
			}
			
			/**
			 * get ADT definition for offset-value
			 *
			 * @return 	ILLI\Core\Std\Spl\FsbCollection
			 * @catchable	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException
			 * @throws	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException::ERROR_M_GET_VAL_GC
			 */
			public function getValGC()
			{
				try
				{
					return self::$__gc[$this->getName()]->offsetGet(1);
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
		#::
	}