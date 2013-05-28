<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Area EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST alt		= __addr_Attributes::AREA_alt;
		CONST coords		= __addr_Attributes::AREA_coords;
		CONST download		= __addr_Attributes::AREA_download;
		CONST href		= __addr_Attributes::AREA_href;
		CONST hrefLang		= __addr_Attributes::AREA_hrefLang;
		CONST media		= __addr_Attributes::AREA_media;
		CONST shape		= __addr_Attributes::AREA_shape;
		CONST rel		= __addr_Attributes::AREA_rel;
		CONST target		= __addr_Attributes::AREA_target;
		CONST type		= __addr_Attributes::AREA_type;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::alt		=> [__const_Type::SPL_STRING],
				self::coords		=> [__const_Type::SPL_STRING],
				self::download		=> [__const_Type::SPL_STRING],
				self::href		=> [__const_Type::SPL_STRING],
				self::hrefLang		=> [__const_Type::SPL_STRING],
				self::media		=> [__const_Type::SPL_STRING],
				self::shape		=> [__const_Type::SPL_STRING],
				self::rel		=> [__const_Type::SPL_STRING],
				self::target		=> [__const_Type::SPL_STRING],
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
					case self::alt:
						$_[__name_Attributes::DOM_alt] = $v;
						break;
					case self::coords:
						$_[__name_Attributes::DOM_coords] = $v;
						break;
					case self::download:
						$_[__name_Attributes::DOM_download] = $v;
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
					case self::shape:
						$_[__name_Attributes::DOM_shape] = $v;
						break;
					case self::rel:
						$_[__name_Attributes::DOM_rel] = $v;
						break;
					case self::target:
						$_[__name_Attributes::DOM_target] = $v;
						break;
					case self::type:
						$_[__name_Attributes::DOM_type] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}