<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Select EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST autofocus		= 0x14;
		CONST disabled		= 0x15;
		CONST form		= 0x16;
		CONST multiple		= 0x17;
		CONST selectedIndex	= 0x18;
		CONST name		= 0x19;
		CONST required		= 0x1A;
		CONST size		= 0x1B;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::autofocus		=> __const_Type::SPL_BOOLEAN,
				self::disabled		=> __const_Type::SPL_BOOLEAN,
				self::form		=> __const_Type::SPL_STRING,
				self::multiple		=> __const_Type::SPL_BOOLEAN,
				self::selectedIndex	=> __const_Type::SPL_STRING,
				self::name		=> __const_Type::SPL_STRING,
				self::required		=> __const_Type::SPL_BOOLEAN,
				self::size		=> __const_Type::SPL_LONG
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
					case self::autofocus:
						$_['autofocus'] = $v === TRUE ? 'true' : 'false';
						break;
					case self::disabled:
						$_['disabled'] = $v === TRUE ? 'true' : 'false';
						break;
					case self::form:
						$_['form'] = $v;
						break;
					case self::multiple:
						$_['multiple'] = $v === TRUE ? 'true' : 'false';
						break;
					case self::selectedIndex:
						$_['selectedIndex'] = $v;
						break;
					case self::name:
						$_['name'] = $v;
						break;
					case self::required:
						$_['required'] = $v === TRUE ? 'true' : 'false';
						break;
					case self::size:
						$_['size'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}