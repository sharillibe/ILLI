<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Select EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST autoFocus		= __addr_Attributes::SELECT_autoFocus;
		CONST disabled		= __addr_Attributes::SELECT_disabled;
		CONST form		= __addr_Attributes::SELECT_form;
		CONST multiple		= __addr_Attributes::SELECT_multiple;
		CONST selectedIndex	= __addr_Attributes::SELECT_selectedIndex;
		CONST name		= __addr_Attributes::SELECT_name;
		CONST required		= __addr_Attributes::SELECT_required;
		CONST size		= __addr_Attributes::SELECT_size;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::autoFocus		=> [__const_Type::SPL_BOOLEAN],
				self::disabled		=> [__const_Type::SPL_BOOLEAN],
				self::form		=> [__const_Type::SPL_STRING],
				self::multiple		=> [__const_Type::SPL_BOOLEAN],
				self::selectedIndex	=> [__const_Type::SPL_STRING],
				self::name		=> [__const_Type::SPL_STRING],
				self::required		=> [__const_Type::SPL_BOOLEAN],
				self::size		=> [__const_Type::SPL_LONG]
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
					case self::autoFocus:
						$_[__name_Attributes::DOM_autoFocus] = $v;
						break;
					case self::disabled:
						$_[__name_Attributes::DOM_disabled] = $v;
						break;
					case self::form:
						$_[__name_Attributes::DOM_form] = $v;
						break;
					case self::multiple:
						$_[__name_Attributes::DOM_multiple] = $v;
						break;
					case self::selectedIndex:
						$_[__name_Attributes::DOM_selectedIndex] = $v;
						break;
					case self::name:
						$_[__name_Attributes::DOM_name] = $v;
						break;
					case self::required:
						$_[__name_Attributes::DOM_required] = $v;
						break;
					case self::size:
						$_[__name_Attributes::DOM_size] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}