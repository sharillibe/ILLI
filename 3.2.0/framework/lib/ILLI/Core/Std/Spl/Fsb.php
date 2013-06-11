<?PHP
	NAMESPACE ILLI\Core\Std\Spl;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Exception\ArgumentExpectedException;
	USE ILLI\Core\Std\Invoke;
	USE Exception;
	USE Closure;
	
	CLASS Fsb EXTENDS \SplFixedArray
	{
		#:SplFixedArray:
		public function __construct($__size)
		{
			if(FALSE === is_integer($__size))
				throw new ArgumentExpectedException
				([
					'target'	=> get_called_class(),
					'expected'	=> __const_Type::SPL_LONG,
					'detected'	=> $t = getType($v = $__value),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
				
			parent::__construct($__size);
		}
		
		public function __clone()
		{
			static $__STATIC_map;
			
			isset($__STATIC_map) ? $__STATIC_map : $__STATIC_map = function($__value)
			{
				if(FALSE === is_object($__value))
					return $__value;
				
				if($__value instanceOf Closure)
					$__value->bindTo($this);
				
				return clone $__value;
			};
			
			$this->rewind();
			
			while($this->valid())
			{
				$this[$this->key()] = $__STATIC_map($this->current(), $this->key());
				$this->next();
			}
		}
		
		public static function fromArray($__array, $_ = TRUE)
		{
			$c = get_called_class();
			
			if(FALSE === is_array($__array)
			&& FALSE === ($__array instanceOf $c))
				throw new ArgumentExpectedException
				([
					'target'	=> $c,
					'expected'	=> implode('|', [__const_Type::SPL_ARRAY, $c]),
					'detected'	=> $t = getType($v = $__value),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			$c = get_called_class();
			$A = new $c(count($__array));
			
			foreach($__array as $k => $v)
				$A->offsetSet($k, $v);
				
			return $A;
		}
		
		public function toArray()
		{
			return parent::toArray();
		}
		
		public function getSize()
		{
			return parent::getSize();
		}
		
		public function setSize($__size)
		{
			if(FALSE === is_integer($__size))
				throw new ArgumentExpectedException
				([
					'target'	=> get_called_class(),
					'expected'	=> __const_Type::SPL_LONG,
					'detected'	=> $t = getType($v = $__size),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			parent::setSize($__size);
			return $this;
		}
		
		public function __wakeup()
		{
			return parent::__wakeup();
		}
		
		public function offsetExists($__offset)
		{
			if(FALSE === is_integer($__offset))
				throw new ArgumentExpectedException
				([
					'target'	=> get_called_class(),
					'expected'	=> __const_Type::SPL_LONG,
					'detected'	=> $t = getType($v = $__offset),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			return parent::offsetExists($__offset);
		}
		
		public function offsetGet($__offset)
		{
			if(FALSE === is_integer($__offset))
				throw new ArgumentExpectedException
				([
					'target'	=> get_called_class(),
					'expected'	=> __const_Type::SPL_LONG,
					'detected'	=> $t = getType($v = $__offset),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			return parent::offsetGet($__offset);
		}
	
		public function offsetSet($__offset, $__value)
		{
			if(FALSE === is_integer($__offset))
				throw new ArgumentExpectedException
				([
					'target'	=> get_called_class(),
					'expected'	=> __const_Type::SPL_LONG,
					'detected'	=> $t = getType($v = $__offset),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			parent::offsetSet($__offset, $__value);
			return $this;
		}
		
		public function offsetUnset($__offset)
		{
			if(FALSE === is_integer($__offset))
				throw new ArgumentExpectedException
				([
					'target'	=> get_called_class(),
					'expected'	=> __const_Type::SPL_LONG,
					'detected'	=> $t = getType($v = $__offset),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			return parent::offsetUnset($__offset);
		}
		
		public function count()
		{
			$count = iterator_count($this);
			$this->rewind();
			return $count;
		}
		
		public function current()
		{
			return parent::current();
		}
		
		public function key()
		{
			return parent::key();
		}
		
		public function next()
		{
			return parent::next();
		}
		
		public function rewind()
		{
			return parent::rewind();
		}
		
		public function valid()
		{
			return parent::valid();
		}
		
		public function add($__value)
		{
			$s = $this->getSize();
			$this->setSize($s + 1);
			$this[$s] = $__value;
		}
		
		public function end()
		{
			end($this);
			return current($this);
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
			if(!prev($this))
				end($this);
				
			return current($this);
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