<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Exception;
	USE ILLI\Core\Std\Exec\__type_Observer;
	USE ILLI\Core\Std\Reflection\SplMethod;
	USE ILLI\Core\Std\Invoke;

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