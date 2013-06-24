<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Exception;
	USE ILLI\Core\Std\Exec\__type_Delegate;
	USE ILLI\Core\Std\Reflection\SplMethod;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Util\String;
	
	/**
	 * Virtual Static Method Delegate.
	 *
	 * <code>
	 * </code>
	 */
	TRAIT __trait_DelegateStatic
	{
		protected static $__Core_Std_Exec___trait_DelegateStatic_hook = [];
		
		protected static function Core_Std_Exec___trait_DelegateStatic_register(__type_Delegate $__Delegate)
		{
			static::$__Core_Std_Exec___trait_DelegateStatic_hook[$__Delegate->get()[__type_Delegate::origin]] = $__Delegate;
		}
		
		protected static function Core_Std_Exec___trait_DelegateStatic_exists($__origin)
		{
			$h = &static::$__Core_Std_Exec___trait_DelegateStatic_hook[$__origin];
			return TRUE === isset($h) && NULL !== $h->get()[__type_Delegate::handle];
		}
		
		protected static function Core_Std_Exec___trait_DelegateStatic_emit($__origin, array $__arguments = [], array $__options = [])
		{
			$__options += ['return' => NULL];
			
			$h = &static::$__Core_Std_Exec___trait_DelegateStatic_hook[$__origin];
			
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