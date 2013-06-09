<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADVResult;
	USE ILLI\Core\Std\Exception;
	
	CLASS __type_Delegate EXTENDS \ILLI\Core\Std\Def\ADVTuple
	{
		CONST enabled		= 0x00;
		CONST origin		= 0x01;
		CONST handle		= 0x02;
		
		protected $__tR	= [];
		
		public function __construct($__eR = [], array $__setup = [])
		{
			$this->__tR = (array) $__eR;
			parent::__construct
			(
				[
					self::enabled	=> [__const_Type::SPL_BOOLEAN],
					self::origin	=>
					[
						__const_Type::SPL_FUNCTION,
						__const_Type::SPL_METHOD,
						__const_Type::SPL_CLASS
					],
					self::handle	=>
					[
						__const_Type::SPL_CLOSURE,
						__const_Type::SPL_FUNCTION,
						__const_Type::SPL_METHOD,
						__const_Type::SPL_CLASS
					]
				],
				parent::mergeOffsetValues($__setup, [
					self::enabled	=> TRUE
				])
			);
		}
		
		public function __invoke()
		{
			if(FALSE === $this->get()[self::enabled])
				return NULL;
			
			if(FALSE === $this->get()[self::enabled])
				return NULL;
			
			$i = self::handle;
			$f = $this->get()[$i];
			
			if(NULL === $f)
			{
				$i = self::origin;
				$f = $this->get()[$i];
			}
				
			$a = func_get_args();
			$r = NULL;
			
			try
			{
				switch(TRUE):
					case $this->isVal($i, __const_Type::SPL_CLOSURE):
						$r = Invoke::emitCallable($f, $a);
						break;
					case $this->isVal($i, __const_Type::SPL_CLASS):
						$r = Invoke::emitClass($f, $a);
						break;
					case $this->isVal($i, __const_Type::SPL_FUNCTION):
						$r = Invoke::emitFunction($f, $a);
						break;
					case $this->isVal($i, __const_Type::SPL_METHOD):
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