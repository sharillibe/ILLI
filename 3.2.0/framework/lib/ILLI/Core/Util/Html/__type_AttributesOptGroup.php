<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\String;
	
	CLASS __type_AttributesOptGroup EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST disabled		= 0x14;
		CONST label		= 0x15;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::disabled		=> __const_Type::SPL_BOOLEAN,
				self::label		=> __const_Type::SPL_STRING
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
				endswitch;
			}
			
			return $_;
		}
	}