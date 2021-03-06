<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Link EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST crossOrigin	= __addr_Attributes::LINK_crossOrigin;
		CONST href		= __addr_Attributes::LINK_href;
		CONST hrefLang		= __addr_Attributes::LINK_hrefLang;
		CONST media		= __addr_Attributes::LINK_media;
		CONST rel		= __addr_Attributes::LINK_rel;
		CONST sizes		= __addr_Attributes::LINK_sizes;
		CONST type		= __addr_Attributes::LINK_type;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::crossOrigin	=> [__const_Type::SPL_STRING], // enum: anonymous,  use-credentials
				self::href		=> [__const_Type::SPL_STRING],
				self::hrefLang		=> [__const_Type::SPL_STRING],
				self::media		=> [__const_Type::SPL_STRING],
				self::rel		=> [__const_Type::SPL_STRING],
				self::sizes		=> [__const_Type::SPL_STRING],
				self::type		=> [__const_Type::SPL_STRING]
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
					case self::crossOrigin:
						if(FALSE === in_array($v, ['anonymous', 'use-credentials']))
							continue;
						
						$_[__name_Attributes::DOM_crossOrigin] = $v;
						break;
					case self::href:
						$_[__name_Attributes::DOM_href] = $v;
						break;
					case self::hrefLang:
						$_[__name_Attributes::DOM_hrefLang] = $v;
						break;
					case self::media:
						$_[__name_Attributes::DOM_media] = $v;
						break;
					case self::rel:
						$_[__name_Attributes::DOM_rel] = $v;
						break;
					case self::sizes:
						$_[__name_Attributes::DOM_sizes] = $v;
						break;
					case self::type:
						$_[__name_Attributes::DOM_type] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}