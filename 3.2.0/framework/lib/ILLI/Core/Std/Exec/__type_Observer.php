<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADVArrayCallable;
	USE ILLI\Core\Std\Exception;
	
	CLASS __type_Observer EXTENDS \ILLI\Core\Std\Def\ADVTuple
	{
		CONST enabled		= 0x00;
		CONST event		= 0x01;
		CONST hook		= 0x02;
		
		public function __construct(array $__setup = [])
		{
			parent::__construct
			(
				[
					self::enabled	=> [__const_Type::SPL_BOOLEAN],
					self::event	=> [__const_Type::SPL_STRING, __const_Type::SPL_ARRAY],
					self::hook	=> ['ILLI\Core\Std\Def\ADVArrayCallable']
				],
				parent::mergeOffsetValues($__setup, [
					self::enabled	=> TRUE,
					self::hook	=> new ADVArrayCallable
				])
			);
		}
		
		public function emit()
		{
			if(FALSE === $this->get()[self::enabled])
				return NULL;
			
			$f = $this->get()[self::hook];
			$a = func_get_args();
			$r = NULL;
			
			foreach($f->get() as $o)
			{
				try
				{
					switch(TRUE):
						case $f->isVal(__const_Type::SPL_CLOSURE, $o):
							Invoke::emitInvokable($o, $a);
							break;
						case $f->isVal(__const_Type::SPL_FUNCTION, $o):
							Invoke::emitFunction($o, $a);
							break;
						case $f->isVal(__const_Type::SPL_METHOD, $o):
							Invoke::emit($o[0], $o[1], $a);
							break;
					endswitch;
				}
				catch(\Exception $E)
				{
					throw new Exception($E, 'Invocation error.');
				}
			}
		}
	}