<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Keygen EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST autoFocus		= __addr_Attributes::KEYGEN_autoFocus;
		CONST challenge		= __addr_Attributes::KEYGEN_challenge;
		CONST disabled		= __addr_Attributes::KEYGEN_disabled;
		CONST form		= __addr_Attributes::KEYGEN_form;
		CONST keyType		= __addr_Attributes::KEYGEN_keyType;
		CONST name		= __addr_Attributes::KEYGEN_name;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::autoFocus		=> __const_Type::SPL_BOOLEAN,
				self::challenge		=> __const_Type::SPL_STRING,
				self::disabled		=> __const_Type::SPL_BOOLEAN,
				self::form		=> __const_Type::SPL_STRING,
				self::keyType		=> __const_Type::SPL_STRING,
				self::name		=> __const_Type::SPL_STRING,
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
					case self::challenge:
						$_[__name_Attributes::DOM_challenge] = $v;
						break;
					case self::disabled:
						$_[__name_Attributes::DOM_disabled] = $v;
						break;
					case self::form:
						$_[__name_Attributes::DOM_form] = $v;
						break;
					case self::keyType:
						$_[__name_Attributes::DOM_keyType] = $v;
						break;
					case self::name:
						$_[__name_Attributes::DOM_name] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}