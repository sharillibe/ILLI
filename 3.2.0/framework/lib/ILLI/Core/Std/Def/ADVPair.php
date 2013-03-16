<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\ADVPair\ComponentMethodCallException;
	USE ILLI\Core\Std\Def\ADVPair\ComponentInitializationException;
	USE Exception;
	
	CLASS ADVPair EXTENDS \ILLI\Core\Std\Def\ADVTuple
	{
		#:ILLI\Core\Std\Def\ADV:
			CONST __GC		= __CLASS__;
			
			CONST key		= 0x00;
			CONST value		= 0x01;
			
			/**
			 * Instantiate a new ADVPair with ADT for key and value.
			 *
			 * ADVPair couples together a pair of values, which may be of different types (T1 and T2).
			 *
			 * :offset<long>
			 *	zero-based index
			 *
			 * :gcType<string>
			 *	a valid __const_Type
			 *
			 * @param	string	$__t1			{:gcType}
			 * @param	array	$__t1			[{:offset} => {:gcType}]
			 * @param	string	$__t2			{:gcType}
			 * @param	array	$__t2			[{:offset} => {:gcType}]
			 * @param	array	$__data1		initial primary data
			 * @param	array	$__data2		initial secondary data
			 * @catchable	ILLI\Core\Std\Def\ADVArrayStrict\ComponentInitializationException
			 * @see		ILLI\Core\Std\Def\ADV::__construct()
			 * @see		ILLI\Core\Std\Def\ADT::define()
			 */
			public function __construct($__t1, $__t2, $__data1 = NULL, $__data2 = NULL)
			{
				try
				{
					parent::__construct([self::key => $__t1, self::value => $__t2], [self::key => $__data1, self::value => $__data2]);
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