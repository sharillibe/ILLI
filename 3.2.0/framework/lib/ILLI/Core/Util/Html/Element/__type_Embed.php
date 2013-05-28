<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Embed EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST height		= __addr_Attributes::EMBED_height;
		CONST src		= __addr_Attributes::EMBED_src;
		CONST type		= __addr_Attributes::EMBED_type;
		CONST width		= __addr_Attributes::EMBED_width;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::height		=> [__const_Type::SPL_LONG],
				self::src		=> [__const_Type::SPL_STRING],
				self::type		=> [__const_Type::SPL_STRING],
				self::width		=> [__const_Type::SPL_LONG]
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
					case self::height:
						$_[__name_Attributes::DOM_height] = $v;
						break;
					case self::src:
						$_[__name_Attributes::DOM_src] = $v;
						break;
					case self::type:
						$_[__name_Attributes::DOM_type] = $v;
						break;
					case self::width:
						$_[__name_Attributes::DOM_width] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}