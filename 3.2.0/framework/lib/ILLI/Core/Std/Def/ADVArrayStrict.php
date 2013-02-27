<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADT;
	USE ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException;
	USE ILLI\Core\Std\Def\ADVArrayStrict\ComponentInitializationException;
	USE ILLI\Core\Std\Exception\ArgumentExpectedException;
	USE ILLI\Core\Std\Spl\Fsb;
	USE ILLI\Core\Std\Spl\FsbCollection;
	USE ILLI\Core\Util\Spl;
	
	CLASS ADVArrayStrict EXTENDS \ILLI\Core\Std\Def\ADV
	{
		CONST __GC = __CLASS__;
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
		
		#:ILLI\Core\Std\Def\ADV:
			/**
			 * Instantiate a new ADVArrayStrict with ADT for key and value.
			 *
			 * The base-type for this ADV is an array. The difference to ADVArray is the optional type-definition for offset-key and offset-value.
			 * The key must be of type scalar (long, double or string).
			 *
			 * @param	string	$__defineKeyType	{:gcType}
			 * @param	array	$__defineKeyType	[{:offset} => {:gcType}]
			 * @param	string	$__defineValType	{:gcType}
			 * @param	array	$__defineValType	[{:offset} => {:gcType}]
			 * @param	array	$__data			initial-array
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
				catch(\Exception $E)
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
			 * Destroy anonymous ATV definitions
			 *
			 * @catchable	ILLI\Core\Std\Def\ADVArrayStrict\ComponentMethodCallException ComponentMethodCallException::ERROR_DTOR
			 * @void
			 */
			public function __destruct()
			{
				try
				{
					if(($c = get_called_class()) === __CLASS__)
						unset(self::$__gc[$this->getName()]);
					
					parent::__destruct();
				}
				catch(\Exception $E)
				{
					$c = get_called_class();
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_DTOR)
						: new $e($E, $a, $e::ERROR_DTOR);
				}
			}
			
			/**
			 * value-validation, offset-validation
			 *
			 * use gc-ADT to validate the value; use gc-ADT to validate the offset-name and the offset-value
			 *
			 * @param	mixed $__value
			 * @return	boolean
			 * @catchable	ILLI\Core\Std\Exception\ADVArrayStrict\ComponentMethodCallException
			 * @see		ILLI\Core\Std\Def\ADT::validate()
			 * @see		ILLI\Core\Std\Def\ADV::validate()
			 */
			public function validate($__value)
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
				catch(\Exception $E)
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
			 * store data when value-type equals with gc-ADT, when offset-type equals with gc-ADT and when offset-value equals with gc-ADT
			 *
			 * @param	mixed $__value
			 * @return	this
			 * @throws	ILLI\Core\Std\Exception\ArgumentExpectedException on validation-fail
			 * @catchable	ILLI\Core\Std\Exception\ADV\ComponentMethodCallException
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
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_SET_E_TYPE_EXPECTED)
							: new $e($E, $a, $e::ERROR_M_SET_E_TYPE_EXPECTED);
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
								? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_SET_E_OFFSET_KEY_TYPE_EXPECTED)
								: new $e($E, $a, $e::ERROR_M_SET_E_OFFSET_KEY_TYPE_EXPECTED);
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
								? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_SET_E_OFFSET_VAL_TYPE_EXPECTED)
								: new $e($E, $a, $e::ERROR_M_SET_E_OFFSET_VAL_TYPE_EXPECTED);
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
				catch(\Exception $E)
				{
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_SET)
						: new $e($E, $a, $e::ERROR_M_SET);
				}
			}
			/*
			protected function createHashAddr(array $__defineTypes = [])
			{
				$c = get_called_class();
				
				try
				{
					#~ performanced ADT: cache request by called-class; otherwise by hash
					return $c === __CLASS__ ? Spl::nameWithHash($c, $this) : $c;
				}
				catch(\Exception $E)
				{
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_CREATE_HASH_ADDR)
						: new $e($E, $a, $e::ERROR_M_CREATE_HASH_ADDR);
				}
			}
			*/
		#::
		
		/**
		 * offset key validation
		 *
		 * use gc-ADT to validate the offset-name
		 *
		 * @param	mixed $__value
		 * @return	boolean
		 * @catchable	ILLI\Core\Std\Exception\ADVArrayStrict\ComponentMethodCallException
		 * @see		ILLI\Core\Std\Def\ADT::validate()
		 */
		public function validateKey($__value)
		{
			try
			{
				return $this->getKeyGC()->evaluate('validate', [$__value]);
			}
			catch(\Exception $E)
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
		 * @catchable	ILLI\Core\Std\Exception\ADVArrayStrict\ComponentMethodCallException
		 * @see		ILLI\Core\Std\Def\ADT::validate()
		 */
		public function validateVal($__value)
		{
			try
			{
				return $this->getValGC()->evaluate('validate', [$__value]);
			}
			catch(\Exception $E)
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
			 * get ADT definition for offset-key
			 *
			 * @return 	ILLI\Core\Std\Spl\FsbCollection
			 * @catchable	ILLI\Core\Std\Exception\ADV\ComponentMethodCallException
			 */
			public function getKeyGC()
			{
				try
				{
					return self::$__gc[$this->getName()]->offsetGet(0);
				}
				catch(\Exception $E)
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
			 * @catchable	ILLI\Core\Std\Exception\ADV\ComponentMethodCallException
			 */
			public function getValGC()
			{
				try
				{
					return self::$__gc[$this->getName()]->offsetGet(1);
				}
				catch(\Exception $E)
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