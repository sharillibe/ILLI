<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Exception;
	USE ILLI\Core\Std\Exec\__type_Call;
	USE ILLI\Core\Std\Reflection\SplMethod;
	USE ILLI\Core\Std\Invoke;
	
	/**
	 * Virtual Method. Typically implemented by ::__call()
	 *
	 * <code>
	 * class bar
	 * {
	 * 	USE ILLI\Core\Std\Exec\__trait_Call
	 * 	{
	 * 		Core_Std_Exec___trait_Call_register as public regCall;
	 * 	}
	 * 			
	 * 	function __call($__name, $__arguments)
	 * 	{
	 * 		return $this->Core_Std_Exec___trait_Call_emit($__name, $__arguments);
	 * 	}
	 * }
	 * 		
	 * class foo EXTENDS bar
	 * {
	 * }
	 * 		
	 * $t = (new bar)->regCall(new __type_Call([__const_Type::SPL_STRING], [
	 * 	__type_Call::handle => function($f) { return '->called '.$f; },
	 * 	__type_Call::name => 'virt',
	 * ]));
	 * 		
	 * print $t->virt('bar'); // called bar
	 * </code>
	 */
	TRAIT __trait_Call
	{
		protected $__Core_Std_Exec___trait_Call_hook = [];
		
		protected function Core_Std_Exec___trait_Call_register(__type_Call $__Call)
		{
			$this->__Core_Std_Exec___trait_Call_hook[$__Call->get()[__type_Call::name]] = $__Call;
			return $this;
		}
		
		protected function Core_Std_Exec___trait_Call_emit($__functionName, array $__arguments = [], array $__options = [])
		{
			$__options += ['return' => NULL];
			
			$h = &$this->__Core_Std_Exec___trait_Call_hook[$__functionName];
			
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