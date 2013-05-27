<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Input EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST accept			= 0x14;
		CONST autoComplete		= 0x15;
		CONST autoFocus			= 0x16;
		CONST autoSave			= 0x17;
		CONST checked			= 0x18;
		CONST disabled			= 0x19;
		CONST form			= 0x1A;
		CONST formAction		= 0x1B;
		CONST formEncType		= 0x1C;
		CONST formMethod		= 0x1D;
		CONST formNoValidate		= 0x1E;
		CONST formTarget		= 0x1F;
		CONST height			= 0x20;
		CONST inputMode			= 0x21;
		CONST dataListId		= 0x22; // alias: list
		CONST max			= 0x23;
		CONST maxLength			= 0x24;
		CONST min			= 0x25;
		CONST multiple			= 0x26;
		CONST name			= 0x27;
		CONST pattern			= 0x28;
		CONST placeHolder		= 0x29;
		CONST readOnly			= 0x2A;
		CONST required			= 0x2B;
		CONST selectionDirection	= 0x2C;
		CONST size			= 0x2D;
		CONST src			= 0x2E;
		CONST step			= 0x2F;
		CONST type			= 0x30;
		CONST value			= 0x31;
		CONST width			= 0x32;
		
		protected static $__keywordAlias =
		[
			'list'	=> 'dataListId'
		];
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::accept			=> __const_Type::SPL_STRING,
				self::autoComplete		=> __const_Type::SPL_STRING, // enum: on, off
				self::autoFocus			=> __const_Type::SPL_BOOLEAN,
				self::autoSave			=> __const_Type::SPL_STRING,
				self::checked			=> __const_Type::SPL_BOOLEAN,
				self::disabled			=> __const_Type::SPL_BOOLEAN,
				self::form			=> __const_Type::SPL_STRING,
				self::formAction		=> __const_Type::SPL_STRING,
				self::formEncType		=> __const_Type::SPL_STRING,
				self::formMethod		=> __const_Type::SPL_STRING, // enum: post, get
				self::formNoValidate		=> __const_Type::SPL_BOOLEAN,
				self::formTarget		=> __const_Type::SPL_STRING,
				self::height			=> __const_Type::SPL_LONG,
				self::inputMode			=> __const_Type::SPL_STRING,
				self::dataListId		=> __const_Type::SPL_STRING,
				self::max			=> __const_Type::SPL_LONG,
				self::maxLength			=> __const_Type::SPL_LONG,
				self::min			=> __const_Type::SPL_LONG,
				self::multiple			=> __const_Type::SPL_BOOLEAN,
				self::name			=> __const_Type::SPL_STRING,
				self::pattern			=> __const_Type::SPL_STRING,
				self::placeHolder		=> __const_Type::SPL_STRING,
				self::readOnly			=> __const_Type::SPL_BOOLEAN,
				self::required			=> __const_Type::SPL_BOOLEAN,
				self::selectionDirection	=> __const_Type::SPL_STRING,
				self::size			=> __const_Type::SPL_LONG,
				self::src			=> __const_Type::SPL_STRING,
				self::step			=> __const_Type::SPL_LONG,
				self::type			=> __const_Type::SPL_STRING,
				self::value			=> __const_Type::SPL_STRING,
				self::width			=> __const_Type::SPL_LONG
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
					case self::accept:
						$_['accept'] = $v;
						break;
					case self::autoComplete:
						if(FALSE === in_array($v, ['on', 'off']))
							continue;
							
						$_['autocomplete'] = $v;
						break;
					case self::autoFocus:
						$_['autofocus'] = $v;
						break;
					case self::autoSave:
						$_['autosave'] = $v;
						break;
					case self::checked:
						$_['checked'] = $v;
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
					case self::height:
						$_['height'] = $v;
						break;
					case self::inputMode:
						$_['inputmode'] = $v;
						break;
					case self::dataListId:
						$_['list'] = $v;
						break;
					case self::max:
						$_['max'] = $v;
						break;
					case self::maxLength:
						$_['maxlength'] = $v;
						break;
					case self::min:
						$_['min'] = $v;
						break;
					case self::multiple:
						$_['multiple'] = $v;
						break;
					case self::name:
						$_['name'] = $v;
						break;
					case self::pattern:
						$_['pattern'] = $v;
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
					case self::selectionDirection:
						$_['selectionDirection'] = $v;
						break;
					case self::size:
						$_['size'] = $v;
						break;
					case self::src:
						$_['src'] = $v;
						break;
					case self::step:
						$_['step'] = $v;
						break;
					case self::type:
						if(FALSE === in_array($v, [
							'button',
							'checkbox',
							'color',
							'date',
							'datetime',
							'datetime-local',
							'email',
							'file',
							'hidden',
							'image',
							'month',
							'number',
							'password',
							'radio',
							'range',
							'reset',
							'search',
							'submit',
							'tel',
							'text',
							'time',
							'url',
							'week'])) continue;
							
						$_['type'] = $v;
						break;
					case self::value:
						$_['value'] = $v;
						break;
					case self::width:
						$_['width'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}