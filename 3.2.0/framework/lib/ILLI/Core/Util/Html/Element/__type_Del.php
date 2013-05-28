<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Del EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST cite		= __addr_Attributes::DEL_cite;
		CONST dateTime		= __addr_Attributes::DEL_dateTime;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::cite		=> [__const_Type::SPL_STRING],
				self::dateTime		=> [__const_Type::SPL_STRING]
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
					case self::cite:
						$_[__name_Attributes::DOM_cite] = $v;
						break;
					case self::dateTime:
						$_[__name_Attributes::DOM_dateTime] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}