<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADTInstance\ComponentMethodCallException;
	USE ILLI\Core\Std\Def\ADTInstance\ComponentInitializationException;
	USE ILLI\Core\Std\Exception\ArgumentExpectedException;
	USE ILLI\Core\Std\Exception\ArgumentLengthZeroException;
	USE ILLI\Core\Std\Exception\ClassOrInterfaceNotFoundException;
	USE ILLI\Core\Util\Spl;
	
	FINAL CLASS ADTInstance EXTENDS \ILLI\Core\Std\Def\ADT
	{
		#:ILLI\Core\Std\Def\ADT:
			protected function createHashAddr(array $__defineTypes = [])
			{
				try
				{
					$d = &$__defineTypes;
					
					if([] === $d)
						throw new ArgumentLengthZeroException;
					
					$d = array_unique($d);
					sort($d);
					
					return Spl::nameWithHash(get_called_class(), implode('|', $d));
				}
				catch(\Exception $E)
				{
					throw new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_CREATE_HASH_ADDR, ['method' => __METHOD__]);
				}
			}
			
			protected function parseDef(array $__def)
			{
				try
				{
					$r = parent::parseDef($__def);
					
					foreach($r as $k => &$v)
					{
						$v = ltrim($v, '\\');
						
						if(FALSE === class_exists($v)
						&& FALSE === interface_exists($v))
							throw new ClassOrInterfaceNotFoundException(new ArgumentExpectedException([
								'target'	=> $this->getName().'['.$k.']',
								'expected'	=> 'class|interface',
								'detected'	=> $t = getType($v),
								'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
							]), ['name' => $v]);
					}
					
					if([] === $r)
						throw new ArgumentLengthZeroException;
						
					return $r;
				}
				catch(\Exception $E)
				{
					throw new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_PARSE_DEF, ['method' => __METHOD__]);
				}
			}
			
			public function validate($__value)
			{
				try
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
				catch(\Exception $E)
				{
					$c = get_called_class();
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_VALIDATE)
						: new $e($E, $a, $e::ERROR_M_VALIDATE);
				}
			}
		#::
	}