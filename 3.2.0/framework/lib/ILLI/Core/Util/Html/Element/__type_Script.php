<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	
	CLASS __type_Script EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST async		= __addr_Attributes::SCRIPT_async;
		CONST src		= __addr_Attributes::SCRIPT_src;
		CONST type		= __addr_Attributes::SCRIPT_type;
		CONST defer		= __addr_Attributes::SCRIPT_defer;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::async		=> __const_Type::SPL_BOOLEAN,
				self::src		=> __const_Type::SPL_STRING,
				self::type		=> __const_Type::SPL_STRING,
				self::defer		=> __const_Type::SPL_BOOLEAN
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
					case self::async:
						$_['async'] = $v;
						break;
					case self::src:
						$_['src'] = $v;
						break;
					case self::type:
						$_['type'] = $v;
						break;
					case self::defer:
						$_['defer'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}