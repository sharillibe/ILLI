<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Std\Spl\FsbCollection;

	TRAIT __trait_ADVCollectable
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
					if(TRUE === $__Condition(Invoke::emitMethod($this->current(), $__method, $__parameters), $this->key(), $this->current()))
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
				'collect'	=> FALSE
			];
			
			$r = [];
			
			$this->rewind();
			
			while($this->valid())
			{
				$v = Invoke::emitMethod($this->current(), $__method, $__parameters);
				
				$r[$this->key()] = $v;
				
				$this->next();
			}
			
			if(FALSE === $__options['collect'])
				return $r;
				
			return FsbCollection::fromArray($r);
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
				
			return FsbCollection::fromArray($r);
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
				
			return FsbCollection::fromArray($r);
		}
		
		public function each(callable $__Action, callable $__Condition = NULL)
		{
			$this->rewind();
			
			if(NULL === $__Condition)
			{
				while($this->valid())
				{
					$this->__data[$this->key()] = $__Action($this->current(), $this->key());
					$this->next();
				}
			}
			else
			{
				while($this->valid())
				{
					if(TRUE === $__Condition($this->current(), $this->key()))
						$this->__data[$this->key()] = $__Action($this->current(), $this->key());
					
					$this->next();
				}
			}
			
			return $this;
		}
	}