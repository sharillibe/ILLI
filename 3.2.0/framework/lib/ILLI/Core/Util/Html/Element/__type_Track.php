<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Track EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST std		= 0x14;	// alias: default
		CONST kind		= 0x15;
		CONST label		= 0x16;
		CONST src		= 0x17;
		CONST srcLang		= 0x18;
		
		protected static $__keywordAlias =
		[
			'default'	=> 'std'
		];
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::std		=> __const_Type::SPL_BOOLEAN,
				self::kind		=> __const_Type::SPL_STRING, // enum: subtitles, captions, descriptions, chapters, metadata
				self::label		=> __const_Type::SPL_STRING,
				self::src		=> __const_Type::SPL_STRING,
				self::srcLang		=> __const_Type::SPL_STRING
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
						$_['default'] = $v;
						break;
					case self::kind:
						if(FALSE === in_array($v, ['subtitles', 'captions', 'descriptions', 'chapters', 'metadata']))
							continue;
						
						$_['kind'] = $v;
						break;
					case self::label:
						$_['label'] = $v;
						break;
					case self::src:
						$_['src'] = $v;
						break;
					case self::srcLang:
						$_['srclang'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}