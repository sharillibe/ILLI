<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Exception;
	USE ILLI\Core\Std\Exec\__type_Signal;
	USE ILLI\Core\Std\Reflection\SplMethod;
	USE ILLI\Core\Std\Invoke;
	
	/**
	 * 		class Order { public function plist() {return 'list of ordered products.'; } }
	 * 		
	 * 		class Inventory
	 * 		{
	 * 			public function update		(Order $order)	{ return 'Inventory updated: '.$order->plist(); }
	 * 		}
	 * 		
	 *     		class Service
	 *     		{
	 *     			public function sendmail	(Order $order)	{ return 'receipt has been sent: '.$order->plist(); }
	 *     			public function updateSession	(Order $order)	{ return 'session has been saved: '.$order->plist(); }
	 *     		}
	 *     		
	 *     		class Dropshipper
	 *     		{
	 *     			public function notify		(Order $order)	{ return 'dropshipper notify: '.$order->plist(); }
	 *     		}
	 * 		
	 * 		class Manager
	 * 		{
	 * 			protected $__order = NULL;
	 * 			
	 * 			USE ILLI\Core\Std\Exec\__trait_SignalStatic
	 * 			{
	 * 				Core_Std_Exec___trait_SignalStatic_register as public regSignalStatic;
	 * 			}
	 * 			
	 * 			public function setOrder(Order $__Order)
	 * 			{
	 * 				static::Core_Std_Exec___trait_SignalStatic_emit(__METHOD__, 'init', [$__Order]);
	 * 				static::Core_Std_Exec___trait_SignalStatic_emit(__METHOD__, 'save', [$__Order]);
	 * 			}
	 * 			
	 * 			public function updateOrder(Order $__Order)
	 * 			{
	 * 				static::Core_Std_Exec___trait_SignalStatic_emit(__METHOD__, 'init', [$__Order]);
	 * 				static::Core_Std_Exec___trait_SignalStatic_emit(__METHOD__, 'save', [$__Order]);
	 * 			}
	 * 			
	 * 			public static function results()
	 * 			{
	 * 				return static::$__Core_Std_Exec___trait_SignalStatic_results;
	 * 			}
	 * 		}
	 * 		
	 * 		$Service	= new Service;
	 * 		$Inventory	= new Inventory;
	 * 		$Dropshipper	= new Dropshipper;
	 * 		
	 * 		
	 * 		Manager::regSignalStatic(new __type_Signal([
	 * 			__type_Signal::event	=> ['Manager::setOrder'], 	
	 * 			__type_Signal::slot	=> ['save'],
	 * 			__type_Signal::priority	=> 399.1,
	 * 			__type_Signal::hook	=> new ADVArrayCallable([[$Service, 'updateSession']])
	 * 		]));
	 * 		
	 * 		Manager::regSignalStatic(new __type_Signal([
	 * 			__type_Signal::event	=> ['Manager::setOrder', 'Manager::updateOrder'],	// multi event
	 * 			__type_Signal::slot	=> ['init'],						
	 * 			__type_Signal::priority	=> -722.7,
	 * 			__type_Signal::hook	=> new ADVArrayCallable([[$Inventory, 'update'], [$Service, 'sendMail']])
	 * 		]));
	 * 		
	 * 		Manager::regSignalStatic(new __type_Signal([
	 * 			__type_Signal::event	=> ['Manager::setOrder', 'Manager::updateOrder'],	// multi event
	 * 			__type_Signal::slot	=> ['init', 'save'],					// multi slot
	 * 			__type_Signal::priority	=> 800,
	 * 			__type_Signal::hook	=> new ADVArrayCallable([[$Dropshipper, 'notify']])
	 * 		]));
	 * 		
	 * 		
	 * 		Class Sub Extends Manager
	 * 		{
	 * 		}
	 * 		
	 * 		$Manager1	= new Manager;
	 * 		$Manager1->setOrder(new Order);
	 * 		
	 * 		$Manager2	= new Sub;
	 * 		$Manager2->updateOrder(new Order);
	 * 		
	 * 		var_dump(Manager::results());
	 * 
	 * 	result:
	 * 		array(2) {
	 * 		  ["Manager::setOrder"]=>
	 * 		  array(2) {
	 * 		    ["init"]=>
	 * 		    array(2) {
	 * 		      ["-722.7"]=>
	 * 		      array(2) {
	 * 		        [0]=>
	 * 		        string(44) "Inventory updated: list of ordered products."
	 * 		        [1]=>
	 * 		        string(48) "receipt has been sent: list of ordered products."
	 * 		      }
	 * 		      [800]=>
	 * 		      array(1) {
	 * 		        [0]=>
	 * 		        string(45) "dropshipper notify: list of ordered products."
	 * 		      }
	 * 		    }
	 * 		    ["save"]=>
	 * 		    array(2) {
	 * 		      ["399.1"]=>
	 * 		      array(1) {
	 * 		        [0]=>
	 * 		        string(49) "session has been saved: list of ordered products."
	 * 		      }
	 * 		      [800]=>
	 * 		      array(1) {
	 * 		        [0]=>
	 * 		        string(45) "dropshipper notify: list of ordered products."
	 * 		      }
	 * 		    }
	 * 		  }
	 * 		  ["Manager::updateOrder"]=>
	 * 		  array(2) {
	 * 		    ["init"]=>
	 * 		    array(2) {
	 * 		      ["-722.7"]=>
	 * 		      array(2) {
	 * 		        [0]=>
	 * 		        string(44) "Inventory updated: list of ordered products."
	 * 		        [1]=>
	 * 		        string(48) "receipt has been sent: list of ordered products."
	 * 		      }
	 * 		      [800]=>
	 * 		      array(1) {
	 * 		        [0]=>
	 * 		        string(45) "dropshipper notify: list of ordered products."
	 * 		      }
	 * 		    }
	 * 		    ["save"]=>
	 * 		    array(1) {
	 * 		      [800]=>
	 * 		      array(1) {
	 * 		        [0]=>
	 * 		        string(45) "dropshipper notify: list of ordered products."
	 * 		      }
	 * 		    }
	 * 		  }
	 * 		}
	 *
	 * @todo eventname: __METHOD__ -> get_called_class() -> __FUNCTION__
	 */
	TRAIT __trait_SignalStatic
	{
		protected static $__Core_Std_Exec___trait_SignalStatic_hook		= [];
		protected static $__Core_Std_Exec___trait_SignalStatic_results		= [];
		
		protected static function Core_Std_Exec___trait_SignalStatic_register(__type_Signal $__Signal)
		{
			static::$__Core_Std_Exec___trait_SignalStatic_hook[] = $__Signal;
		}
		
		protected static function Core_Std_Exec___trait_SignalStatic_emit($__eventName, $__slotName, array $__arguments = [], array $__options = [])
		{
			$run = [];
			
			foreach(static::$__Core_Std_Exec___trait_SignalStatic_hook as $t)
				foreach((array) $t->get()[__type_Signal::event] as $event)
					foreach((array) $t->get()[__type_Signal::slot] as $slot)
						if($slot === $__slotName && $event === $__eventName)
							#! strval @see https://bugs.php.net/bug.php?id=32671
							$run[strval($t->get()[__type_Signal::priority])][] = $t;
			
			ksort($run);
			
			foreach($run as $offset => $hook)
				foreach($hook as $signal)
					try
					{
						$r = Invoke::emitMethod($signal, 'emit', $__arguments);
						if(TRUE === $signal->get()[__type_Signal::collect])
							static::$__Core_Std_Exec___trait_SignalStatic_results[$__eventName][$__slotName][$offset] = $r;
					}
					catch(\Exception $E)
					{
						throw new Exception('Invokation Error', $E);
					}
		}
	}