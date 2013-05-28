<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Fieldset EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST disabled		= __addr_Attributes::FIELDSET_disabled;
		CONST form		= __addr_Attributes::FIELDSET_form;
		CONST name		= __addr_Attributes::FIELDSET_name;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::disabled		=> [__const_Type::SPL_BOOLEAN],
				self::form		=> [__const_Type::SPL_STRING],
				self::name		=> [__const_Type::SPL_STRING]
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
					case self::form:
						$_[__name_Attributes::DOM_form] = $v;
						break;
					case self::name:
						$_[__name_Attributes::DOM_name] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}