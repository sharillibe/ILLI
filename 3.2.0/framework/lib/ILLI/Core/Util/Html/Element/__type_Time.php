<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Time EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST dateTime		= __addr_Attributes::TIME_dateTime;
		CONST pubDate		= __addr_Attributes::TIME_pubDate;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::dateTime		=> __const_Type::SPL_STRING,
				self::pubDate		=> __const_Type::SPL_BOOLEAN
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
					case self::dateTime:
						$_[__name_Attributes::DOM_dateTime] = $v;
						break;
					case self::pubDate:
						$_[__name_Attributes::DOM_pubDate] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}