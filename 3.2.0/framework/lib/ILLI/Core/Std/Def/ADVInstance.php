<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADVInstance\ComponentMethodCallException;
	USE ILLI\Core\Std\Def\ADVInstance\ComponentInitializationException;
	
	CLASS ADVInstance EXTENDS \ILLI\Core\Std\Def\ADV
	{
		#:ILLI\Core\Std\Def\ADV:
			public function __construct($__className, $__data = NULL)
			{
				try
				{
					parent::__construct((array) $__className);
					
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