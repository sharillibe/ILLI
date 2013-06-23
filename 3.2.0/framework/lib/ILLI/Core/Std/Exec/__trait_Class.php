<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Exception;
	USE ILLI\Core\Std\Exec\__type_Class;
	USE ILLI\Core\Std\Reflection\SplMethod;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Util\String;
	
	/**
	 * Virtual Class Delegate.
	 *
	 * <code>
	 * </code>
	 */
	TRAIT __trait_Class
	{
		protected $__Core_Std_Exec___trait_Class_hook = [];
		
		protected function Core_Std_Exec___trait_Class_register(__type_Class $__Class)
		{
			$ident = NULL === $__Class->get()[__type_Class::identifier]
				? $__Class->get()[__type_Class::origin]
				: $__Class->get()[__type_Class::identifier];
			
			$this->__Core_Std_Exec___trait_Class_hook[$__Class->get()[$ident]] = $__Class;
			return $this;
		}
		
		protected function Core_Std_Exec___trait_Class_exists($__ident)
		{
			$h = &$this->__Core_Std_Exec___trait_Class_hook[$__ident];
			return TRUE === isset($h) && NULL !== $h->get()[__type_Class::handle] && NULL !== $h->get()[__type_Class::origin];
		}
		
		protected static function Core_Std_Exec___trait_Class_handle($__ident, $__handleClassName)
		{
			$h = &$this->__Core_Std_Exec___trait_Class_hook[$__ident];
			if(FALSE === isset($h))
				return $this;
			
			$h->get()[__type_Class::handle] = $__handleClassName;
			return $this;
		}
		
		protected function Core_Std_Exec___trait_Class_emit($__ident, array $__arguments = [], array $__options = [])
		{
			$__options += ['return' => NULL];
			
			$h = &$this->__Core_Std_Exec___trait_Class_hook[$__ident];
			
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