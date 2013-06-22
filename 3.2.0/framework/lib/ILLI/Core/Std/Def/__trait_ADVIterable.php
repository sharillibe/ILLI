<?PHP
	NAMESPACE ILLI\Core\Std\Def;

	TRAIT __trait_ADVIterable
	{
		public function current()
		{
			return current($this->__data);
		}
		
		public function key()
		{
			return key($this->__data);
		}
		
		public function next()
		{
			return next($this->__data);
		}
		
		public function rewind()
		{
			return reset($this->__data);
		}
		
		public function valid()
		{
			return isset($this->__data[$this->key()]);
		}
		
		public function end()
		{
			end($this->__data);
			return current($this->__data);
		}
		
		public function keys()
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
		
		public function prev()
		{
			if(!prev($this->__data))
				end($this->__data);
				
			return current($this->__data);
		}
		
		public function values()
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
	}