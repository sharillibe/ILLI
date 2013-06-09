<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ArrayAccess;
	USE Countable;
	USE Exception;
	USE Iterator;
	
	CLASS ADVArray EXTENDS \ILLI\Core\Std\Def\ADV IMPLEMENTS ArrayAccess /*, ITERATOR, COUNTABLE */
	{
		public function __construct($__data = NULL)
		{
			parent::__construct([__const_Type::SPL_ARRAY]);
				
			if(NULL !== $__data)
				$this->set($__data);
		}
		
		public function offsetSet($k = NULL, $v)
		{
			NULL !== $k ?: $k = [] === $this->__data ? 0 : max(array_keys($this->__data)) + 1;
			
			$this->__data[$k] = $v;
			
			return $this;
		}
		
		public function offsetGet($k)
		{
			if(FALSE === isset($this->__data[$k]))
				throw new ArgumentOutOfRangeException([
					'target'	=> $this->getName(),
					'offset'	=> $k,
					'detected'	=> $t = getType($k)
				]);
			
			return $this->__data[$k];
		}
		
		public function offsetUnset($k)
		{
			if(TRUE === isset($this->__data[$k]))
				unset($this->__data[$k]);
			
			return $this;
		}
		
		public function offsetExists($k)
		{
			return isset($this->__data[$k]);
		}
	}