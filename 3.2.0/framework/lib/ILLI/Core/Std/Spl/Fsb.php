<?PHP
	NAMESPACE ILLI\Core\Std\Spl;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Exception\ArgumentExpectedException;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Std\Spl\Fsb\ComponentInitializationException;
	USE ILLI\Core\Std\Spl\Fsb\ComponentMethodCallException;
	USE Exception;
	
	CLASS Fsb EXTENDS \SplFixedArray
	{
		#:SplFixedArray:
			public function __construct($__size)
			{
				$c = get_called_class();
				
				try
				{
					if(FALSE === is_integer($__size))
					{
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						$E = new ArgumentExpectedException
						([
							'target'	=> $c,
							'expected'	=> __const_Type::SPL_LONG,
							'detected'	=> $t = getType($v = $__value),
							'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
						]);
						
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_CTOR_E_P0_EXPECTED)
							: new $e($E, $a, $e::ERROR_M_CTOR_E_P0_EXPECTED);
					}
						
					parent::__construct($__size);
					
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
			
			public static function fromArray($__array, $_ = TRUE)
			{
				$c = get_called_class();
				
				try
				{
					if(FALSE === is_array($__array)
					&& FALSE === ($__array instanceOf $c))
					{
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						$E = new ArgumentExpectedException
						([
							'target'	=> $c,
							'expected'	=> implode('|', [__const_Type::SPL_ARRAY, $c]),
							'detected'	=> $t = getType($v = $__value),
							'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
						]);
						
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_CTOR_E_P0_EXPECTED)
							: new $e($E, $a, $e::ERROR_M_CTOR_E_P0_EXPECTED);
					}
					
					$c = get_called_class();
					$A = new $c(count($__array));
					
					foreach($__array as $k => $v)
						$A->offsetSet($k, $v);
						
					return $A;
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
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_FROM_ARRAY)
						: new $e($E, $a, $e::ERROR_M_FROM_ARRAY);
				}
			}
			
			public function toArray()
			{
				try
				{
					return parent::toArray();
				}
				catch(Exception $E)
				{
					$c = get_called_class();
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_TO_ARRAY)
						: new $e($E, $a, $e::ERROR_M_TO_ARRAY);
				}
			}
			
			public function getSize()
			{
				try
				{
					return parent::getSize();
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
			
			public function setSize($__size)
			{
				$c = get_called_class();
				
				try
				{
					if(FALSE === is_integer($__size))
					{
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						$E = new ArgumentExpectedException
						([
							'target'	=> $c,
							'expected'	=> __const_Type::SPL_LONG,
							'detected'	=> $t = getType($v = $__size),
							'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
						]);
						
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_SET_SIZE_E_P0_EXPECTED)
							: new $e($E, $a, $e::ERROR_M_SET_SIZE_E_P0_EXPECTED);
					}
					
					parent::setSize($__size);
					return $this;
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
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_SET_SIZE)
						: new $e($E, $a, $e::ERROR_M_SET_SIZE);
				}
			}
			
			public function __wakeup()
			{
				try
				{
					return parent::__wakeup();
				}
				catch(Exception $E)
				{
					$c = get_called_class();
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M___WAKE_UP)
						: new $e($E, $a, $e::ERROR_M___WAKE_UP);
				}
			}
			
			#:ArrayAccess:
				public function offsetExists($__offset)
				{
					$c = get_called_class();
				
					try
					{
						if(FALSE === is_integer($__offset))
						{
							$e = $c.'\ComponentMethodCallException';
							$a = ['method' => __METHOD__];
							$E = new ArgumentExpectedException
							([
								'target'	=> $c,
								'expected'	=> __const_Type::SPL_LONG,
								'detected'	=> $t = getType($v = $__offset),
								'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
							]);
							
							throw ($c === __CLASS__ || FALSE === class_exists($e))
								? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_OFFSET_EXISTS_E_P0_EXPECTED)
								: new $e($E, $a, $e::ERROR_M_OFFSET_EXISTS_E_P0_EXPECTED);
						}
						
						return parent::offsetExists($__offset);
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
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_OFFSET_EXISTS)
							: new $e($E, $a, $e::ERROR_M_OFFSET_EXISTS);
					}
				}
				
				public function offsetGet($__offset)
				{
					$c = get_called_class();
					
					try
					{
						if(FALSE === is_integer($__offset))
						{
							$e = $c.'\ComponentMethodCallException';
							$a = ['method' => __METHOD__];
							$E = new ArgumentExpectedException
							([
								'target'	=> $c,
								'expected'	=> __const_Type::SPL_LONG,
								'detected'	=> $t = getType($v = $__offset),
								'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
							]);
							
							throw ($c === __CLASS__ || FALSE === class_exists($e))
								? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_OFFSET_GET_E_P0_EXPECTED)
								: new $e($E, $a, $e::ERROR_M_OFFSET_GET_E_P0_EXPECTED);
						}
						
						return parent::offsetGet($__offset);
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
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_OFFSET_GET)
							: new $e($E, $a, $e::ERROR_M_OFFSET_GET);
					}
				}
			
				public function offsetSet($__offset, $__value)
				{
					$c = get_called_class();
					
					try
					{
						if(FALSE === is_integer($__offset))
						{
							$e = $c.'\ComponentMethodCallException';
							$a = ['method' => __METHOD__];
							$E = new ArgumentExpectedException
							([
								'target'	=> $c,
								'expected'	=> __const_Type::SPL_LONG,
								'detected'	=> $t = getType($v = $__offset),
								'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
							]);
							
							throw ($c === __CLASS__ || FALSE === class_exists($e))
								? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_OFFSET_SET_E_P0_EXPECTED)
								: new $e($E, $a, $e::ERROR_M_OFFSET_SET_E_P0_EXPECTED);
						}
						
						parent::offsetSet($__offset, $__value);
						return $this;
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
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_OFFSET_SET)
							: new $e($E, $a, $e::ERROR_M_OFFSET_SET);
					}
				}
				
				public function offsetUnset($__offset)
				{
					$c = get_called_class();
					
					try
					{
						if(FALSE === is_integer($__offset))
						{
							$e = $c.'\ComponentMethodCallException';
							$a = ['method' => __METHOD__];
							$E = new ArgumentExpectedException
							([
								'target'	=> $c,
								'expected'	=> __const_Type::SPL_LONG,
								'detected'	=> $t = getType($v = $__offset),
								'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
							]);
							
							throw ($c === __CLASS__ || FALSE === class_exists($e))
								? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_OFFSET_UNSET_E_P0_EXPECTED)
								: new $e($E, $a, $e::ERROR_M_OFFSET_UNSET_E_P0_EXPECTED);
						}
						
						return parent::offsetUnset($__offset);
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
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_OFFSET_UNSET)
							: new $e($E, $a, $e::ERROR_M_OFFSET_UNSET);
					}
				}
			#::
			
			#:Countable:
				public function count()
				{
					try
					{
						$count = iterator_count($this);
						$this->rewind();
						return $count;
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
			#::
			
			#:Iterator:
				public function current()
				{
					try
					{
						return parent::current();
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
				
				public function key()
				{
					try
					{
						return parent::key();
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
				
				public function next()
				{
					try
					{
						return parent::next();
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
				
				public function rewind()
				{
					try
					{
						return parent::rewind();
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
				
				public function valid()
				{
					try
					{
						return parent::valid();
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
			#::
		#::
		
		public function add($__value)
		{
			try
			{
				$s = $this->getSize();
				$this->setSize($s + 1);
				$this[$s] = $__value;
			}
			catch(Exception $E)
			{
				$c = get_called_class();
				$e = $c.'\ComponentMethodCallException';
				$a = ['method' => __METHOD__];
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_ADD)
					: new $e($E, $a, $e::ERROR_M_ADD);
			}
		}
		
		public function end()
		{
			try
			{
				end($this);
				return current($this);
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
		
		public function keys()
		{
			try
			{
				$this->rewind();
				
				$r = [];
				
				while($this->valid())
				{
					$r[] = $this->key();
					$this->next();
				}
				
				return $r;
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
		
		public function prev()
		{
			try
			{
				if(!prev($this))
					end($this);
				
				return current($this);
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
		
		public function values()
		{
			try
			{
				$this->rewind();
				
				$r = [];
				
				while($this->valid())
				{
					$r[] = $this->current();
					$this->next();
				}
				
				return $r;
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
	}