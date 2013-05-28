<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Textarea EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST autoFocus			= __addr_Attributes::TEXTAREA_autoFocus;
		CONST cols			= __addr_Attributes::TEXTAREA_cols;
		CONST disabled			= __addr_Attributes::TEXTAREA_disabled;
		CONST form			= __addr_Attributes::TEXTAREA_form;
		CONST maxLength			= __addr_Attributes::TEXTAREA_maxLength;
		CONST name			= __addr_Attributes::TEXTAREA_name;
		CONST placeHolder		= __addr_Attributes::TEXTAREA_placeHolder;
		CONST readOnly			= __addr_Attributes::TEXTAREA_readOnly;
		CONST required			= __addr_Attributes::TEXTAREA_required;
		CONST rows			= __addr_Attributes::TEXTAREA_rows;
		CONST selectionDirection	= __addr_Attributes::TEXTAREA_selectionDirection;
		CONST selectionEnd		= __addr_Attributes::TEXTAREA_selectionEnd;
		CONST selectionStart		= __addr_Attributes::TEXTAREA_selectionStart;
		CONST wrap			= __addr_Attributes::TEXTAREA_wrap;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::autoFocus			=> __const_Type::SPL_BOOLEAN,
				self::cols			=> __const_Type::SPL_LONG,
				self::disabled			=> __const_Type::SPL_BOOLEAN,
				self::form			=> __const_Type::SPL_STRING,
				self::maxLength			=> __const_Type::SPL_LONG,
				self::name			=> __const_Type::SPL_STRING,
				self::placeHolder		=> __const_Type::SPL_STRING,
				self::readOnly			=> __const_Type::SPL_BOOLEAN,
				self::required			=> __const_Type::SPL_BOOLEAN,
				self::rows			=> __const_Type::SPL_LONG,
				self::selectionDirection	=> __const_Type::SPL_BOOLEAN,
				self::selectionEnd		=> __const_Type::SPL_LONG,
				self::selectionStart		=> __const_Type::SPL_LONG,
				self::wrap			=> __const_Type::SPL_STRING // enum: hard, soft
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
					case self::cols:
						$_[__name_Attributes::DOM_cols] = $v;
						break;
					case self::disabled:
						$_[__name_Attributes::DOM_disabled] = $v;
						break;
					case self::form:
						$_[__name_Attributes::DOM_form] = $v;
						break;
					case self::maxLength:
						$_[__name_Attributes::DOM_maxLength] = $v;
						break;
					case self::name:
						$_[__name_Attributes::DOM_name] = $v;
						break;
					case self::placeHolder:
						$_[__name_Attributes::DOM_placeHolder] = $v;
						break;
					case self::readOnly:
						$_[__name_Attributes::DOM_readOnly] = $v;
						break;
					case self::required:
						$_[__name_Attributes::DOM_required] = $v;
						break;
					case self::rows:
						$_[__name_Attributes::DOM_rows] = $v;
						break;
					case self::selectionDirection:
						$_[__name_Attributes::DOM_selectionDirection] = $v;
						break;
					case self::selectionEnd:
						$_[__name_Attributes::DOM_selectionEnd] = $v;
						break;
					case self::selectionStart:
						$_[__name_Attributes::DOM_selectionStart] = $v;
						break;
					case self::wrap:
						$_[__name_Attributes::DOM_wrap] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}