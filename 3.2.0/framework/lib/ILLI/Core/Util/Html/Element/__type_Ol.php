<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Ol EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST reversed		= 0x14;
		CONST start		= 0x15;
		CONST type		= 0x16;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::reversed		=> __const_Type::SPL_BOOLEAN,
				self::start		=> __const_Type::SPL_LONG,
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
					case self::reversed:
						$_['reversed'] = $v;
						break;
					case self::start:
						$_['start'] = $v;
						break;
					case self::type:
						if(FALSE === in_array($v, ['a', 'A', 'i', 'I', '1']))
							continue;
						
						$_['type'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}