<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADVResult;
	USE ILLI\Core\Std\Exception;
	
	CLASS __type_Delegate EXTENDS \ILLI\Core\Std\Def\ADVTuple IMPLEMENTS \ILLI\Core\Std\IEmitable
	{
		CONST enabled		= 0x00;
		CONST origin		= 0x01;
		CONST handle		= 0x02;
		CONST arguments		= 0x03;
		CONST lockArguments	= 0x04;
		
		protected $__tR	= [];
		
		public function __construct(array $__setup = [], $__eR = [])
		{
			$this->__tR = (array) $__eR;
			
			parent::__construct
			(
				[
					self::enabled		=> [__const_Type::SPL_BOOLEAN],
					self::origin		=> [__const_Type::SPL_STRING],
					self::handle		=> [__const_Type::SPL_METHOD, __const_Type::SPL_CLOSURE],
					self::arguments		=> [__const_Type::SPL_ARRAY],
					self::lockArguments	=> [__const_Type::SPL_BOOLEAN]
				],
				parent::mergeOffsetValues($__setup, [
					self::enabled		=> TRUE,
					self::arguments		=> [],
					self::lockArguments	=> FALSE
				])
			);
		}
		
		public function emit()
		{
			if(FALSE === $this->get()[self::enabled])
				return NULL;
			
			$f = $this->get()[self::handle];
			$a = $this->get()[self::arguments];
			$r = NULL;
				
			if(FALSE === $this->get()[self::lockArguments])
			{
				$d = func_get_args();
				foreach($d as $i => &$v)
					$a[$i] = &$v;
			}
			
			try
			{
				switch(TRUE):
					case $this->isVal(self::handle, __const_Type::SPL_CLOSURE):
						$r = Invoke::emitInvokable($f, $a);
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