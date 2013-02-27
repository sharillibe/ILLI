<?PHP
	NAMESPACE ILLI\Core\Std;
	
	CLASS Bit
	{
		protected $__mask = 0;
		
		public function __construct($__mask = 0)
		{
			$this->__mask = $__mask;
		}
		
		public function toArray()
		{
			return array_map('intval', str_split(strrev(base_convert($this->__mask, 10, 2))));
		}
		
		public function __toString()
		{
			return str_val($this->__mask);
		}
		
		public function get($__offset)
		{
        		return ($m = 1 << $__offset) === ($m & $this->__mask);
		}
		
		public function set($__offset)
		{
			$this->__mask |= 1 << $__offset;
        		return $this;
		}
		
		public function reset($__offset)
		{
			$this->__mask &= ~ (1 << $__offset);
        		return $this;
		}
		
		public function toggle($__offset)
		{
			$this->__mask ^= 1 << $__offset;
        		$this->get($__offset);
        		return $this;
		}
		
		public function reverse($size = 8)
		{
			$this->__mask = intval(strrev(str_pad(2, (strlen(base_convert($this->__mask, 10, 2)) % $size + 1) * $size, 0, STR_PAD_LEFT)));
			return $this;
		}
	}