<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Exception;
	USE ILLI\Core\Std\Exec\__type_Observer;
	USE ILLI\Core\Std\Reflection\SplMethod;
	USE ILLI\Core\Std\Invoke;

	/**
	 * 		class bar
	 * 		{
	 * 			USE ILLI\Core\Std\Exec\__trait_Observer
	 * 			{
	 * 				Core_Std_Exec___trait_Observer_register as public regObserver;
	 * 			}
	 * 			
	 * 			function hello($__name)
	 * 			{
	 * 				$this->Core_Std_Exec___trait_Observer_emit(__METHOD__, func_get_args());
	 * 			}
	 * 			
	 * 			function bye($__name)
	 * 			{
	 * 				$this->Core_Std_Exec___trait_Observer_emit(__METHOD__, func_get_args());
	 * 			}
	 * 		}
	 * 		
	 * 		class foo EXTENDS bar
	 * 		{
	 * 		}
	 * 		
	 * 		$t = new bar;
	 * 		
	 * 		$t->regObserver(new __type_Observer([
	 * 			__type_Observer::hook => new ADVArrayCallable([
	 * 				function($f) { print '->called 1 '.$f.PHP_EOL; },
	 * 				function($f) { print '->called 2 '.$f.PHP_EOL; },
	 * 			]),
	 * 			__type_Observer::event => 'bar::hello',
	 * 		]));
	 * 		
	 * 		$t->hello('bob');	// ->called 1 bob
	 * 					// ->called 2 bob
	 * 		
	 * 		$second = new __type_Observer([
	 * 			__type_Observer::hook => new ADVArrayCallable([
	 * 				function($f) { print '->called 3 '.$f.PHP_EOL; },
	 * 				function($f) { print '->called 4 '.$f.PHP_EOL; },
	 * 			]),
	 * 			__type_Observer::event => ['bar::hello', 'bar::bye'],
	 * 		]);
	 * 		
	 * 		$t->regObserver($second);
	 * 		
	 * 		$t->regObserver(new __type_Observer([
	 * 			__type_Observer::hook => new ADVArrayCallable([
	 * 				function($f) { print '->called A '.$f.PHP_EOL; },
	 * 				function($f) { print '->called B '.$f.PHP_EOL; },
	 * 			]),
	 * 			__type_Observer::event => ['bar::hello', 'bar::bye'],
	 * 		]));
	 * 		
	 * 		$t->hello('foobar');	// ->called 1 foobar
	 * 					// ->called 2 foobar
	 * 					// ->called 3 foobar
	 * 					// ->called 4 foobar
	 * 					// ->called A foobar
	 * 					// ->called B foobar
	 * 				
	 * 		$t->bye('alice');	// ->called 3 alice
	 * 					// ->called 4 alice
	 * 					// ->called A alice
	 * 					// ->called B alice
	 * 		
	 * 		$second->enabled = false;
	 *	
	 *		$t->hello('bar');	// ->called 1 bar
	 *					// ->called 2 bar
	 *					// ->called A bar
	 *					// ->called B bar
	 * 		
	 * 		$t->bye('baz');		// ->called A baz
	 * 					// ->called B baz
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