<?PHP
	NAMESPACE ILLI\Core\Std\Spl;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Std\Spl\Fsb\ComponentInitializationException;
	USE ILLI\Core\Std\Spl\Fsb\ComponentMethodCallException;
	USE Exception;
	
	CLASS FsbCollection EXTENDS \ILLI\Core\Std\Spl\Fsb
	{
		public function evaluate($__method, array $__parameters, callable $__Condition = NULL)
		{
			try
			{
				if(0 === $this->count())
					return TRUE;
					
				$this->rewind();
				
				if(NULL === $__Condition)
				{
					while($this->valid())
					{
						if(TRUE === Invoke::emitMethod($this->current(), $__method, $__parameters))
							return TRUE;
						
						$this->next();
					}
				}
				else
				{
					while($this->valid())
					{
						if(TRUE === $__Condition(Invoke::emitMethod($this->current(), $__method, $__parameters), $this->key(), $this->current()))
							return TRUE;
							
						$this->next();
					}
				}
				
				return FALSE;
			}
			catch(Exception $E)
			{
				$c = get_called_class();
				$e = $c.'\ComponentMethodCallException';
				$a = ['method' => __METHOD__];
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_EVALUATE)
					: new $e($E, $a, $e::ERROR_M_EVALUATE);
			}
		}
		
		public function invoke($__method, array $__parameters = [], array $__options = [])
		{
			try
			{
				$__options +=
				[
					'merge'		=> FALSE,
					'collect'	=> FALSE
				];
				
				$r = [];
				
				$this->rewind();
				
				while($this->valid())
				{
					$v = Invoke::emitMethod($this->current(), $__method, $__parameters);
					
					TRUE === $__options['merge']
						? $r = array_merge($r, $v)
						: $r[$this->key()] = $v;
					
					$this->next();
				}
				
				if(FALSE === $__options['collect'])
					return $r;
					
				$c = get_called_class();
				return $c::fromArray($r);
			}
			catch(Exception $E)
			{
				$c = get_called_class();
				$e = $c.'\ComponentMethodCallException';
				$a = ['method' => __METHOD__];
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_INVOKE)
					: new $e($E, $a, $e::ERROR_M_INVOKE);
			}
		}
		
		public function find(callable $__Condition, array $__options = [])
		{
			try
			{
				$__options +=
				[
					'collect'	=> TRUE
				];
				
				$r = [];
				
				$this->rewind();
				
				while($this->valid())
				{
					if(TRUE === $__Condition($this->current(), $this->key()))
						$r[] = $this->current();
					
					$this->next();
				}
				
				if(FALSE === $__options['collect'])
					return $r;
					
				$c = get_called_class();
				return $c::fromArray($r);
			}
			catch(Exception $E)
			{
				$c = get_called_class();
				$e = $c.'\ComponentMethodCallException';
				$a = ['method' => __METHOD__];
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_FIND)
					: new $e($E, $a, $e::ERROR_M_FIND);
			}
		}
		
		public function map(callable $__Action, array $__options = [])
		{
			try
			{
				$__options +=
				[
					'collect'	=> FALSE
				];
				
				$r = [];
				
				$this->rewind();
				
				while($this->valid())
				{
					$r[] = $__Action($this->current(), $this->key());
					$this->next();
				}
				
				if(FALSE === $__options['collect'])
					return $r;
					
				$c = get_called_class();
				return $c::fromArray($r);
			}
			catch(Exception $E)
			{
				$c = get_called_class();
				$e = $c.'\ComponentMethodCallException';
				$a = ['method' => __METHOD__];
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_MAP)
					: new $e($E, $a, $e::ERROR_M_MAP);
			}
		}
		
		public function each(callable $__Action)
		{
			try
			{
				$this->rewind();
				
				while($this->valid())
				{
					$this[$this->key()] = $__Action($this->current(), $this->key());
					$this->next();
				}
				
				return $this;
			}
			catch(Exception $E)
			{
				$c = get_called_class();
				$e = $c.'\ComponentMethodCallException';
				$a = ['method' => __METHOD__];
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_EACH)
					: new $e($E, $a, $e::ERROR_M_EACH);
			}
		}
	}