<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	
	CLASS __type_Button EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST autoFocus		= __addr_Attributes::BUTTON_autoFocus;
		CONST disabled		= __addr_Attributes::BUTTON_disabled;
		CONST form		= __addr_Attributes::BUTTON_form;
		CONST formAction	= __addr_Attributes::BUTTON_formAction;
		CONST formEncType	= __addr_Attributes::BUTTON_formEncType;
		CONST formMethod	= __addr_Attributes::BUTTON_formMethod;
		CONST formNoValidate	= __addr_Attributes::BUTTON_formNoValidate;
		CONST formTarget	= __addr_Attributes::BUTTON_formTarget;
		CONST name		= __addr_Attributes::BUTTON_name;
		CONST type		= __addr_Attributes::BUTTON_type;
		CONST value		= __addr_Attributes::BUTTON_value;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::autoFocus		=> __const_Type::SPL_BOOLEAN,
				self::disabled		=> __const_Type::SPL_BOOLEAN,
				self::form		=> __const_Type::SPL_STRING,
				self::formAction	=> __const_Type::SPL_STRING,
				self::formEncType	=> __const_Type::SPL_STRING,
				self::formMethod	=> __const_Type::SPL_STRING,	// enum: post, get
				self::formNoValidate	=> __const_Type::SPL_BOOLEAN,
				self::formTarget	=> __const_Type::SPL_STRING,
				self::name		=> __const_Type::SPL_STRING,
				self::type		=> __const_Type::SPL_STRING,	// enum: submit, reset, button
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
					case self::autoFocus:
						$_['autofocus'] = $v;
						break;
					case self::disabled:
						$_['disabled'] = $v;
						break;
					case self::form:
						$_['form'] = $v;
						break;
					case self::formAction:
						$_['formaction'] = $v;
						break;
					case self::formEncType:
						$_['formenctype'] = $v;
						break;
					case self::formMethod:
						if(FALSE === in_array($v, ['post', 'get']))
							continue;
						
						$_['formmethod'] = $v;
						break;
					case self::formNoValidate:
						$_['formnovalidate'] = $v;
						break;
					case self::formTarget:
						$_['formtarget'] = $v;
						break;
					case self::name:
						$_['name'] = $v;
						break;
					case self::type:
						if(FALSE === in_array($v, ['button', 'submit', 'reset']))
							continue;
							
						$_['type'] = $v;
						break;
					case self::value:
						$_['value'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}