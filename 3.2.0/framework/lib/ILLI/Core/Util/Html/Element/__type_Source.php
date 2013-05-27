<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Source EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST media		= 0x14;
		CONST src		= 0x15;
		CONST type		= 0x16;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::media		=> __const_Type::SPL_STRING,
				self::src		=> __const_Type::SPL_STRING,
				self::type		=> __const_Type::SPL_STRING
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
					case self::media:
						$_['media'] = $v;
						break;
					case self::src:
						$_['src'] = $v;
						break;
					case self::type:
						$_['type'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}