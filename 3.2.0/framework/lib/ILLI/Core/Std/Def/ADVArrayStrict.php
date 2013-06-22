<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADT;
	USE ILLI\Core\Std\Exception\ArgumentOutOfRangeException;
	USE ILLI\Core\Std\Exception\ArgumentExpectedException;
	USE ILLI\Core\Std\Spl\Fsb;
	USE ILLI\Core\Std\Spl\FsbCollection;
	USE Exception;
	USE ArrayAccess;
	USE Countable;
	USE Iterator;
	
	
	CLASS ADVArrayStrict EXTENDS \ILLI\Core\Std\Def\ADV IMPLEMENTS ArrayAccess, Countable, Iterator
	{
		USE \ILLI\Core\Std\Def\__trait_ADVCollectable;
		USE \ILLI\Core\Std\Def\__trait_ADVCountable;
		USE \ILLI\Core\Std\Def\__trait_ADVIterable;
		
		CONST __GC	= __CLASS__;
		
		private static $__gc = NULL;
		
		public function __construct($__defineKeyType = NULL, $__defineValType = NULL, $__data = NULL)
		{
			parent::__construct([__const_Type::SPL_ARRAY]);
			
			$t = &self::$__gc[$this->getName()];
			
			if(FALSE === isset($t))
				$t = Fsb::fromArray([
					FsbCollection::fromArray(NULL === $__defineKeyType ? [] : ADT::define((array) $__defineKeyType)),
					FsbCollection::fromArray(NULL === $__defineValType ? [] : ADT::define((array) $__defineValType))
				]);
			
			if(NULL !== $__data)
				$this->set($__data);
		}
		
		public function validate($__value = NULL)
		{
			if(FALSE === parent::validate($__value))
				return FALSE;
			
			foreach($__value as $k => $v)
			{
				if(FALSE === $this->validateKey($k))
					return FALSE;
					
				if(FALSE === $this->validateVal($v))
					return FALSE;
			}
		
			return TRUE;
		}
		
		public function validateKey($__value)
		{
			return $this->getKeyGC()->evaluate('validate', [$__value]);
		}
		
		public function validateVal($__value)
		{
			return $this->getValGC()->evaluate('validate', [$__value]);
		}
		
		public function set($__value)
		{
			if(FALSE === parent::validate($__value))
				throw new ArgumentExpectedException
				([
					'target'	=> get_called_class(),
					'expected'	=> implode('|', array_unique($this->getGC()->invoke('toString'))),
					'detected'	=> $t = getType($v = $__value),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			$i = 0;
			foreach($__value as $k => $v)
			{
				if(FALSE === $this->validateKey($k))
					throw new ArgumentExpectedException([
						'target'	=> $this->getName().'['.$i.']',
						'expected'	=> implode('|', array_unique($this->getKeyGC()->invoke('toString'))), 
						'detected'	=> $t = getType($k),
						'value'		=> is_object($k) ? get_class($k) : (is_scalar($k) ? $k : NULL)
					]);
					
				if(FALSE === $this->validateVal($v))
					throw new ArgumentExpectedException([
						'target'	=> $this->getName().'['.$i.']',
						'expected'	=> implode('|', array_unique($this->getValGC()->invoke('toString'))), 
						'detected'	=> $t = getType($v),
						'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
					]);
				
				$i++;
			}
		
			$this->__data = $__value;
			return $this;
		}
		
		public function __destruct()
		{
			//if(get_called_class() === __CLASS__)
			if(get_called_class() === static::__GC)
				unset(self::$__gc[$this->getName()]);
				
			parent::__destruct();
		}
	
		public function typeVal($__value = NULL)
		{
			NULL !== $__value ?: $__value = $this->__data;
			if(NULL === $__value)
				return NULL;
			
			foreach($this->getValGC() as $ADT)
				if(TRUE === $ADT->validate($__value))
					return $ADT;
				
			return NULL;
		}
		
		public function keyVal($__value = NULL)
		{
			NULL !== $__value ?: $__value = $this->__data;
			if(NULL === $__value)
				return NULL;
			
			foreach($this->getKeyGC() as $ADT)
				if(TRUE === $ADT->validate($__value))
					return $ADT;
				
			return NULL;
		}
		
		public function isVal($__expected, $__value = NULL)
		{
			NULL !== $__value ?: $__value = $this->__data;
			
			if(NULL === ($ADT = $this->typeVal($__value)))
				return FALSE;
				
			foreach((array) $__expected as $_)
				if($ADT instanceOf $_
				|| in_array($_, $ADT->getGC()->toArray()))
					return TRUE;
				
			return FALSE;
		}
		
		public function isKey($__expected, $__value = NULL)
		{
			NULL !== $__value ?: $__value = $this->__data;
			
			if(NULL === ($ADT = $this->typeKey($__value)))
				return FALSE;
				
			foreach((array) $__expected as $_)
				if($ADT instanceOf $_
				|| in_array($_, $ADT->getGC()->toArray()))
					return TRUE;
				
			return FALSE;
		}
		
		public function offsetSet($k = NULL, $v)
		{
			if(NULL === $this->__data)
				$this->__data = [];
				
			NULL !== $k ?: $k = [] === $this->__data ? 0 : max(array_keys($this->__data)) + 1;
			
			if(FALSE === $this->validateKey($k))
				throw new ArgumentExpectedException([
					'target'	=> $this->getName().'['.$k.']',
					'expected'	=> implode('|', array_unique($this->getKeyGC()->invoke('toString'))), 
					'detected'	=> $t = getType($k),
					'value'		=> is_object($k) ? get_class($k) : (is_scalar($k) ? $k : NULL)
				]);
			
			if(FALSE === $this->validateVal($v))
				throw new ArgumentExpectedException([
					'target'	=> $this->getName().'['.$k.']',
					'expected'	=> implode('|', array_unique($this->getValGC()->invoke('toString'))), 
					'detected'	=> $t = getType($v),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			$this->__data[$k] = $v;
			
			return $this;
		}
		
		public function offsetGet($k)
		{
			if(FALSE === $this->validateKey($k))
				throw new ArgumentExpectedException([
					'target'	=> $this->getName().'['.$k.']',
					'expected'	=> implode('|', array_unique($this->getKeyGC()->invoke('toString'))), 
					'detected'	=> $t = getType($k),
					'value'		=> is_object($k) ? get_class($k) : (is_scalar($k) ? $k : NULL)
				]);
			
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
			if(FALSE === $this->validateKey($k))
				throw new ArgumentExpectedException([
					'target'	=> $this->getName().'['.$k.']',
					'expected'	=> implode('|', array_unique($this->getKeyGC()->invoke('toString'))), 
					'detected'	=> $t = getType($k),
					'value'		=> is_object($k) ? get_class($k) : (is_scalar($k) ? $k : NULL)
				]);
			
			if(FALSE === isset($this->__data[$k]))
				throw new ArgumentOutOfRangeException([
					'target'	=> $this->getName(),
					'offset'	=> $k,
					'detected'	=> $t = getType($k)
				]);
			
			unset($this->__data[$k]);
			
			return $this;
		}
		
		public function offsetExists($k)
		{
			if(FALSE === $this->validateKey($k))
				throw new ArgumentExpectedException([
					'target'	=> $this->getName().'['.$k.']',
					'expected'	=> implode('|', array_unique($this->getKeyGC()->invoke('toString'))), 
					'detected'	=> $t = getType($k),
					'value'		=> is_object($k) ? get_class($k) : (is_scalar($k) ? $k : NULL)
				]);
			
			return isset($this->__data[$k]);
		}
		
		public function getKeyGC()
		{
			return self::$__gc[$this->getName()]->offsetGet(0);
		}
		
		public function getValGC()
		{
			return self::$__gc[$this->getName()]->offsetGet(1);
		}
	}