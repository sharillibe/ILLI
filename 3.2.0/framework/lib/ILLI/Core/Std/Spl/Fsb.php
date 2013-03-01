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
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentInitializationException($E, ['class' => get_called_class()])
						: new $e($E, ['class' => get_called_class()]);
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
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_FROM_ARRAY, ['method' => __METHOD__])
						: new $e($E, $e::ERROR_FROM_ARRAY, ['method' => __METHOD__]);
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
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_TO_ARRAY, ['method' => __METHOD__])
						: new $e($E, $e::ERROR_TO_ARRAY, ['method' => __METHOD__]);
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
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_GET_SIZE, ['method' => __METHOD__])
						: new $e($E, $e::ERROR_GET_SIZE, ['method' => __METHOD__]);
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
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_SET_SIZE_E_P0_EXPECTED)
							: new $e($E, $a, $e::ERROR_SET_SIZE_E_P0_EXPECTED);
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
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_SET_SIZE, ['method' => __METHOD__])
						: new $e($E, $e::ERROR_SET_SIZE, ['method' => __METHOD__]);
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
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR___WAKE_UP, ['method' => __METHOD__])
						: new $e($E, $e::ERROR___WAKE_UP, ['method' => __METHOD__]);
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
								? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_OFFSET_EXISTS_E_P0_EXPECTED)
								: new $e($E, $a, $e::ERROR_OFFSET_EXISTS_E_P0_EXPECTED);
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
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_OFFSET_EXISTS, ['method' => __METHOD__])
							: new $e($E, $e::ERROR_OFFSET_EXISTS, ['method' => __METHOD__]);
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
								? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_OFFSET_GET_E_P0_EXPECTED)
								: new $e($E, $a, $e::ERROR_OFFSET_GET_E_P0_EXPECTED);
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
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_OFFSET_GET, ['method' => __METHOD__])
							: new $e($E, $e::ERROR_OFFSET_GET, ['method' => __METHOD__]);
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
								? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_OFFSET_SET_E_P0_EXPECTED)
								: new $e($E, $a, $e::ERROR_OFFSET_SET_E_P0_EXPECTED);
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
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_OFFSET_SET, ['method' => __METHOD__])
							: new $e($E, $e::ERROR_OFFSET_SET, ['method' => __METHOD__]);
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
								? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_OFFSET_UNSET_E_P0_EXPECTED)
								: new $e($E, $a, $e::ERROR_OFFSET_UNSET_E_P0_EXPECTED);
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
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_OFFSET_UNSET, ['method' => __METHOD__])
							: new $e($E, $e::ERROR_OFFSET_UNSET, ['method' => __METHOD__]);
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
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_COUNT, ['method' => __METHOD__])
							: new $e($E, $e::ERROR_COUNT, ['method' => __METHOD__]);
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
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_CURRENT, ['method' => __METHOD__])
							: new $e($E, $e::ERROR_CURRENT, ['method' => __METHOD__]);
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
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_KEY, ['method' => __METHOD__])
							: new $e($E, $e::ERROR_KEY, ['method' => __METHOD__]);
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
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_NEXT, ['method' => __METHOD__])
							: new $e($E, $e::ERROR_NEXT, ['method' => __METHOD__]);
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
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_REWIND, ['method' => __METHOD__])
							: new $e($E, $e::ERROR_REWIND, ['method' => __METHOD__]);
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
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_VALID, ['method' => __METHOD__])
							: new $e($E, $e::ERROR_VALID, ['method' => __METHOD__]);
					}
				}
			#::
		#::
		
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
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_END, ['method' => __METHOD__])
					: new $e($E, $e::ERROR_END, ['method' => __METHOD__]);
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
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_KEYS, ['method' => __METHOD__])
					: new $e($E, $e::ERROR_KEYS, ['method' => __METHOD__]);
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
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_PREV, ['method' => __METHOD__])
					: new $e($E, $e::ERROR_PREV, ['method' => __METHOD__]);
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
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_VALUES, ['method' => __METHOD__])
					: new $e($E, $e::ERROR_VALUES, ['method' => __METHOD__]);
			}
		}
	}