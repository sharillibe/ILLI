<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Textarea EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST autoFocus			= 0x14;
		CONST cols			= 0x15;
		CONST disabled			= 0x16;
		CONST form			= 0x17;
		CONST maxLength			= 0x18;
		CONST name			= 0x19;
		CONST placeHolder		= 0x1A;
		CONST readOnly			= 0x1B;
		CONST required			= 0x1C;
		CONST rows			= 0x1D;
		CONST selectionDirection	= 0x1E;
		CONST selectionEnd		= 0x1F;
		CONST selectionStart		= 0x20;
		CONST wrap			= 0x21;
		
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
						$_['autofocus'] = $v;
						break;
					case self::cols:
						$_['cols'] = $v;
						break;
					case self::disabled:
						$_['disabled'] = $v;
						break;
					case self::form:
						$_['form'] = $v;
						break;
					case self::maxLength:
						$_['maxlength'] = $v;
						break;
					case self::name:
						$_['name'] = $v;
						break;
					case self::placeHolder:
						$_['placeholder'] = $v;
						break;
					case self::readOnly:
						$_['readonly'] = $v;
						break;
					case self::required:
						$_['required'] = $v;
						break;
					case self::rows:
						$_['rows'] = $v;
						break;
					case self::selectionDirection:
						$_['selectionDirection'] = $v;
						break;
					case self::selectionEnd:
						$_['selectionEnd'] = $v;
						break;
					case self::selectionStart:
						$_['selectionStart'] = $v;
						break;
					case self::wrap:
						$_['wrap'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}