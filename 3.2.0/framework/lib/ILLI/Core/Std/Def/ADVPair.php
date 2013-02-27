<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADT;
	USE ILLI\Core\Std\Def\ADVPair\ComponentMethodCallException;
	USE ILLI\Core\Std\Def\ADVPair\ComponentInitializationException;
	USE ILLI\Core\Std\Exception\ArgumentExpectedException;
	USE ILLI\Core\Std\Spl\Fsb;
	USE ILLI\Core\Std\Spl\FsbCollection;
	USE ILLI\Core\Util\Spl;
	
	CLASS ADVPair EXTENDS \ILLI\Core\Std\Def\ADVTuple
	{
		
		#:ILLI\Core\Std\Def\ADV:
			CONST __GC	= __CLASS__;
			
			/**
			 * Instantiate a new ADVPair with ADT for key and value.
			 *
			 * ADVPair couples together a pair of values, which may be of different types (T1 and T2).
			 *
			 * @param	string	$__definePrimaryType	{:gcType}
			 * @param	array	$__definePrimaryType	[{:offset} => {:gcType}]
			 * @param	string	$__defineSecondaryType	{:gcType}
			 * @param	array	$__defineSecondaryType	[{:offset} => {:gcType}]
			 * @param	array	$__primaryData		initial primary data
			 * @param	array	$__secondaryData	initial secondary data
			 * @catchable	ILLI\Core\Std\Def\ADVArrayStrict\ComponentInitializationException
			 * @see		ILLI\Core\Std\Def\ADV::__construct()
			 * @see		ILLI\Core\Std\Def\ADT::define()
			 */
			public function __construct($__T1, $__T2, $__primaryData = NULL, $__secondaryData = NULL)
			{
				try
				{
					parent::__construct([$__T1, $__T2], [$__primaryData, $__secondaryData]);
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
			
			/*
			protected function createHashAddr(array $__defineTypes = [])
			{
				$c = get_called_class();
				
				try
				{
					#~ performanced ADT: cache request by called-class; otherwise by hash
					return $c === __CLASS__ ? Spl::nameWithHash($c, $this) : $c;
				}
				catch(\Exception $E)
				{
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_CREATE_HASH_ADDR)
						: new $e($E, $a, $e::ERROR_CREATE_HASH_ADDR);
				}
			}
			*/
		#::
	}