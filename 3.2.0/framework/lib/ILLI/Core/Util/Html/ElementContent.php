<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ArrayAccess;
	USE ILLI\Core\Std\Exception;
	USE ILLI\Core\Std\Exception\ArgumentExpectedException;
	USE ILLI\Core\Std\Exception\ArgumentOutOfRangeException;
	
	CLASS ElementContent EXTENDS \ILLI\Core\Std\Def\ADVArrayStrict IMPLEMENTS ArrayAccess
	{
		/**
		 * Instantiate the HTML Element structure
		 *
		 * zero based strict array.
		 * ADT is defined in each element::$__tContent
		 *
		 * @param	array $__t	Element::$__tContent
		 * @param	array $__setup	initial data
		 * @see		ILLI\Core\Util\Html\Element::__construct()
		 * @see		ILLI\Core\Util\Html\Element::$__tContent
		 */
		public function __construct(array $__t, array $__setup = [])
		{
			parent::__construct([__const_Type::SPL_LONG], $__t, $__setup);
		}
		
		/**
		 * convert __type_Element::content to string
		 *
		 * @return	string
		 * @see		ILLI\Core\Util\Html\__type_Element::content
		 * @see		ILLI\Core\Util\Html\Element::$__tContent
		 */
		public function render()
		{
			$r = [];
			foreach($this->__data as $e)
			{
				switch(TRUE):
					case $e instanceOf Element:
						$r[] = $e->render();
						break;
					case is_string($e):
						$r[] = $e;
						break;
				endswitch;
			}
			
			return implode(PHP_EOL, $r);
		}
		
		#:ArrayAccess:
			function offsetSet($k = NULL, $v)
			{
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
			
			function offsetGet($k)
			{
				if(FALSE === $this->validateKey($k))
					throw new ArgumentExpectedException([
						'target'	=> $this->getName().'['.$k.']',
						'expected'	=> implode('|', array_unique($this->getKeyGC()->invoke('toString'))), 
						'detected'	=> $t = getType($k),
						'value'		=> is_object($k) ? get_class($k) : (is_scalar($k) ? $k : NULL)
					]);
				
				if(FALSE === isset($this->__data[$k]))
					throw new ArgumentOutOfRangeException;
				
				return $this->__data[$k];
			}
			
			function offsetUnset($k)
			{
				if(FALSE === $this->validateKey($k))
					throw new ArgumentExpectedException([
						'target'	=> $this->getName().'['.$k.']',
						'expected'	=> implode('|', array_unique($this->getKeyGC()->invoke('toString'))), 
						'detected'	=> $t = getType($k),
						'value'		=> is_object($k) ? get_class($k) : (is_scalar($k) ? $k : NULL)
					]);
				
				if(FALSE === isset($this->__data[$k]))
					throw new ArgumentOutOfRangeException;
				
				unset($this->__data[$k]);
				
				return $this;
			}
			
			function offsetExists($k)
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
		#::
	}