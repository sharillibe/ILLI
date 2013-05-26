<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_A EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST download		= 0x14;
		CONST href		= 0x15;
		CONST hrefLang		= 0x16;
		CONST media		= 0x17;
		CONST ping		= 0x18;
		CONST rel		= 0x19;
		CONST target		= 0x1A;
		CONST type		= 0x1B;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::download		=> __const_Type::SPL_STRING,
				self::href		=> __const_Type::SPL_STRING,
				self::hrefLang		=> __const_Type::SPL_STRING,
				self::media		=> __const_Type::SPL_STRING,
				self::ping		=> __const_Type::SPL_STRING,
				self::rel		=> __const_Type::SPL_STRING,
				self::target		=> __const_Type::SPL_STRING, // enum: _self, _blank, _parent, _top
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
						if(FALSE === in_array($v, ['_self', '_blank', '_parent', '_top']))
							continue;
						
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