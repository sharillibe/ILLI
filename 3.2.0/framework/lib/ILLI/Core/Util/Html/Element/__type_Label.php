<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Label EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST forId		= 0x14; // for
		CONST form		= 0x15;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::forId		=> __const_Type::SPL_STRING,
				self::form		=> __const_Type::SPL_STRING
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
					case self::forId:
						$_['for'] = $v;
						break;
					case self::form:
						$_['form'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}