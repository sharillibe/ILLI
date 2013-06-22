<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Exception;
	USE ILLI\Core\Std\Exec\__type_Observer;
	USE ILLI\Core\Std\Reflection\SplMethod;
	USE ILLI\Core\Std\Invoke;

	/**
	 * Virtual Static Observer with child notify support.
	 *
	 * <code>
	 * class bar
	 * {
	 * 	USE ILLI\Core\Std\Exec\__trait_ObserverStatic
	 * 	{
	 * 		Core_Std_Exec___trait_ObserverStatic_register as public regObserverStatic;
	 * 	}
	 * 	
	 * 	function hello($__name)
	 * 	{
	 * 		$this->Core_Std_Exec___trait_ObserverStatic_emit(__METHOD__, func_get_args());
	 * 	}
	 * }
	 * 
	 * class foo EXTENDS bar
	 * {
	 * }
	 * 
	 * bar::regObserverStatic(new __type_Observer([
	 * 	__type_Observer::hook => new ADVArrayCallable([
	 * 		function($f) { print '->called 1 '.$f.PHP_EOL; },
	 * 		function($f) { print '->called 2 '.$f.PHP_EOL; },
	 * 	]),
	 * 	__type_Observer::event => 'bar::hello',
	 * ]));
	 * 
	 * (new bar)->hello('bar');	// 	->called 1 bar
	 *				//	->called 2 bar
	 *
	 * (new foo)->hello('foo');	//	->called 1 foo
	 *				//	->called 2 foo
	 * </code>
	 */
	TRAIT __trait_ObserverStatic
	{
		protected static $__Core_Std_Exec___trait_ObserverStatic_hook = [];
		
		protected static function Core_Std_Exec___trait_ObserverStatic_register(__type_Observer $__Observer)
		{
			static::$__Core_Std_Exec___trait_ObserverStatic_hook[] = $__Observer;
		}
		
		protected static function Core_Std_Exec___trait_ObserverStatic_emit($__eventName, array $__arguments = [], array $__options = [])
		{
			foreach(static::$__Core_Std_Exec___trait_ObserverStatic_hook as $t)
			{
				foreach((array) $t->get()[__type_Observer::event] as $event)
					if($event === $__eventName)
						try
						{
							Invoke::emitMethod($t, 'emit', $__arguments);
						}
						catch(\Exception $E)
						{
							throw new Exception('Invokation Error');
						}
			}
		}
	}