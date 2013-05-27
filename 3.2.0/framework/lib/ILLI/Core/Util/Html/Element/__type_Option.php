<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	
	CLASS __type_Option EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST disabled		= __addr_Attributes::OPTION_disabled;
		CONST label		= __addr_Attributes::OPTION_label;
		CONST selected		= __addr_Attributes::OPTION_selected;
		CONST value		= __addr_Attributes::OPTION_value;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::disabled		=> __const_Type::SPL_BOOLEAN,
				self::label		=> __const_Type::SPL_STRING,
				self::selected		=> __const_Type::SPL_BOOLEAN,
				self::value		=> __const_Type::SPL_STRING
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
						$_['disabled'] = $v;
						break;
					case self::label:
						$_['label'] = $v;
						break;
					case self::selected:
						$_['selected'] = $v;
						break;
					case self::value:
						$_['value'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}