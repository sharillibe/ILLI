<?PHP
	NAMESPACE ILLI\Core\Std\Def;

	TRAIT __trait_ADVIterableIterator
	{
		public function current()
		{
			return $this->__data->current();
		}
		
		public function key()
		{
			return $this->__data->key();
		}
		
		public function next()
		{
			return $this->__data->next();
		}
		
		public function rewind()
		{
			return $this->__data->rewind();
		}
		
		public function valid()
		{
			return $this->__data->valid();
		}
		
		public function end()
		{
			return $this->__data->end();
		}
		
		public function keys()
		{
			return $this->__data->keys();
		}
		
		public function prev()
		{
			return $this->__data->prev();
		}
		
		public function values()
		{
			return $this->__data->values();
		}
	}