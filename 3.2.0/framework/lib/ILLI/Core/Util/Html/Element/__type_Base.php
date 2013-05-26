<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Base EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST href		= 0x14;
		CONST target		= 0x15;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::href		=> __const_Type::SPL_STRING,
				self::target		=> __const_Type::SPL_STRING,
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
					case self::href:
						$_['href'] = $v;
						break;
					case self::target:
						$_['target'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}