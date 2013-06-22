<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Exception;
	USE ILLI\Core\Std\Exec\__type_Action;
	USE ILLI\Core\Std\Reflection\SplMethod;
	USE ILLI\Core\Std\Invoke;
	
	/**
	 * Virtual Static Action. Typically implemented by ::__construct() or __destruct()
	 *
	 * <code>
	 * 	class b
	 * 	{
	 * 		use ILLI\Core\Std\Exec\__trait_ActionStatic
	 * 		{
	 * 			Core_Std_Exec___trait_ActionStatic_register as public regAction;
	 * 			Core_Std_Exec___trait_ActionStatic_emit as public emitAction;
	 * 		}
	 * 		
	 * 		public function __construct()
	 * 		{
	 * 			$this->emitAction('bob');
	 * 		}
	 * 	}
	 * 	
	 * 	b::regAction(new __type_Action([
	 * 		__type_Action::event	=> 'bob',
	 * 		__type_Action::handle	=> function()
	 * 		{
	 * 			var_dump('foo');
	 * 		},
	 * 	]));
	 * 	
	 * 	b::regAction(new __type_Action([
	 * 		__type_Action::event	=> 'bob',
	 * 		__type_Action::priority	=> 10,
	 * 		__type_Action::handle	=> function()
	 * 		{
	 * 			var_dump('fogbgbo');
	 * 		},
	 * 	]));
	 * 	
	 * 	$b = new b;	// string(7) "fogbgbo"
	 * 			// string(3) "foo"
	 * 			
	 * 	$c = new b;	// nothing...
 	 * </code>
 	 */
	TRAIT __trait_ActionStatic
	{
		protected static $__Core_Std_Exec___trait_ActionStatic_hook = [];
		
		protected static function Core_Std_Exec___trait_ActionStatic_register(__type_Action $__Action)
		{
			$h =& static::$__Core_Std_Exec___trait_ActionStatic_hook[$__Action->get()[__type_Action::event]];
			$h[$__Action->get()[__type_Action::priority]][] = $__Action;
			
			ksort($h);
		}
		
		protected static function Core_Std_Exec___trait_ActionStatic_emit($__eventName, array $__arguments = [], array $__options = [])
		{
			$h = &static::$__Core_Std_Exec___trait_ActionStatic_hook[$__eventName];
			
			if(TRUE === isset($h))
				try
				{
					foreach($h as $p => $s)
						foreach($s as $c)
							Invoke::emitMethod($c, 'emit', $__arguments);
					
					unset(static::$__Core_Std_Exec___trait_ActionStatic_hook[$__eventName]);
				}
				catch(\Exception $E)
				{
					throw new Exception('Invokation Error', $E);
				}
		}
	}