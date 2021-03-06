<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Param EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST name		= __addr_Attributes::PARAM_name;
		CONST value		= __addr_Attributes::PARAM_value;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::name		=> [__const_Type::SPL_STRING],
				self::value		=> [__const_Type::SPL_STRING]
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
					case self::name:
						$_[__name_Attributes::DOM_name] = $v;
						break;
					case self::value:
						$_[__name_Attributes::DOM_value] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}