<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Option EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST disabled		= 0x14;
		CONST label		= 0x15;
		CONST selected		= 0x16;
		CONST value		= 0x17;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::disabled		=> __const_Type::SPL_BOOLEAN,
				self::label		=> __const_Type::SPL_STRING,
				self::selected		=> __const_Type::SPL_BOOLEAN,
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
					case self::disabled:
						$_['disabled'] = $v === TRUE ? 'true' : 'false';
						break;
					case self::label:
						$_['label'] = $v;
						break;
					case self::selected:
						$_['selected'] = $v === TRUE ? 'true' : 'false';
						break;
					case self::value:
						$_['value'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}