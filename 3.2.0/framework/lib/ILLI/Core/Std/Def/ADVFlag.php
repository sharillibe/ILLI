<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE Exception;
	USE ArrayIterator;
	
	CLASS ADVFlag EXTENDS \ILLI\Core\Std\Def\ADV IMPLEMENTS \IteratorAggregate
	{
		public function __construct($__data = NULL)
		{
			parent::__construct([__const_Type::SPL_FLAG]);
				
			if(NULL !== $__data)
				$this->set($__data);
		}
		
		public function offsetGet($__offset)
		{
        		return ($m = 1 << $__offset) === ($m & $this->__data);
		}
		
		public function offsetSet($__offset, $__value)
		{
			if(TRUE === $__value)
			{
				$this->__data |= 1 << $__offset;
			}
			else
			if(FALSE === $__value)
			{
				$this->__data &= ~ (1 << $__offset);
			}
			
        		return $this;
		}
		
		public function offsetToggle($__offset)
		{
			$this->__data ^= 1 << $__offset;
        		return $this;
		}
		
		public function inverse()
		{
			foreach($this->toArray() as $k => $_)
				$this->offsetToggle($k);
			
			return $this;
		}
		
		public function toBase($__base = 2)
		{
        		return base_convert($this->__data, 10, $__base);
		}
		
		public function toArray()
		{
			return array_map(function(&$v) { return (bool) $v;}, str_split(strrev($this->toBase(2))));
		}
		
		public function getIterator()
		{
			return new ArrayIterator($this->toArray());
		}
	}