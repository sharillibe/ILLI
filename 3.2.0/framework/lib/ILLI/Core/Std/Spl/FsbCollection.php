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
						if(TRUE === $__Condition(Invoke::emitMethod($I, $__method, $__parameters), $this->key()))
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
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_EVALUATE, ['method' => __METHOD__])
					: new $e($E, $e::ERROR_EVALUATE, ['method' => __METHOD__]);
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
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_INVOKE, ['method' => __METHOD__])
					: new $e($E, $e::ERROR_INVOKE, ['method' => __METHOD__]);
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
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_FIND, ['method' => __METHOD__])
					: new $e($E, $e::ERROR_FIND, ['method' => __METHOD__]);
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
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_MAP, ['method' => __METHOD__])
					: new $e($E, $e::ERROR_MAP, ['method' => __METHOD__]);
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
				throw ($c === __CLASS__ || FALSE === class_exists($e))
					? new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_EACH, ['method' => __METHOD__])
					: new $e($E, $e::ERROR_EACH, ['method' => __METHOD__]);
			}
		}
	}