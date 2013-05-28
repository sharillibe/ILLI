<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Track EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST std		= __addr_Attributes::TRACK_default;
		CONST kind		= __addr_Attributes::TRACK_kind;
		CONST label		= __addr_Attributes::TRACK_label;
		CONST src		= __addr_Attributes::TRACK_src;
		CONST srcLang		= __addr_Attributes::TRACK_srcLang;
		
		protected static $__keywordAlias =
		[
			__name_Attributes::DOM_default	=> 'std'
		];
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::std		=> [__const_Type::SPL_BOOLEAN],
				self::kind		=> [__const_Type::SPL_STRING], // enum: subtitles, captions, descriptions, chapters, metadata
				self::label		=> [__const_Type::SPL_STRING],
				self::src		=> [__const_Type::SPL_STRING],
				self::srcLang		=> [__const_Type::SPL_STRING]
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
					case self::std:
						$_[__name_Attributes::DOM_default] = $v;
						break;
					case self::kind:
						if(FALSE === in_array($v, ['subtitles', 'captions', 'descriptions', 'chapters', 'metadata']))
							continue;
						
						$_[__name_Attributes::DOM_kind] = $v;
						break;
					case self::label:
						$_[__name_Attributes::DOM_label] = $v;
						break;
					case self::src:
						$_[__name_Attributes::DOM_src] = $v;
						break;
					case self::srcLang:
						$_[__name_Attributes::DOM_srclang] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}