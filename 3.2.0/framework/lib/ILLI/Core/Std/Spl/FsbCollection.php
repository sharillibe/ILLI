<?PHP
	NAMESPACE ILLI\Core\Std\Spl;
	USE ILLI\Core\Std\Exception;
	USE ILLI\Core\Std\Invoke;
	
	CLASS FsbCollection EXTENDS \ILLI\Core\Std\Spl\Fsb
	{	
		public function evaluate($__method, array $__parameters, callable $__Condition = NULL)
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
		
		public function invoke($__method, array $__parameters = [], array $__options = [])
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
		
		public function find(callable $__Condition, array $__options = [])
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
		
		public function map(callable $__Action, array $__options = [])
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
		
		public function each(callable $__Action)
		{
			$this->rewind();
			
			while($this->valid())
			{
				$this[$this->key()] = $__Action($this->current(), $this->key());
				$this->next();
			}
			
			return $this;
		}
	}