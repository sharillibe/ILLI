<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Ol EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST reversed		= __addr_Attributes::OL_reversed;
		CONST start		= __addr_Attributes::OL_start;
		CONST type		= __addr_Attributes::OL_type;
		
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
						$_[__name_Attributes::DOM_reversed] = $v;
						break;
					case self::start:
						$_[__name_Attributes::DOM_start] = $v;
						break;
					case self::type:
						if(FALSE === in_array($v, ['a', 'A', 'i', 'I', '1']))
							continue;
						
						$_[__name_Attributes::DOM_type] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}