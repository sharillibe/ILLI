<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADVResult;
	USE ILLI\Core\Std\Exception;
	
	CLASS __type_Filter EXTENDS \ILLI\Core\Std\Def\ADVTuple
	{
		CONST enabled		= 0x00;
		CONST name		= 0x01;
		CONST event		= 0x02;
		CONST priority		= 0x03;
		CONST argsNum		= 0x04;
		CONST handle		= 0x05;
		
		protected $__tR	= [];
		
		public function __construct($__eR = [], array $__setup = [])
		{
			$this->__tR = (array) $__eR;
			parent::__construct
			(
				[
					self::enabled	=> [__const_Type::SPL_BOOLEAN],
					self::name	=> [__const_Type::SPL_BOOLEAN],
					self::event	=> [__const_Type::SPL_BOOLEAN],
					self::priority	=> [__const_Type::SPL_LONG],
					self::argsNum	=> [__const_Type::SPL_LONG],
					self::handle	=>
					[
						__const_Type::SPL_CLOSURE,
						__const_Type::SPL_FUNCTION,
						__const_Type::SPL_METHOD
					]
				],
				parent::mergeOffsetValues($__setup, [
					self::enabled	=> TRUE,
					self::priority	=> 100,
					self::argsNum	=> 1,
				])
			);
		}
		
		public function emit()
		{
			if(FALSE === $this->get()[self::enabled])
				return NULL;
			
			$f = $this->get()[self::handle];
			$a = func_get_args();
			$r = NULL;
			
			try
			{	
				switch(TRUE):
					case $this->isVal(self::handle, __const_Type::SPL_CLOSURE):
						$r = Invoke::emitCallable($f, $a);
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