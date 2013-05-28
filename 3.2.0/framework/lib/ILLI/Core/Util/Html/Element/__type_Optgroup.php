<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Optgroup EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST disabled		= __addr_Attributes::OPTGROUP_disabled;
		CONST label		= __addr_Attributes::OPTGROUP_label;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::disabled		=> __const_Type::SPL_BOOLEAN,
				self::label		=> __const_Type::SPL_STRING
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
					case self::disabled:
						$_[__name_Attributes::DOM_disabled] = $v;
						break;
					case self::label:
						$_[__name_Attributes::DOM_label] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}