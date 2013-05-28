<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Meter EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST form		= __addr_Attributes::METER_form;
		CONST high		= __addr_Attributes::METER_high;
		CONST low		= __addr_Attributes::METER_low;
		CONST max		= __addr_Attributes::METER_max;
		CONST min		= __addr_Attributes::METER_min;
		CONST optimum		= __addr_Attributes::METER_optimum;
		CONST value		= __addr_Attributes::METER_value;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::form		=> [__const_Type::SPL_STRING],
				self::high		=> [__const_Type::SPL_DOUBLE, __const_Type::SPL_LONG],
				self::low		=> [__const_Type::SPL_DOUBLE, __const_Type::SPL_LONG],
				self::max		=> [__const_Type::SPL_DOUBLE, __const_Type::SPL_LONG],
				self::min		=> [__const_Type::SPL_DOUBLE, __const_Type::SPL_LONG],
				self::optimum		=> [__const_Type::SPL_DOUBLE, __const_Type::SPL_LONG],
				self::value		=> [__const_Type::SPL_DOUBLE, __const_Type::SPL_LONG]
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
						$_[__name_Attributes::DOM_form] = $v;
						break;
					case self::high:
						$_[__name_Attributes::DOM_high] = $v;
						break;
					case self::low:
						$_[__name_Attributes::DOM_low] = $v;
						break;
					case self::max:
						$_[__name_Attributes::DOM_max] = $v;
						break;
					case self::min:
						$_[__name_Attributes::DOM_min] = $v;
						break;
					case self::optimum:
						$_[__name_Attributes::DOM_optimum] = $v;
						break;
					case self::value:
						$_[__name_Attributes::DOM_value] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}