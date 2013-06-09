<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Exception;
	USE ILLI\Core\Std\Exec\__type_Call;
	USE ILLI\Core\Std\Reflection\SplMethod;
	USE ILLI\Core\Std\Invoke;
	
	/**
	 * 		class bar
	 * 		{
	 * 			USE ILLI\Core\Std\Exec\__trait_CallStatic
	 * 			{
	 * 				Core_Std_Exec___trait_CallStatic_register as public regCallStatic;
	 * 			}
	 * 			
	 * 			function __callStatic($__name, $__arguments)
	 * 			{
	 * 				return static::Core_Std_Exec___trait_CallStatic_emit($__name, $__arguments);
	 * 			}
	 * 		}
	 * 		
	 * 		class foo EXTENDS bar
	 * 		{
	 * 		}
	 * 		
	 * 		class alice EXTENDS bar
	 * 		{
	 * 			public static function virt($f)
	 * 			{
	 * 				return __METHOD__.parent::virt($f);
	 * 			}
	 * 		}
	 * 		
	 * 		class bob
	 * 		{
	 * 			USE ILLI\Core\Std\Exec\__trait_CallStatic
	 * 			{
	 * 				Core_Std_Exec___trait_CallStatic_register as public regCallStatic;
	 * 			}
	 * 			
	 * 			function __callStatic($__name, $__arguments)
	 * 			{
	 * 				return static::Core_Std_Exec___trait_CallStatic_emit($__name, $__arguments);
	 * 			}
	 * 		}
	 * 		
	 * 		print PHP_EOL;
	 * 		
	 * 		bar::regCallStatic(new __type_Call([__const_Type::SPL_STRING], [
	 * 			__type_Call::handle => function($f) { return '->called '.$f; },
	 * 			__type_Call::name => 'virt',
	 * 		]));
	 * 		
	 * 		print bar::virt('bar'); 	// called bar
	 * 		print foo::virt('foo'); 	// called foo
	 * 		print alice::virt('alice'); 	// alice::virt->called alice
	 * 		print bob::virt('bob'); 	// null
	 */
	TRAIT __trait_CallStatic
	{
		protected static $__Core_Std_Exec___trait_CallStatic_hook = [];
		
		protected static function Core_Std_Exec___trait_CallStatic_register(__type_Call $__Call)
		{
			static::$__Core_Std_Exec___trait_CallStatic_hook[$__Call->get()[__type_Call::name]] = $__Call;
		}
		
		protected static function Core_Std_Exec___trait_CallStatic_emit($__functionName, array $__arguments = [], array $__options = [])
		{
			$__options += ['return' => NULL];
			
			$h = &static::$__Core_Std_Exec___trait_CallStatic_hook[$__functionName];
			
			if(TRUE === isset($h))
				try
				{
					$__options['return'] = Invoke::emitMethod($h, 'emit', $__arguments);
				}
				catch(\Exception $E)
				{
					throw new Exception('Invokation Error', $E);
				}
			
			return $__options['return'];
		}
	}