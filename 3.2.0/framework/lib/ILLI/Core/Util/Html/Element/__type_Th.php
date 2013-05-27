<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Th EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST abbr		= 0x14;
		CONST axis		= 0x15;
		CONST colspan		= 0x16;
		CONST headers		= 0x17;
		CONST rowspan		= 0x18;
		CONST scope		= 0x19;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::abbr		=> __const_Type::SPL_STRING,
				self::axis		=> [__const_Type::SPL_STRING, __const_Type::SPL_ARRAY],
				self::colspan		=> __const_Type::SPL_LONG,
				self::headers		=> [__const_Type::SPL_STRING, __const_Type::SPL_ARRAY],
				self::rowspan		=> __const_Type::SPL_LONG,
				self::scope		=> __const_Type::SPL_STRING // enum: row, col, rowgroup, colgroup, auto
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
					case self::abbr:
						$_['abbr'] = $v;
						break;
					case self::axis:
						$_['axis'] = TRUE === is_array($v) ? implode(' ', $v) : $v;
						break;
					case self::colspan:
						$_['colspan'] = $v;
						break;
					case self::headers:
						$_['headers'] = TRUE === is_array($v) ? implode(',', $v) : $v;
						break;
					case self::rowspan:
						$_['rowspan'] = $v;
						break;
					case self::scope:
						if(FALSE === in_array($v, ['row', 'col', 'rowgroup', 'colgroup', 'auto']))
							continue;
						
						$_['scope'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}