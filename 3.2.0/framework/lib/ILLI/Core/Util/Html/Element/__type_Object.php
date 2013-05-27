<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Object EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST data		= 0x14;
		CONST form		= 0x15;
		CONST height		= 0x16;
		CONST name		= 0x17;
		CONST type		= 0x18;
		CONST useMap		= 0x19;
		CONST width		= 0x1A;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::data		=> __const_Type::SPL_STRING,
				self::form		=> __const_Type::SPL_STRING,
				self::height		=> __const_Type::SPL_LONG,
				self::name		=> __const_Type::SPL_STRING,
				self::type		=> __const_Type::SPL_STRING,
				self::useMap		=> __const_Type::SPL_STRING,
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
					case self::data:
						$_['data'] = $v;
						break;
					case self::form:
						$_['form'] = $v;
						break;
					case self::height:
						$_['height'] = $v;
						break;
					case self::name:
						$_['name'] = $v;
						break;
					case self::type:
						$_['type'] = $v;
						break;
					case self::useMap:
						$_['useMap'] = $v;
						break;
					case self::width:
						$_['width'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}