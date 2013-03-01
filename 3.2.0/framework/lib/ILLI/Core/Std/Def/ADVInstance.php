<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\ADVInstance\ComponentMethodCallException;
	USE ILLI\Core\Std\Def\ADVInstance\ComponentInitializationException;
	USE Exception;
	
	CLASS ADVInstance EXTENDS \ILLI\Core\Std\Def\ADV
	{
		#:ILLI\Core\Std\Def\ADV:
			/**
			 * Instantiate a new ADT-Value-Pair for value of type instance.
			 *
			 * @param	string		$__className	the class- or interface-name
			 * @param	object		$__data		the initial data
			 * @catchable	ILLI\Core\Std\Def\ADVInstance\ComponentInitializationException
			 */
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
				catch(Exception $E)
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