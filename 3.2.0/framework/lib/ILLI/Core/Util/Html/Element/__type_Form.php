<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	
	CLASS __type_Form EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST acceptCharset	= __addr_Attributes::FORM_acceptCharset;
		CONST action		= __addr_Attributes::FORM_action;
		CONST autoComplete	= __addr_Attributes::FORM_autoComplete;
		CONST encType		= __addr_Attributes::FORM_encType;
		CONST method		= __addr_Attributes::FORM_method;
		CONST name		= __addr_Attributes::FORM_name;
		CONST noValidate	= __addr_Attributes::FORM_noValidate;
		CONST target		= __addr_Attributes::FORM_target;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::acceptCharset	=> __const_Type::SPL_STRING,
				self::action		=> __const_Type::SPL_STRING,
				self::autoComplete	=> __const_Type::SPL_STRING, // enum; on, off
				self::encType		=> __const_Type::SPL_STRING,
				self::method		=> __const_Type::SPL_STRING, // enum: post, get
				self::name		=> __const_Type::SPL_STRING,
				self::noValidate	=> __const_Type::SPL_BOOLEAN,
				self::target		=> __const_Type::SPL_STRING
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
					case self::acceptCharset:
						$_['accept-charset'] = $v;
						break;
					case self::action:
						$_['action'] = $v;
						break;
					case self::autoComplete:
						if(FALSE === in_array($v, ['on', 'off']))
							continue;
						
						$_['autocomplete'] = $v;
						break;
					case self::encType:
						$_['enctype'] = $v;
						break;
					case self::method:
						if(FALSE === in_array($v, ['post', 'get']))
							continue;
						
						$_['method'] = $v;
						break;
					case self::name:
						$_['name'] = $v;
						break;
					case self::noValidate:
						$_['novalidate'] = $v;
						break;
					case self::target:
						$_['target'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}