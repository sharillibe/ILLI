<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Ins EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST cite		= 0x14;
		CONST dateTime		= 0x15;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::cite		=> __const_Type::SPL_STRING,
				self::dateTime		=> __const_Type::SPL_STRING
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
					case self::cite:
						$_['cite'] = $v;
						break;
					case self::dateTime:
						$_['datetime'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}