<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	
	CLASS __type_A EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST download		= __addr_Attributes::A_download;
		CONST href		= __addr_Attributes::A_href;
		CONST hrefLang		= __addr_Attributes::A_hrefLang;
		CONST media		= __addr_Attributes::A_media;
		CONST ping		= __addr_Attributes::A_ping;
		CONST rel		= __addr_Attributes::A_rel;
		CONST target		= __addr_Attributes::A_target;
		CONST type		= __addr_Attributes::A_type;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::download		=> __const_Type::SPL_STRING,
				self::href		=> __const_Type::SPL_STRING,
				self::hrefLang		=> __const_Type::SPL_STRING,
				self::media		=> __const_Type::SPL_STRING,
				self::ping		=> __const_Type::SPL_STRING,
				self::rel		=> __const_Type::SPL_STRING,
				self::target		=> __const_Type::SPL_STRING,
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
					case self::download:
						$_['download'] = $v;
						break;
					case self::href:
						$_['href'] = $v;
						break;
					case self::hrefLang:
						$_['hreflang'] = $v;
						break;
					case self::media:
						$_['media'] = $v;
						break;
					case self::ping:
						$_['ping'] = $v;
						break;
					case self::rel:
						$_['rel'] = $v;
						break;
					case self::target:
						$_['target'] = $v;
						break;
					case self::type:
						$_['type'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}