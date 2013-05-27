<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	
	CLASS __type_Th EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST abbr		= __addr_Attributes::TH_abbr;
		CONST axis		= __addr_Attributes::TH_axis;
		CONST colspan		= __addr_Attributes::TH_colspan;
		CONST headers		= __addr_Attributes::TH_headers;
		CONST rowspan		= __addr_Attributes::TH_rowspan;
		CONST scope		= __addr_Attributes::TH_scope;
		
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