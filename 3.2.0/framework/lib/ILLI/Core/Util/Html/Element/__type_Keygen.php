<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Keygen EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST autoFocus		= 0x14;
		CONST challenge		= 0x15;
		CONST disabled		= 0x16;
		CONST form		= 0x17;
		CONST keyType		= 0x18;
		CONST name		= 0x19;
		
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
						$_['autofocus'] = $v;
						break;
					case self::challenge:
						$_['challenge'] = $v;
						break;
					case self::disabled:
						$_['disabled'] = $v;
						break;
					case self::form:
						$_['form'] = $v;
						break;
					case self::keyType:
						$_['keytype'] = $v;
						break;
					case self::name:
						$_['name'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}