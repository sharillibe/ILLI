<?PHP
	NAMESPACE ILLI\Core\Std\Exec;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADVResult;
	USE ILLI\Core\Std\Exception;
	
	CLASS __type_Class EXTENDS \ILLI\Core\Std\Def\ADVTuple IMPLEMENTS \ILLI\Core\Std\IEmitable
	{
		CONST enabled		= 0x00;
		CONST identifier	= 0x01;
		CONST origin		= 0x02;
		CONST handle		= 0x03;
		CONST arguments		= 0x04;
		
		public function __construct(array $__setup = [])
		{
			parent::__construct
			(
				[
					self::enabled		=> [__const_Type::SPL_BOOLEAN],
					self::identifier	=> [__const_Type::SPL_CLASS, __const_Type::SPL_STRING, __const_Type::SPL_INTERFACE],
					self::origin		=> [__const_Type::SPL_CLASS],
					self::handle		=> [__const_Type::SPL_CLASS],
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
			
			$f = $this->get()[$o = self::handle];
			
			NULL !== $f ?: $f = $this->get()[$o = self::origin];
			
			$a = $this->get()[self::arguments];
			$d = func_get_args();
			$r = NULL;
			
			foreach($d as $i => &$v)
				$a[$i] = &$v;
			
			try
			{
				switch(TRUE):
					case $this->isVal($o, __const_Type::SPL_CLASS):
						$r = Invoke::emitClass($f, $a);
						break;
				endswitch;
			}
			catch(\Exception $E)
			{
				throw new Exception($E, 'Invocation error.');
			}
			
			return $r;
		}
	}