<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Source EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST media		= __addr_Attributes::SOURCE_media;
		CONST src		= __addr_Attributes::SOURCE_src;
		CONST type		= __addr_Attributes::SOURCE_type;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::media		=> [__const_Type::SPL_STRING],
				self::src		=> [__const_Type::SPL_STRING],
				self::type		=> [__const_Type::SPL_STRING]
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
					case self::media:
						$_[__name_Attributes::DOM_media] = $v;
						break;
					case self::src:
						$_[__name_Attributes::DOM_src] = $v;
						break;
					case self::type:
						$_[__name_Attributes::DOM_type] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}