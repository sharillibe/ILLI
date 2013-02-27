<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADVResource\ComponentMethodCallException;
	USE ILLI\Core\Std\Def\ADVResource\ComponentInitializationException;
	
	CLASS ADVResource EXTENDS \ILLI\Core\Std\Def\ADV
	{
		#:ILLI\Core\Std\Def\ADV:
			public function __construct($__data = NULL)
			{
				try
				{
					parent::__construct([__const_Type::SPL_RESOURCE]);
					
					if(NULL !== $__data)
						$this->set($__data);
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
		#::
	}