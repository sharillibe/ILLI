<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADT;
	USE ILLI\Core\Std\Def\ADVTuple\ComponentMethodCallException;
	USE ILLI\Core\Std\Def\ADVTuple\ComponentInitializationException;
	USE ILLI\Core\Std\Spl\Fsb;
	USE ILLI\Core\Std\Spl\FsbCollection;
	USE ILLI\Core\Util\Spl;
	USE ILLI\Core\Std\Exception\ArgumentExpectedException;
	
	CLASS ADVTuple EXTENDS \ILLI\Core\Std\Def\ADV
	{
		CONST __GC		= __CLASS__;
		
		private static $__gc	= NULL;
		
		#:ILLI\Core\Std\Def\ADV:
			public function __construct($__defineOffsetType, $__data = NULL)
			{
				$c = get_called_class();
				
				try
				{
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
					
					if([] === $__defineOffsetType)
					{
						$e = $c.'\ComponentMethodCallException';
						$E = new ArgumentLengthZeroException;
						$a = ['method' => __METHOD__];
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_CTOR_E_DEFINITION_LENGTH_ZERO)
							: new $e($E, $a, $e::ERROR_M_CTOR_E_DEFINITION_LENGTH_ZERO);
					}
					
					$d = $this->parseDef($__defineOffsetType);
					$r = [];
					
					foreach($d as $o)
						$r[] = FsbCollection::fromArray(NULL === $o ? [] : ADT::define((array) $o));
					
					$t = Fsb::fromArray($r);
					
					if(NULL !== $__data)
						$this->set($__data);
						
					//var_dump([static::__GC => self::$__gc]);
				}
				catch(ComponentInitializationException $E)
				{
					throw $E;
				}
				catch(\Exception $E)
				{
					$e = $c.'\ComponentInitializationException';
					$a = ['class' => $c];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentInitializationException($E, $a)
						: new $e($E, $a);
				}
			}
			
			protected function parseDef(array $__defineOffsetType)
			{
				$c = get_called_class();
				$a = ['method' => __METHOD__];
				
				try
				{
					if([] === $__defineOffsetType)
					{
						$E = new ArgumentLengthZeroException;
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_PARSE_DEF_E_RESULT_LENGTH_ZERO)
							: new $e($E, $a, $e::ERROR_M_PARSE_DEF_E_RESULT_LENGTH_ZERO);
					}
						
					return $__defineOffsetType;
							
				}
				catch(ComponentMethodCallException $E)
				{
					throw $E;
				}
				catch(\Exception $E)
				{
					$e = $c.'\ComponentMethodCallException';
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_PARSE_DEF)
						: new $e($E, $a, $e::ERROR_M_PARSE_DEF);
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
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_CREATE_HASH_ADDR)
						: new $e($E, $a, $e::ERROR_CREATE_HASH_ADDR);
				}
			}
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
								? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_SET_E_OFFSET_VAL_TYPE_EXPECTED)
								: new $e($E, $a, $e::ERROR_M_SET_E_OFFSET_VAL_TYPE_EXPECTED);
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
				catch(\Exception $E)
				{
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_SET)
						: new $e($E, $a, $e::ERROR_SET);
				}
			}
		#::
		
		public function validate($__value)
		{
			try
			{
				if(FALSE === parent::$__value)
					return FALSE;
					
				foreach($__value as $k => $v)
				{
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
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_VALIDATE)
					: new $e($E, $a, $e::ERROR_M_VALIDATE);
			}
		}
		
		public function getTupleGC()
		{
			try
			{
				return self::$__gc[$this->getName()];
			}
			catch(\Exception $E)
			{
				$c = get_called_class();
				$e = $c.'\ComponentMethodCallException';
				$a = ['method' => __METHOD__];
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_GET_TUPLE_GC)
					: new $e($E, $a, $e::ERROR_M_GET_TUPLE_GC);
			}
		}
		
		public function getValGC($__offset)
		{
			try
			{
				return self::$__gc[$this->getName()]->offsetGet($__offset);
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
		
		public function validateVal($__offset, $__value)
		{
			try
			{
				return $this->getValGC($__offset)->evaluate('validate', [$__value]);
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
	}