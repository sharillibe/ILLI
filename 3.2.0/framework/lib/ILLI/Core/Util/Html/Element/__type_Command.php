<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Command EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST checked		= 0x14;
		CONST disabled		= 0x15;
		CONST icon		= 0x16;
		CONST label		= 0x17;
		CONST radioGroup	= 0x18;
		CONST type		= 0x19;
		
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
						$_['checked'] = $v;
						break;
					case self::disabled:
						$_['disabled'] = $v;
						break;
					case self::icon:
						$_['icon'] = $v;
						break;
					case self::label:
						$_['label'] = $v;
						break;
					case self::radioGroup:
						$_['radiogroup'] = $v;
						break;
					case self::type:
						if(FALSE === in_array($v, ['command', 'checkbox', 'radio']))
							continue;
							
						$_['type'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}