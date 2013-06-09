<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADT;
	USE ILLI\Core\Std\Exception\ArgumentExpectedException;
	USE ILLI\Core\Std\Exception\ArgumentLengthZeroException;
	USE ILLI\Core\Std\Exception\IndexInUseException;
	USE ILLI\Core\Std\Exception\IndexOutOfRangeException;
	USE ILLI\Core\Std\Exception\ClassConstantNotFoundException;
	USE ILLI\Core\Std\Spl\Fsb;
	USE ILLI\Core\Std\Spl\FsbCollection;
	USE Exception;
	
	CLASS ADVTuple EXTENDS \ILLI\Core\Std\Def\ADV
	{
		CONST __GC	= __CLASS__;
		
		private static $__gc = NULL;
		
		protected function parseDef(array $__defineOffsetType)
		{
			if(FALSE === is_array($__defineOffsetType))
				throw new ArgumentExpectedException
				([
					'target'	=> get_called_class(),
					'expected'	=> __const_Type::SPL_ARRAY,
					'detected'	=> $t = getType($v = $__defineOffsetType),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			if([] === $__defineOffsetType)
				throw new ArgumentLengthZeroException;
				
			return $__defineOffsetType;
		}
		
		public function __construct($__defineOffsetType, $__data = NULL)
		{
			if(FALSE === is_array($__defineOffsetType))
				throw new ArgumentExpectedException
				([
					'target'	=> get_called_class(),
					'expected'	=> __const_Type::SPL_ARRAY,
					'detected'	=> $t = getType($v = $__defineOffsetType),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			if([] === $__defineOffsetType)
				throw new ArgumentLengthZeroException;
			
			parent::__construct([__const_Type::SPL_ARRAY]);
			
			$t = &self::$__gc[$this->getName()];
			
			if(TRUE === isset($t))
			{
				$this->set((array) $__data);
				return;
			}
			
			$d = $this->parseDef($__defineOffsetType);
			$r = [];
			
			static $__STATIC_adt;
			isset($__STATIC_adt) ?: $__STATIC_adt = [];
			
			ksort($d);
			
			foreach($d as $i => $o)
			{
				$o = (array) $o;
				if([] !== $o)
				{
					$q = $o;
					
					sort($q);
					$q = implode('|', array_unique($q));
					
					if(FALSE === isset($__STATIC_adt[$q]))
						$__STATIC_adt[$q] = FsbCollection::fromArray(ADT::define($o));
					
					$r[] = &$__STATIC_adt[$q];
				}
				else
				{
					#! void
					$r[] = FsbCollection::fromArray([]);
				}
			}
			
			$t = Fsb::fromArray($r);
			
			$this->set((array) $__data);
		}
		
		public function validate($__value = NULL)
		{
			NULL !== $__value ?: $__value = $this->__data;
			FALSE === ($__value instanceOf FsbCollection) ?: $__value = $__value->toArray();
			
			if(FALSE === parent::validate($__value))
				return FALSE;
				
			foreach($__value as $k => $v)
			{
				if(NULL !== $v
				&& FALSE === $this->validateVal($k, $v))
					return FALSE;
			}
			
			return TRUE;
		}
		
		public function type($__value = NULL)
		{
			NULL !== $__value ?: $__value = $this->__data;
			return parent::type($__value instanceOf FsbCollection ? $__value->toArray() : $__value);
		}
		
		public function is($__expected, $__value = NULL)
		{
			NULL !== $__value ?: $__value = $this->__data;
			return parent::is($__expected, $__value instanceOf FsbCollection ? $__value->toArray() : $__value);
		}
		
		public function set($__value)
		{
			FALSE === ($__value instanceOf FsbCollection) ?: $__value = $__value->toArray();
			
			if(FALSE === parent::validate($__value))
				throw new ArgumentExpectedException
				([
					'target'	=> get_called_class(),
					'expected'	=> implode('|', array_unique($this->getGC()->invoke('toString'))),
					'detected'	=> $t = getType($v = $__value),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			$r = array_fill_keys(range(0, $this->getTupleGC()->getSize() - 1), NULL);
			
			foreach($this->getTupleGC() as $k => $GC)
			{
				if(FALSE === isset($__value[$k])
				|| NULL === $__value[$k])
					continue;
				
				$v = &$__value[$k];
				
				if(FALSE === $GC->evaluate('validate', [$v]))
					throw new ArgumentExpectedException([
						'target'	=> $this->getName().'['.$k.']',
						'expected'	=> implode('|', array_unique($GC->invoke('toString'))), 
						'detected'	=> $t = getType($v),
						'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
					]);
				
				$r[$k] = &$v;
			}
			
			$this->__data = FsbCollection::fromArray($r);
			return $this;
		}
		
		public function __set($__constantName, $__value)
		{
			if(FALSE === is_string($__constantName)
			|| TRUE === is_numeric($__constantName))
				throw new ArgumentExpectedException
				([
					'target'	=> get_called_class(),
					'expected'	=> __const_Type::SPL_STRING,
					'detected'	=> $t = getType($v = $__constantName),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			if(FALSE === defined($constName = get_called_class().'::'.$__constantName))
				throw new ClassConstantNotFoundException(['class' => get_called_class(), 'const' => $__constantName]);
			
			$constValue = constant($constName);
			
			if(FALSE === isset($this->__data[$constValue]))
				throw new IndexOutOfRangeException(['offset' => $constValue]);
			
			if(FALSE === $this->validateVal($constValue, $__value))
				throw new ArgumentExpectedException([
					'target'	=> $this->getName().'['.$constValue.'] ('.$__constantName.')',
					'expected'	=> implode('|', array_unique($this->getValGC($constValue)->invoke('toString'))), 
					'detected'	=> $t = getType($v = $__value),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			$this->__data[$constValue] = $__value;
			
			return $this;
		}
		
		public function __get($__constantName)
		{
			if(FALSE === is_string($__constantName)
			|| TRUE === is_numeric($__constantName))
				throw new ArgumentExpectedException
				([
					'target'	=> get_called_class(),
					'expected'	=> __const_Type::SPL_STRING,
					'detected'	=> $t = getType($v = $__constantName),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			if(FALSE === defined($constName = get_called_class().'::'.$__constantName))
				throw new ClassConstantNotFoundException(['class' => get_called_class(), 'const' => $__constantName]);
			
			$constValue = constant($constName);
			
			if(FALSE === isset($this->__data[$constValue]))
				throw new IndexOutOfRangeException(['offset' => $constValue]);
			
			return $this->__data[$constValue];
		}
		
		public static function mergeOffsetTypes($__define, $__defined)
		{
			if(FALSE === is_array($__define))
				throw new ArgumentExpectedException
				([
					'target'	=> get_called_class(),
					'expected'	=> __const_Type::SPL_ARRAY,
					'detected'	=> $t = getType($v = $__define),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			if(FALSE === is_array($__defined))
				throw new ArgumentExpectedException
				([
					'target'	=> get_called_class(),
					'expected'	=> __const_Type::SPL_ARRAY,
					'detected'	=> $t = getType($v = $__defined),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			$r = [];
			
			foreach($__defined as $const => $value)
			{
				if(FALSE === is_integer($const))
					throw new ArgumentExpectedException
					([
						'target'	=> get_called_class(),
						'expected'	=> __const_Type::SPL_LONG,
						'detected'	=> $t = getType($v = $const),
						'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
					]);
				
				$r[$const] = $value;
			}
			
			foreach($__define as $const => $value)
			{
				if(FALSE === is_integer($const))
					throw new ArgumentExpectedException
					([
						'target'	=> get_called_class(),
						'expected'	=> __const_Type::SPL_LONG,
						'detected'	=> $t = getType($v = $const),
						'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
					]);
				
				if(isset($r[$const]))
					throw new IndexInUseException(['offset' => count($r) - 1]);
					
				$r[$const] = $value;
			}
			
			return $r;
		}
		
		public static function mergeOffsetValues($__define, $__defined)
		{
			if(FALSE === is_array($__define))
				throw new ArgumentExpectedException
				([
					'target'	=> get_called_class(),
					'expected'	=> __const_Type::SPL_ARRAY,
					'detected'	=> $t = getType($v = $__define),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
				
			if(FALSE === is_array($__defined))
				throw new ArgumentExpectedException
				([
					'target'	=> get_called_class(),
					'expected'	=> __const_Type::SPL_ARRAY,
					'detected'	=> $t = getType($v = $__defined),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			$r = [];
			
			$__define = (array) $__define;
				
			foreach($__define as $k => $v)
			{
				if(FALSE === is_integer($k))
					throw new ArgumentExpectedException
					([
						'target'	=> get_called_class(),
						'expected'	=> __const_Type::SPL_LONG,
						'detected'	=> $t = getType($v = $k),
						'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
					]);
				
				$r[$k] = $v;
			}
				
			foreach($__defined as $k => $v)
			{
				if(FALSE === is_integer($k))
					throw new ArgumentExpectedException
					([
						'target'	=> get_called_class(),
						'expected'	=> __const_Type::SPL_LONG,
						'detected'	=> $t = getType($v = $k),
						'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
					]);
				
				isset($r[$k]) ?: $r[$k] = $v;
			}
			
			return $r;
		}
		
		public function validateVal($__offset, $__value = NULL)
		{
			NULL !== $__value ?: $__value = $this->__data[$__offset];
			return $this->getValGC($__offset)->evaluate('validate', [$__value]);
		}
		
		public function typeVal($__offset, $__value = NULL)
		{
			NULL !== $__value ?: $__value = $this->__data[$__offset];
			
			foreach($this->getValGC($__offset) as $ADT)
				if(TRUE === $ADT->validate($__value))
					return $ADT;
			
			return NULL;
		}
		
		public function isVal($__offset, $__expected, $__value = NULL)
		{
			NULL !== $__value ?: $__value = $this->__data[$__offset];
			
			if(NULL === ($ADT = $this->typeVal($__offset, $__value)))
				return FALSE;
			
			foreach((array) $__expected as $_)
				if($ADT instanceOf $_
				|| in_array($_, $ADT->getGC()->toArray()))
					return TRUE;
			
			return FALSE;
		}
		
		public function getTupleGC()
		{
			return self::$__gc[$this->getName()];
		}
		
		public function getValGC($__offset)
		{
			return self::$__gc[$this->getName()]->offsetGet($__offset);
		}
	}