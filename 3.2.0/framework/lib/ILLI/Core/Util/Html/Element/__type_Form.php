<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Form EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST acceptCharset	= 0x14;
		CONST action		= 0x15;
		CONST autoComplete	= 0x16;
		CONST encType		= 0x17;
		CONST method		= 0x18;
		CONST name		= 0x19;
		CONST noValidate	= 0x1A;
		CONST target		= 0x1B;
		
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