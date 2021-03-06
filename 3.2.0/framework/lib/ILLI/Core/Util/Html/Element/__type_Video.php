<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Video EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST autoPlay		= __addr_Attributes::VIDEO_autoPlay;
		CONST buffered		= __addr_Attributes::VIDEO_buffered;
		CONST controls		= __addr_Attributes::VIDEO_controls;
		CONST crossOrigin	= __addr_Attributes::VIDEO_crossOrigin;
		CONST height		= __addr_Attributes::VIDEO_height;
		CONST loop		= __addr_Attributes::VIDEO_loop;
		CONST muted		= __addr_Attributes::VIDEO_muted;
		CONST played		= __addr_Attributes::VIDEO_played;
		CONST preload		= __addr_Attributes::VIDEO_preload;
		CONST poster		= __addr_Attributes::VIDEO_poster;
		CONST src		= __addr_Attributes::VIDEO_src;
		CONST width		= __addr_Attributes::VIDEO_width;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::autoPlay		=> [__const_Type::SPL_BOOLEAN],
				self::buffered		=> [__const_Type::SPL_STRING],
				self::controls		=> [__const_Type::SPL_BOOLEAN],
				self::crossOrigin	=> [__const_Type::SPL_STRING], // enum: anonymous, use-credentials
				self::height		=> [__const_Type::SPL_LONG],
				self::loop		=> [__const_Type::SPL_BOOLEAN],
				self::muted		=> [__const_Type::SPL_BOOLEAN],
				self::played		=> [__const_Type::SPL_STRING], // enum: none, metadata, auto
				self::preload		=> [__const_Type::SPL_STRING],
				self::poster		=> [__const_Type::SPL_STRING],
				self::src		=> [__const_Type::SPL_STRING],
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
					case self::autoPlay:
						$_[__name_Attributes::DOM_autoPlay] = $v;
						break;
					case self::buffered:
						$_[__name_Attributes::DOM_buffered] = $v;
						break;
					case self::controls:
						$_[__name_Attributes::DOM_controls] = $v;
						break;
					case self::crossOrigin:
						if(FALSE === in_array($v, ['anonymous', 'use-credentials']))
							continue;
							
						$_[__name_Attributes::DOM_crossOrigin] = $v;
						break;
					case self::height:
						$_[__name_Attributes::DOM_height] = $v;
						break;
					case self::loop:
						$_[__name_Attributes::DOM_loop] = $v;
						break;
					case self::muted:
						$_[__name_Attributes::DOM_muted] = $v;
						break;
					case self::played:
						if(FALSE === in_array($v, ['none', 'metadata', 'auto', '']))
							continue;
							
						$_[__name_Attributes::DOM_played] = $v;
						break;
					case self::preload:
						$_[__name_Attributes::DOM_preload] = $v;
						break;
					case self::poster:
						$_[__name_Attributes::DOM_poster] = $v;
						break;
					case self::src:
						$_[__name_Attributes::DOM_src] = $v;
						break;
					case self::width:
						$_[__name_Attributes::DOM_width] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}