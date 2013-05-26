<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Embed EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST height		= 0x14;
		CONST src		= 0x15;
		CONST type		= 0x16;
		CONST width		= 0x17;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::height		=> __const_Type::SPL_LONG,
				self::src		=> __const_Type::SPL_STRING,
				self::type		=> __const_Type::SPL_STRING,
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
					case self::height:
						$_['height'] = $v;
						break;
					case self::src:
						$_['src'] = $v;
						break;
					case self::type:
						$_['type'] = $v;
						break;
					case self::width:
						$_['width'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}