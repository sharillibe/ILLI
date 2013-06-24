<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Exception;
	USE ILLI\Core\Std\Exec\__type_Class;
	USE ILLI\Core\Std\Reflection\SplMethod;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Util\String;
	
	/**
	 * Virtual Static Class Delegate.
	 *
	 * <code>
	 * </code>
	 */
	TRAIT __trait_ClassStatic
	{
		protected static $__Core_Std_Exec___trait_ClassStatic_hook = [];
		
		protected static function Core_Std_Exec___trait_ClassStatic_register(__type_Class $__Class)
		{
			$ident = NULL === $__Class->get()[__type_Class::identifier]
				? $__Class->get()[__type_Class::origin]
				: $__Class->get()[__type_Class::identifier];
			
			
			static::$__Core_Std_Exec___trait_ClassStatic_hook[$ident] = $__Class;
		}
		
		protected static function Core_Std_Exec___trait_ClassStatic_exists($__ident)
		{
			$h = &static::$__Core_Std_Exec___trait_ClassStatic_hook[$__ident];
			return TRUE === isset($h) && NULL !== $h->get()[__type_Class::handle] && NULL !== $h->get()[__type_Class::origin];
		}
		
		protected static function Core_Std_Exec___trait_ClassStatic_handle($__ident, $__handleClassName)
		{
			$h = &static::$__Core_Std_Exec___trait_ClassStatic_hook[$__ident];
			if(FALSE === isset($h))
				return;
			
			$h->get()[__type_Class::handle] = $__handleClassName;
		}
		
		protected static function Core_Std_Exec___trait_ClassStatic_emit($__ident, array $__arguments = [], array $__options = [])
		{
			$__options += ['return' => NULL];
			
			$h = &static::$__Core_Std_Exec___trait_ClassStatic_hook[$__ident];
			
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