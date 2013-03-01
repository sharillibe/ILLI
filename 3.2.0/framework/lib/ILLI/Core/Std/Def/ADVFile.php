<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADVFile\ComponentMethodCallException;
	USE ILLI\Core\Std\Def\ADVFile\ComponentInitializationException;
	USE Exception;
	
	CLASS ADVFile EXTENDS \ILLI\Core\Std\Def\ADV
	{
		#:ILLI\Core\Std\Def\ADV:
			/**
			 * Instantiate a new ADT-Value-Pair for value of type file-path.
			 *
			 * @param	string		$__data		the initial data
			 * @catchable	ILLI\Core\Std\Def\ADVFile\ComponentInitializationException
			 */
			public function __construct($__data = NULL)
			{
				try
				{
					parent::__construct([__const_Type::SPL_FILE]);
					
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