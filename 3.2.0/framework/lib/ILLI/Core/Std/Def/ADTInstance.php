<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADTInstance\ComponentMethodCallException;
	USE ILLI\Core\Std\Def\ADTInstance\ComponentInitializationException;
	USE ILLI\Core\Std\Exception\ArgumentExpectedException;
	USE ILLI\Core\Std\Exception\ArgumentLengthZeroException;
	USE ILLI\Core\Std\Exception\ClassOrInterfaceNotFoundException;
	USE ILLI\Core\Util\Spl;
	USE Exception;
	
	FINAL CLASS ADTInstance EXTENDS \ILLI\Core\Std\Def\ADT
	{
		#:ILLI\Core\Std\Def\ADT:
			/**
			 * value validation
			 *
			 * The value is of type object and an instance of the declared classes.
			 *
			 * @param	mixed $__value
			 * @return	boolean
			 * @catchable	ILLI\Core\Std\Def\ADTInstance\ComponentInitializationException
			 * @throws	ILLI\Core\Std\Def\ADTInstance\ComponentInitializationException::ERROR_M_VALIDATE
			 * @see		ILLI\Core\Std\Def\__const_Type
			 */
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
				catch(Exception $E)
				{
					$c = get_called_class();
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_VALIDATE)
						: new $e($E, $a, $e::ERROR_M_VALIDATE);
				}
			}
			
			#:gc:
				/**
				 * validate typedef request
				 *
				 * :offset<long>
				 *	zero-based index
				 *
				 * :gcType<string>
				 *	a valid class- or interface-name
				 *
				 * @param	array $__defineTypes [{:offset} => {:gcType}]
				 * @return	array
				 * @fires	ILLI\Core\Std\Exception\ClassOrInterfaceNotFoundException when given class or interface doesn't exists
				 * @catchable	ILLI\Core\Std\Def\ADTInstance\ComponentMethodCallException
				 * @throws	ILLI\Core\Std\Def\ADTInstance\ComponentMethodCallException::ERROR_M_PARSE_DEF
				 * @throws	ILLI\Core\Std\Def\ADTInstance\ComponentMethodCallException::ERROR_M_PARSE_DEF_E_P0_V_NOT_FOUND
				 */
				protected function parseDef($__def)
				{
					$c = get_called_class();
				
					try
					{
						$r = parent::parseDef($__def);
						
						foreach($r as $k => &$v)
						{
							$v = ltrim($v, '\\');
							
							if(FALSE === class_exists($v)
							&& FALSE === interface_exists($v))
							{
								$e = $c.'\ComponentMethodCallException';
								$a = ['method' => __METHOD__];
								$E = new ClassOrInterfaceNotFoundException(new ArgumentExpectedException([
									'target'	=> $this->getName().'['.$k.']',
									'expected'	=> implode('|', [__const_Type::SPL_CLASS, __const_Type::SPL_INTERFACE]),
									'detected'	=> $t = getType($v),
									'value'		=> $v = is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
								]), ['name' => $v]);
								
								throw ($c === __CLASS__ || FALSE === class_exists($e))
									? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_PARSE_DEF_E_P0_V_NOT_FOUND)
									: new $e($E, $a, $e::ERROR_M_PARSE_DEF_E_P0_V_NOT_FOUND);
							}
						}
							
						return $r;
					}
					catch(ComponentMethodCallException $E)
					{
						throw $E;
					}
					catch(Exception $E)
					{
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_PARSE_DEF)
							: new $e($E, $a, $e::ERROR_M_PARSE_DEF);
					}
				}
		
				/**
				 * generate gc-hash-address from called-class or from spl_object_hash
				 *
				 * :offset<long>
				 *	zero-based index
				 *
				 * :gcType<string>
				 *	a valid class- or interface-name
				 *
				 * @param	array $__defineTypes [{:offset} => {:gcType}]
				 * @return	string
			 	 * @fires	ILLI\Core\Std\Exception\ArgumentExpectedException when $__defineTypes is not of type array
			 	 * @fires	ILLI\Core\Std\Exception\ArgumentLengthZeroException when $__defineTypes is an empty array
				 * @catchable	ILLI\Core\Std\Def\ADT\ComponentMethodCallException
				 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_CREATE_HASH_ADDR
				 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_CREATE_HASH_ADDR_E_P0_EXPECTED
				 * @throws	ILLI\Core\Std\Def\ADT\ComponentMethodCallException::ERROR_M_CREATE_HASH_ADDR_E_P0_LENGTH
				 * @see		::$__gc
				 */
				protected function createHashAddr($__defineTypes = [])
				{
					$c = get_called_class();
					
					try
					{
						if(FALSE === is_array($__defineTypes))
						{
							$e = $c.'\ComponentMethodCallException';
							$a = ['method' => __METHOD__];
							$E = new ArgumentExpectedException
							([
								'target'	=> $c,
								'expected'	=> __const_Type::SPL_ARRAY,
								'detected'	=> $t = getType($v = $__defineTypes),
								'value'		=> is_object($v) ? get_class($v) : (is_scalar($v) ? $v : NULL)
							]);
							
							throw ($c === __CLASS__ || FALSE === class_exists($e))
								? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_CREATE_HASH_ADDR_E_P0_EXPECTED)
								: new $e($E, $a, $e::ERROR_M_CREATE_HASH_ADDR_E_P0_EXPECTED);
						}
						
						if([] === $__defineTypes)
						{
							$e = $c.'\ComponentMethodCallException';
							$E = new ArgumentLengthZeroException;
							$a = ['method' => __METHOD__];
							throw ($c === __CLASS__ || FALSE === class_exists($e))
								? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_CREATE_HASH_ADDR_E_P0_LENGTH)
								: new $e($E, $a, $e::ERROR_M_CREATE_HASH_ADDR_E_P0_LENGTH);
						}
						
						$d = array_unique($__defineTypes);
						sort($d);
						
						return Spl::nameWithHash(get_called_class(), implode('|', $d));
					}
					catch(ComponentMethodCallException $E)
					{
						throw $E;
					}
					catch(Exception $E)
					{
						$e = $c.'\ComponentMethodCallException';
						$a = ['method' => __METHOD__];
						throw ($c === __CLASS__ || FALSE === class_exists($e))
							? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_CREATE_HASH_ADDR)
							: new $e($E, $a, $e::ERROR_M_CREATE_HASH_ADDR);
					}
				}
			#::
		#::
	}