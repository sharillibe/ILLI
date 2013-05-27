<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Video EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST autoPlay		= 0x14;
		CONST buffered		= 0x15;
		CONST controls		= 0x16;
		CONST crossOrigin	= 0x17;
		CONST height		= 0x18;
		CONST loop		= 0x19;
		CONST muted		= 0x1A;
		CONST played		= 0x1B;
		CONST preload		= 0x1C;
		CONST poster		= 0x1D;
		CONST src		= 0x1E;
		CONST width		= 0x1F;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::autoPlay		=> __const_Type::SPL_BOOLEAN,
				self::buffered		=> __const_Type::SPL_STRING,
				self::controls		=> __const_Type::SPL_BOOLEAN,
				self::crossOrigin	=> __const_Type::SPL_STRING, // enum: anonymous, use-credentials
				self::height		=> __const_Type::SPL_LONG,
				self::loop		=> __const_Type::SPL_BOOLEAN,
				self::muted		=> __const_Type::SPL_BOOLEAN,
				self::played		=> __const_Type::SPL_STRING, // enum: none, metadata, auto
				self::preload		=> __const_Type::SPL_STRING,
				self::poster		=> __const_Type::SPL_STRING,
				self::src		=> __const_Type::SPL_STRING,
				self::width		=> __const_Type::SPL_LONG
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
					case self::crossOrigin:
						if(FALSE === in_array($v, ['anonymous', 'use-credentials']))
							continue;
							
						$_['crossorigin'] = $v;
						break;
					case self::height:
						$_['height'] = $v;
						break;
					case self::loop:
						$_['loop'] = $v;
						break;
					case self::muted:
						$_['muted'] = $v;
						break;
					case self::played:
						if(FALSE === in_array($v, ['none', 'metadata', 'auto', '']))
							continue;
							
						$_['played'] = $v;
						break;
					case self::preload:
						$_['preload'] = $v;
						break;
					case self::poster:
						$_['poster'] = $v;
						break;
					case self::src:
						$_['src'] = $v;
						break;
					case self::width:
						$_['width'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}