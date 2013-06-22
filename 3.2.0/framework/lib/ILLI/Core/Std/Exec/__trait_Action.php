<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Exception;
	USE ILLI\Core\Std\Exec\__type_Action;
	USE ILLI\Core\Std\Reflection\SplMethod;
	USE ILLI\Core\Std\Invoke;
	
	/**
	 * Virtual Action. Typically implemented by ::__construct() or __destruct()
	 *
	 * <code>
	 * 	class b
	 * 	{
	 * 		use ILLI\Core\Std\Exec\__trait_Action
	 * 		{
	 * 			Core_Std_Exec___trait_Action_register as public regAction;
	 * 			Core_Std_Exec___trait_Action_emit as public emitAction;
	 * 		}
	 * 	}
	 * 	
	 * 	$b = new b;
	 * 	
	 * 	$b->regAction(new __type_Action([
	 * 		__type_Action::event	=> 'bob',
	 * 		__type_Action::handle	=> function()
	 * 		{
	 * 			var_dump('foo');
	 * 		},
	 * 	]));
	 * 	
	 * 	$b->regAction(new __type_Action([
	 * 		__type_Action::event	=> 'bob',
	 * 		__type_Action::priority	=> 10,
	 * 		__type_Action::handle	=> function()
	 * 		{
	 * 			var_dump('fogbgbo');
	 * 		},
	 * 	]));
	 * 	
	 * 	$b->emitAction('bob');
	 * 	var_dump($b);
 	 * </code>
	 * <code>
 	 * string(7) "fogbgbo"
	 * string(3) "foo"
	 * object(b)#1 (1) {
	 *   ["__Core_Std_Exec___trait_Action_hook":protected]=>
	 *   array(0) {
	 *   }
	 * }
 	 * </code>
 	 */
	TRAIT __trait_Action
	{
		protected $__Core_Std_Exec___trait_Action_hook = [];
		
		protected function Core_Std_Exec___trait_Action_register(__type_Action $__Action)
		{
			$h =& $this->__Core_Std_Exec___trait_Action_hook[$__Action->get()[__type_Action::event]];
			$h[$__Action->get()[__type_Action::priority]][] = $__Action;
			
			ksort($h);
			
			return $this;
		}
		
		protected function Core_Std_Exec___trait_Action_emit($__eventName, array $__arguments = [], array $__options = [])
		{
			$h = &$this->__Core_Std_Exec___trait_Action_hook[$__eventName];
			
			if(TRUE === isset($h))
				try
				{
					foreach($h as $p => $s)
						foreach($s as $c)
						{
							Invoke::emitMethod($c, 'emit', $__arguments);
							$c->get()[__type_Action::enabled] = FALSE;
						}
					
					unset($this->__Core_Std_Exec___trait_Action_hook[$__eventName]);
				}
				catch(\Exception $E)
				{
					throw new Exception('Invokation Error', $E);
				}
		}
	}