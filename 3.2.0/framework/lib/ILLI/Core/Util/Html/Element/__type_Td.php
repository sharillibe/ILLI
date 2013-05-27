<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Td EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST colspan		= 0x14;
		CONST headers		= 0x15;
		CONST rowspan		= 0x16;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::colspan		=> __const_Type::SPL_LONG,
				self::headers		=> [__const_Type::SPL_STRING, __const_Type::SPL_ARRAY],
				self::rowspan		=> __const_Type::SPL_LONG
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
					case self::colspan:
						$_['colspan'] = $v;
						break;
					case self::headers:
						$_['headers'] = TRUE === is_array($v) ? implode(',', $v) : $v;
						break;
					case self::rowspan:
						$_['rowspan'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}