<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Exception;
	USE ILLI\Core\Std\Exec\__type_Delegate;
	USE ILLI\Core\Std\Reflection\SplMethod;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Util\String;
	
	/**
	 * Virtual Method Delegate.
	 *
	 * <code>
	 * class smurf
	 * {
	 * 	USE ILLI\Core\Std\Exec\__trait_Delegate
	 * 	{
	 * 		Core_Std_Exec___trait_Delegate_register as public regDelegate;
	 * 	}
	 * 	
	 * 	function name()
	 * 	{
	 * 		if(TRUE === $this->Core_Std_Exec___trait_Delegate_exists(__FUNCTION__))
	 * 			return $this->Core_Std_Exec___trait_Delegate_emit(__FUNCTION__);
	 * 			
	 * 		return 'Farmer';
	 * 	}
	 * }
	 * 
	 * $Smurf = new smurf;
	 * 
	 * var_dump($Smurf->name()); // Farmer
	 * 
	 * $Smurf->regDelegate(new __type_Delegate([
	 * 	__type_Delegate::origin	=> 'name',
	 * 	__type_Delegate::handle	=> function() { return 'Snappy'; }
	 * ]));
	 * 
	 * var_dump($Smurf->name()); // Snappy
	 * 
	 * class moo { static function baz() { return 'Dopey'; }}
	 * 
	 * $Smurf->regDelegate(new __type_Delegate([
	 * 	__type_Delegate::origin	=> 'name',
	 * 	__type_Delegate::handle	=> ['moo', 'baz']
	 * ]));
	 * 
	 * var_dump($Smurf->name()); // Dopey
	 * </code>
	 */
	TRAIT __trait_Delegate
	{
		protected $__Core_Std_Exec___trait_Delegate_hook = [];
		
		protected function Core_Std_Exec___trait_Delegate_register(__type_Delegate $__Delegate)
		{
			$this->__Core_Std_Exec___trait_Delegate_hook[$__Delegate->get()[__type_Delegate::origin]] = $__Delegate;
			return $this;
		}
		
		protected function Core_Std_Exec___trait_Delegate_exists($__origin)
		{
			$h = &$this->__Core_Std_Exec___trait_Delegate_hook[$__origin];
			return TRUE === isset($h) && NULL !== $h->get()[__type_Delegate::handle];
		}
		
		protected function Core_Std_Exec___trait_Delegate_emit($__origin, array $__arguments = [], array $__options = [])
		{
			$__options += ['return' => NULL];
			
			$h = &$this->__Core_Std_Exec___trait_Delegate_hook[$__origin];
			
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