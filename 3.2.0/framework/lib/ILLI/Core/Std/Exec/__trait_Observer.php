<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Exception;
	USE ILLI\Core\Std\Exec\__type_Observer;
	USE ILLI\Core\Std\Reflection\SplMethod;
	USE ILLI\Core\Std\Invoke;

	/**
	 * 		class bar
	 * 		{
	 * 			USE ILLI\Core\Std\Exec\__trait_Observer
	 * 			{
	 * 				Core_Std_Exec___trait_Observer_register as public reg;
	 * 			}
	 * 			
	 * 			function hello($__name)
	 * 			{
	 * 				var_dump(__METHOD__);
	 * 				$this->Core_Std_Exec___trait_Observer_emit(__METHOD__, [$__name]);
	 * 				return $this;
	 * 			}
	 * 			
	 * 			function bye($__name)
	 * 			{
	 * 				var_dump(__METHOD__);
	 * 				$this->Core_Std_Exec___trait_Observer_emit(__METHOD__, [$__name]);
	 * 				return $this;
	 * 			}
	 * 		}
	 * 	
	 * 		$a = new __type_Observer([
	 * 			__type_Observer::hook => new ADVArrayCallable(
	 * 			[
	 * 				function($f) { var_dump('Hello '.$f); },
	 * 				function($f) { var_dump('Hi '.$f); }
	 * 			]),
	 * 			__type_Observer::event => 'bar::hello'
	 * 		]);
	 * 		
	 * 		$b = new __type_Observer([
	 * 			__type_Observer::hook => new ADVArrayCallable(
	 * 			[
	 * 				function($f) { var_dump('Wooooooooooooooorld of '.$f); }
	 * 			]),
	 * 			__type_Observer::event => ['bar::hello', 'bar::bye']
	 * 		]);
	 * 		
	 * 		$c = new __type_Observer;
	 * 		$c->hook[] = function($f) { var_dump('kind regards '.$f); };
	 * 		$c->hook[] = function($f) { var_dump('bye '.$f); };
	 * 		$c->event = 'bar::bye';
	 * 		
	 * 		(new bar)
	 * 			->reg($a)
	 * 			->reg($b)
	 * 			->reg($c)
	 * 			->hello('icro')
	 * 			->bye('icro');
	 * 			
	 * 		(new bar)->hello('foo')->bye('foo');
	 * 
	 * 
	 * 		string(10) "bar::hello"
	 * 		string(10) "Hello icro"
	 * 		string(7) "Hi icro"
	 * 		string(27) "Wooooooooooooooorld of icro"
	 * 		string(8) "bar::bye"
	 * 		string(27) "Wooooooooooooooorld of icro"
	 * 		string(17) "kind regards icro"
	 * 		string(8) "bye icro"
	 * 		string(10) "bar::hello"
	 * 		string(8) "bar::bye"
	 */
	TRAIT __trait_Observer
	{
		protected $__Core_Std_Exec___trait_Observer_hook = [];
		
		protected function Core_Std_Exec___trait_Observer_register(__type_Observer $__Observer)
		{
			$this->__Core_Std_Exec___trait_Observer_hook[] = $__Observer;
			return $this;
		}
		
		protected function Core_Std_Exec___trait_Observer_emit($__eventName, array $__arguments = [], array $__options = [])
		{
			foreach($this->__Core_Std_Exec___trait_Observer_hook as $t)
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