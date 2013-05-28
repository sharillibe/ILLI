<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Img EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST alt		= __addr_Attributes::IMG_alt;
		CONST crossOrigin	= __addr_Attributes::IMG_crossOrigin;
		CONST height		= __addr_Attributes::IMG_height;
		CONST isMap		= __addr_Attributes::IMG_isMap;
		CONST src		= __addr_Attributes::IMG_src;
		CONST width		= __addr_Attributes::IMG_width;
		CONST useMap		= __addr_Attributes::IMG_useMap;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::alt		=> [__const_Type::SPL_STRING],
				self::crossOrigin	=> [__const_Type::SPL_STRING], // enum: anonymous, use-credentials
				self::height		=> [__const_Type::SPL_LONG],
				self::isMap		=> [__const_Type::SPL_BOOLEAN],
				self::src		=> [__const_Type::SPL_STRING],
				self::width		=> [__const_Type::SPL_LONG],
				self::useMap		=> [__const_Type::SPL_STRING]
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
					case self::alt:
						$_[__name_Attributes::DOM_alt] = $v;
						break;
					case self::crossOrigin:
						if(FALSE === in_array($v, ['anonymous', 'use-credentials']))
							continue;
						
						$_[__name_Attributes::DOM_crossOrigin] = $v;
						break;
					case self::height:
						$_[__name_Attributes::DOM_height] = $v;
						break;
					case self::isMap:
						$_[__name_Attributes::DOM_isMap] = $v;
						break;
					case self::src:
						$_[__name_Attributes::DOM_src] = $v;
						break;
					case self::width:
						$_[__name_Attributes::DOM_width] = $v;
						break;
					case self::useMap:
						$_[__name_Attributes::DOM_useMap] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}