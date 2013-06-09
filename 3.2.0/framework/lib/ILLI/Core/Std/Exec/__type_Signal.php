<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADVArrayCallable;
	USE ILLI\Core\Std\Exception;
	
	CLASS __type_Signal EXTENDS \ILLI\Core\Std\Def\ADVTuple
	{
		CONST enabled		= 0x00;
		CONST slot		= 0x01;
		CONST index		= 0x02;
		CONST hook		= 0x03;
		CONST collect		= 0x04;
		
		protected $__results	= [];
		
		public function __construct(array $__setup = [])
		{
			parent::__construct
			(
				[
					self::enabled	=> [__const_Type::SPL_BOOLEAN],
					self::slot	=> [__const_Type::SPL_STRING],
					self::index	=> [__const_Type::SPL_NULL, __const_Type::SPL_DOUBLE, __const_Type::SPL_LONG],
					self::hook	=> ['ILLI\Core\Std\Def\ADVArrayCallable'],
					self::collect	=> [__const_Type::SPL_BOOLEAN]
				],
				parent::mergeOffsetValues($__setup, [
					self::enabled	=> TRUE,
					self::collect	=> TRUE,
					self::hook	=> new ADVArrayCallable
				])
			);
		}
		
		public function __invoke()
		{
			if(FALSE === $this->get()[self::enabled])
				return NULL;
			
			$f = $this->get()[self::hook];
			$a = func_get_args();
			$r = NULL;
			
			$s = $this->get()[self::collect];
			
			$r = [];
			
			foreach($f->get() as $k => $o)
			{
				try
				{
					switch(TRUE):
						case $f->isVal(__const_Type::SPL_CLOSURE, $o):
							$r[$k] = Invoke::emitCallable($o, $a);
							break;
						case $f->isVal(__const_Type::SPL_FUNCTION, $o):
							$r[$k] = Invoke::emitFunction($o, $a);
							break;
						case $f->isVal(__const_Type::SPL_METHOD, $o):
							$r[$k] = Invoke::emit($o[0], $o[1], $a);
							break;
					endswitch;
				}
				catch(\Exception $E)
				{
					throw new Exception($E, 'Invocation error.');
				}
			}
			
			if(TRUE === $s)
				return $this->__results = $r;
		}
	}