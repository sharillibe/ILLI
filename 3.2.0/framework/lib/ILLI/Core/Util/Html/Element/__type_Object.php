<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	
	CLASS __type_Object EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST data		= __addr_Attributes::OBECT_data;
		CONST form		= __addr_Attributes::OBECT_form;
		CONST height		= __addr_Attributes::OBECT_height;
		CONST name		= __addr_Attributes::OBECT_name;
		CONST type		= __addr_Attributes::OBECT_type;
		CONST useMap		= __addr_Attributes::OBECT_useMap;
		CONST width		= __addr_Attributes::OBECT_width;
		
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