<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Progress EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST max		= __addr_Attributes::PROGRESS_max;
		CONST value		= __addr_Attributes::PROGRESS_value;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::max		=> [__const_Type::SPL_LONG, __const_Type::SPL_DOUBLE]
				self::value		=> [__const_Type::SPL_LONG, __const_Type::SPL_DOUBLE]
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
					case self::max:
						$_[__name_Attributes::DOM_max] = $v;
						break;
					case self::value:
						$_[__name_Attributes::DOM_value] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}