<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Td EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST colspan		= __addr_Attributes::TD_colspan;
		CONST headers		= __addr_Attributes::TD_headers;
		CONST rowspan		= __addr_Attributes::TD_rowspan;
		
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
						$_[__name_Attributes::DOM_colspan] = $v;
						break;
					case self::headers:
						$_[__name_Attributes::DOM_headers] = TRUE === is_array($v) ? implode(',', $v) : $v;
						break;
					case self::rowspan:
						$_[__name_Attributes::DOM_rowspan] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}