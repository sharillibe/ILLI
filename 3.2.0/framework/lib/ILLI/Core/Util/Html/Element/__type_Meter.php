<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Meter EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST form		= 0x14;
		CONST high		= 0x15;
		CONST low		= 0x16;
		CONST max		= 0x17;
		CONST min		= 0x18;
		CONST optimum		= 0x19;
		CONST value		= 0x1A;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::form		=> __const_Type::SPL_STRING,
				self::high		=> [__const_Type::SPL_DOUBLE, __const_Type::SPL_LONG],
				self::low		=> [__const_Type::SPL_DOUBLE, __const_Type::SPL_LONG],
				self::max		=> [__const_Type::SPL_DOUBLE, __const_Type::SPL_LONG],
				self::min		=> [__const_Type::SPL_DOUBLE, __const_Type::SPL_LONG],
				self::optimum		=> [__const_Type::SPL_DOUBLE, __const_Type::SPL_LONG],
				self::value		=> [__const_Type::SPL_DOUBLE, __const_Type::SPL_LONG],
			]));
		}
		
		public function toArray()
		{
			if(NULL === $this->__data)
				return [];
				
			$_ = parent::toArray();
			
			foreach($this->getTupleGC() as $k => $GC)
			{
				if(NULL === ($v = $this->__data[$k]))
					continue;
				
				switch($k):
					case self::form:
						$_['form'] = $v;
						break;
					case self::high:
						$_['high'] = $v;
						break;
					case self::low:
						$_['low'] = $v;
						break;
					case self::max:
						$_['max'] = $v;
						break;
					case self::min:
						$_['min'] = $v;
						break;
					case self::optimum:
						$_['optimum'] = $v;
						break;
					case self::value:
						$_['value'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}