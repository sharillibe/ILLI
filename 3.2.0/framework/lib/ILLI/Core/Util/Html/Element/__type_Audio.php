<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	
	CLASS __type_Audio EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST autoPlay		= __addr_Attributes::AUDIO_autoPlay;
		CONST buffered		= __addr_Attributes::AUDIO_buffered;
		CONST controls		= __addr_Attributes::AUDIO_controls;
		CONST loop		= __addr_Attributes::AUDIO_loop;
		CONST muted		= __addr_Attributes::AUDIO_muted;
		CONST played		= __addr_Attributes::AUDIO_played;
		CONST preload		= __addr_Attributes::AUDIO_preload;
		CONST src		= __addr_Attributes::AUDIO_src;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::autoPlay		=> __const_Type::SPL_BOOLEAN,
				self::buffered		=> __const_Type::SPL_STRING,
				self::controls		=> __const_Type::SPL_BOOLEAN,
				self::loop		=> __const_Type::SPL_BOOLEAN,
				self::muted		=> __const_Type::SPL_BOOLEAN,
				self::played		=> __const_Type::SPL_STRING,
				self::preload		=> __const_Type::SPL_STRING,  // enum: none, metadata, auto
				self::src		=> __const_Type::SPL_STRING
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
					case self::autoPlay:
						$_['autoplay'] = $v;
						break;
					case self::buffered:
						$_['buffered'] = $v;
						break;
					case self::controls:
						$_['controls'] = $v;
						break;
					case self::loop:
						$_['loop'] = $v;
						break;
					case self::muted:
						$_['muted'] = $v;
						break;
					case self::played:
						$_['played'] = $v;
						break;
					case self::preload:
						if(FALSE === in_array($v, ['none', 'metadata', 'auto', '']))
							continue;
							
						$_['preload'] = $v;
						break;
					case self::src:
						$_['src'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}