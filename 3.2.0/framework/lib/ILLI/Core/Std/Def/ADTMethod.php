<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADTMethod\ComponentMethodCallException;
	USE ILLI\Core\Std\Def\ADTMethod\ComponentInitializationException;
	USE ILLI\Util\String;
	
	FINAL CLASS ADTMethod EXTENDS \ILLI\Core\Std\Def\ADT
	{
		#:ILLI\Core\Std\Def\ADT:
			public function __construct()
			{
				try
				{
					parent::__construct([__const_Type::SPL_METHOD]);
				}
				catch(ComponentInitializationException $E)
				{
					throw $E;
				}
				catch(\Exception $E)
				{
					$c = get_called_class();
					$e = $c.'\ComponentInitializationException';
					$a = ['class' => $c];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentInitializationException($E, $a)
						: new $e($E, $a);
				}
			}
			
			public function validate($__value)
			{
				try
				{
					$t = getType($__value);
					
					$c = '';
					$m = '';
						
					if($t === __const_Type::SPL_STRING)
					{
						String::explodeTo([&$c, &$m], $__value, '::');
					}
					
					if($t === __const_Type::SPL_ARRAY)
					{
						$c = &$__value[0];
						$m = &$__value[1];
					}
					
					return method_exists($c, $m);
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