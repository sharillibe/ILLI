<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADVArrayCallable;
	USE ILLI\Core\Std\Exception;
	
	CLASS __type_Signal EXTENDS \ILLI\Core\Std\Def\ADVTuple IMPLEMENTS \ILLI\Core\Std\IEmitable
	{
		CONST enabled		= 0x00;
		CONST event		= 0x01;
		CONST slot		= 0x02;
		CONST priority		= 0x03;
		CONST hook		= 0x04;
		CONST collect		= 0x05;
		CONST arguments		= 0x06;
		CONST lockArguments	= 0x07;
		
		protected $__results	= [];
		
		public function __construct(array $__setup = [])
		{
			parent::__construct
			(
				[
					self::enabled		=> [__const_Type::SPL_BOOLEAN],
					self::event		=> [__const_Type::SPL_STRING, __const_Type::SPL_ARRAY],
					self::slot		=> [__const_Type::SPL_STRING, __const_Type::SPL_ARRAY],
					self::priority		=> [__const_Type::SPL_DOUBLE, __const_Type::SPL_LONG, __const_Type::SPL_NULL],
					self::hook		=> ['ILLI\Core\Std\Def\ADVArrayCallable'],
					self::collect		=> [__const_Type::SPL_BOOLEAN],
					self::arguments		=> [__const_Type::SPL_ARRAY],
					self::lockArguments	=> [__const_Type::SPL_BOOLEAN]
				],
				parent::mergeOffsetValues($__setup, [
					self::enabled		=> TRUE,
					self::collect		=> TRUE,
					self::hook		=> new ADVArrayCallable,
					self::arguments		=> [],
					self::lockArguments	=> FALSE
				])
			);
		}
		
		public function emit()
		{
			if(FALSE === $this->get()[self::enabled])
				return NULL;
			
			$f = $this->get()[self::hook];
			$a = $this->get()[self::arguments];
			$s = $this->get()[self::collect];
			$r = [];
			
			if(FALSE === $this->get()[self::lockArguments])
			{
				$d = func_get_args();
				foreach($d as $i => &$v)
					$a[$i] = &$v;
			}
			
			foreach($f->get() as $k => $o)
			{
				try
				{
					switch(TRUE):
						case $f->isVal(__const_Type::SPL_CLOSURE, $o):
							$r[$k] = Invoke::emitInvokable($o, $a);
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