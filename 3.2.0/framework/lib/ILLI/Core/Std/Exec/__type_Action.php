<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADVResult;
	USE ILLI\Core\Std\Exception;
	
	CLASS __type_Action EXTENDS \ILLI\Core\Std\Def\ADVTuple IMPLEMENTS \ILLI\Core\Std\IEmitable
	{
		CONST enabled		= 0x00;
		CONST event		= 0x01;
		CONST priority		= 0x02;
		CONST argsNum		= 0x03;
		CONST handle		= 0x04;
		CONST arguments		= 0x05;
		
		public function __construct(array $__setup = [])
		{
			parent::__construct
			(
				[
					self::enabled		=> [__const_Type::SPL_BOOLEAN],
					self::event		=> [__const_Type::SPL_STRING],
					self::priority		=> [__const_Type::SPL_LONG],
					self::argsNum		=> [__const_Type::SPL_LONG],
					self::handle		=> [__const_Type::SPL_CLOSURE, __const_Type::SPL_FUNCTION, __const_Type::SPL_METHOD],
					self::arguments		=> [__const_Type::SPL_ARRAY]
				],
				parent::mergeOffsetValues($__setup, [
					self::enabled		=> TRUE,
					self::priority		=> 100,
					self::argsNum		=> 1,
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
			
			foreach($d as $i => &$v)
				$a[$i] = &$v;
			
			try
			{
				switch(TRUE):
					case $this->isVal(self::handle, __const_Type::SPL_CLOSURE):
						Invoke::emitInvokable($f, $a);
						break;
					case $this->isVal(self::handle, __const_Type::SPL_FUNCTION):
						Invoke::emitFunction($f, $a);
						break;
					case $this->isVal(self::handle, __const_Type::SPL_METHOD):
						Invoke::emit($f[0], $f[1], $a);
						break;
				endswitch;
				
				unset($this->get()[self::handle]);
			}
			catch(\Exception $E)
			{
				throw new Exception($E, 'Invocation error.');
			}
		}
	}