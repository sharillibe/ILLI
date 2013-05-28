<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Command EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST checked		= __addr_Attributes::COMMAND_checked;
		CONST disabled		= __addr_Attributes::COMMAND_disabled;
		CONST icon		= __addr_Attributes::COMMAND_icon;
		CONST label		= __addr_Attributes::COMMAND_label;
		CONST radioGroup	= __addr_Attributes::COMMAND_radioGroup;
		CONST type		= __addr_Attributes::COMMAND_type;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::checked		=> __const_Type::SPL_BOOLEAN,
				self::disabled		=> __const_Type::SPL_BOOLEAN,
				self::icon		=> __const_Type::SPL_STRING,
				self::label		=> __const_Type::SPL_STRING,
				self::radioGroup	=> __const_Type::SPL_STRING,
				self::type		=> __const_Type::SPL_STRING	// enum: command, checkbox, radio
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
					case self::checked:
						$_[__name_Attributes::DOM_checked] = $v;
						break;
					case self::disabled:
						$_[__name_Attributes::DOM_disabled] = $v;
						break;
					case self::icon:
						$_[__name_Attributes::DOM_icon] = $v;
						break;
					case self::label:
						$_[__name_Attributes::DOM_label] = $v;
						break;
					case self::radioGroup:
						$_[__name_Attributes::DOM_radioGroup] = $v;
						break;
					case self::type:
						if(FALSE === in_array($v, ['command', 'checkbox', 'radio']))
							continue;
							
						$_[__name_Attributes::DOM_type] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}