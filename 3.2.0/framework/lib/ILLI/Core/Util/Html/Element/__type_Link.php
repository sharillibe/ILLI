<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Link EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST crossOrigin	= 0x14;
		CONST href		= 0x15;
		CONST hrefLang		= 0x16;
		CONST media		= 0x17;
		CONST rel		= 0x18;
		CONST sizes		= 0x19;
		CONST type		= 0x1A;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::crossOrigin	=> __const_Type::SPL_STRING, // enum: anonymous,  use-credentials
				self::href		=> __const_Type::SPL_STRING,
				self::hrefLang		=> __const_Type::SPL_STRING,
				self::media		=> __const_Type::SPL_STRING,
				self::rel		=> __const_Type::SPL_STRING,
				self::sizes		=> __const_Type::SPL_STRING,
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
					case self::crossOrigin:
						if(FALSE === in_array($v, ['anonymous', 'use-credentials']))
							continue;
						
						$_['crossorigin'] = $v;
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
					case self::rel:
						$_['rel'] = $v;
						break;
					case self::sizes:
						$_['sizes'] = $v;
						break;
					case self::type:
						$_['type'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}