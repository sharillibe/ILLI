<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADVResult;
	USE ILLI\Core\Std\Exception;
	
	/**	
	 * 		class bar
	 * 		{
	 * 			USE ILLI\Core\Std\Exec\__trait_Call
	 * 			{
	 * 				Core_Std_Exec___trait_Call_register as public regCall;
	 * 			}
	 * 			
	 * 			function __call($__name, $__arguments)
	 * 			{
	 * 				return $this->Core_Std_Exec___trait_Call_emit($__name, $__arguments);
	 * 			}
	 * 		}
	 *
	 * 		print (new bar)->regCall(new __type_Call([__const_Type::SPL_STRING], [
	 * 			__type_Call::handle => function($f) { return 'called foo, '.$f; },
	 * 			__type_Call::name => 'foo'
	 * 		]))->foo('bar'); // called foo, bar
	 *
	 *		~~
	 *
	 *		print PHP_EOL;
	 *		$f = new __type_Call([__const_Type::SPL_STRING], [__type_Call::name => 'baz']);
	 *		$t = (new bar)->regCall($f);
	 *
	 *		$f->handle = function($f) { return 1; }; // note: return value is of type long
	 *		print $t->baz('baz'); // error: result is not a string
	 */
	CLASS __type_Call EXTENDS \ILLI\Core\Std\Def\ADVTuple IMPLEMENTS \ILLI\Core\Std\IEmitable
	{
		CONST enabled		= 0x00;
		CONST name		= 0x01;
		CONST handle		= 0x02;
		CONST arguments		= 0x03;
		
		protected $__tR	= [];
		
		public function __construct(array $__setup = [], $__eR = [])
		{
			$this->__tR = (array) $__eR;
			parent::__construct
			(
				[
					self::enabled		=> [__const_Type::SPL_BOOLEAN],
					self::name		=> [__const_Type::SPL_STRING],
					self::handle		=> [__const_Type::SPL_CLOSURE, __const_Type::SPL_FUNCTION, __const_Type::SPL_METHOD],
					self::arguments		=> [__const_Type::SPL_ARRAY]
				],
				parent::mergeOffsetValues($__setup, [
					self::enabled		=> TRUE,
					self::arguments		=> []
				])
			);
		}
		
		public function emit()
		{
			if(FALSE === $this->get()[self::enabled])
				return NULL;
			
			$f = $this->get()[self::handle];
			$a = $this->get()[self::arguments];
			$d = func_get_args();
			$r = NULL;
			
			foreach($d as $i => &$v)
				$a[$i] = &$v;
			
			try
			{
				switch(TRUE):
					case $this->isVal(self::handle, __const_Type::SPL_CLOSURE):
						$r = Invoke::emitInvokable($f, $a);
						break;
					case $this->isVal(self::handle, __const_Type::SPL_FUNCTION):
						$r = Invoke::emitFunction($f, $a);
						break;
					case $this->isVal(self::handle, __const_Type::SPL_METHOD):
						$r = Invoke::emit($f[0], $f[1], $a);
						break;
				endswitch;
			}
			catch(\Exception $E)
			{
				throw new Exception($E, 'Invocation error.');
			}
			
			if([] !== $this->__tR)
			{
				try
				{
					$R = TRUE === $this->__tR instanceOf ADVResult ? $this->__tR : new ADVResult($this->__tR);
				}
				catch(\Exception $E)
				{
					throw new Exception($E, 'Error in Result Setup.');
				}
				
				try
				{
					$R->set($r);
				}
				catch(\Exception $E)
				{
					throw new Exception($E, 'Error validate result.');
				}
			}
			
			return $r;
		}
	}