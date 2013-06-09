<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Exception\ArgumentExpectedException;
	USE ILLI\Core\Std\Exception\ArgumentLengthZeroException;
	USE ILLI\Core\Std\Exception\ClassOrInterfaceNotFoundException;
	USE ILLI\Core\Util\Spl;
	USE Exception;
	
	FINAL CLASS ADTInstance EXTENDS \ILLI\Core\Std\Def\ADT
	{
		public function validate($__value)
		{
			$v = &$__value;
			$t = getType($v);
			
			foreach($this->getGC() as $h)
			{
				if(__const_Type::SPL_OBJECT === $t
				&& (class_exists($h) || interface_exists($h))
				&& (is_subclass_of($v, $h) || $v instanceOf $h))
					return TRUE;
			}
			
			return FALSE;
		}
		
		protected function parseDef($__def)
		{
			$r = parent::parseDef($__def);
			
			foreach($r as $k => &$v)
			{
				$v = ltrim($v, '\\');
				
				if(FALSE === class_exists($v)
				&& FALSE === interface_exists($v))
					throw new ClassOrInterfaceNotFoundException(new ArgumentExpectedException([
						'target'	=> $this->getName().'['.$k.']',
						'expected'	=> implode('|', [__const_Type::SPL_CLASS, __const_Type::SPL_INTERFACE]),
						'detected'	=> $t = getType($v),
						'value'		=> $v = is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
					]), ['name' => $v]);
			}
				
			return $r;
		}

		protected function createHashAddr($__defineTypes = [])
		{
			if(FALSE === is_array($__defineTypes))
				throw new ArgumentExpectedException
				([
					'target'	=> __METHOD__,
					'expected'	=> __const_Type::SPL_ARRAY,
					'detected'	=> $t = getType($v = $__defineTypes),
					'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
				]);
			
			if([] === $__defineTypes)
				throw new ArgumentLengthZeroException;
			
			$d = array_unique($__defineTypes);
			sort($d);
			
			return Spl::nameWithHash(get_called_class(), implode('|', $d));
		}
	}