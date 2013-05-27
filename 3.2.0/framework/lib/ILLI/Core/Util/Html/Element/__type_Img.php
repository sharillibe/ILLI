<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Img EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST alt		= 0x14;
		CONST crossOrigin	= 0x15;
		CONST height		= 0x16;
		CONST isMap		= 0x17;
		CONST src		= 0x18;
		CONST width		= 0x19;
		CONST useMap		= 0x1A;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::alt		=> __const_Type::SPL_STRING,
				self::crossOrigin	=> __const_Type::SPL_STRING, // enum: anonymous, use-credentials
				self::height		=> __const_Type::SPL_LONG,
				self::isMap		=> __const_Type::SPL_BOOLEAN,
				self::src		=> __const_Type::SPL_STRING,
				self::width		=> __const_Type::SPL_LONG,
				self::useMap		=> __const_Type::SPL_STRING
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
						$_['alt'] = $v;
						break;
					case self::crossOrigin:
						if(FALSE === in_array($v, ['anonymous', 'use-credentials']))
							continue;
						
						$_['crossorigin'] = $v;
						break;
					case self::height:
						$_['height'] = $v;
						break;
					case self::isMap:
						$_['isMap'] = $v;
						break;
					case self::src:
						$_['src'] = $v;
						break;
					case self::width:
						$_['width'] = $v;
						break;
					case self::useMap:
						$_['useMap'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}