<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Progress EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST max		= 0x14;
		CONST value		= 0x15;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::max		=> [__const_Type::SPL_LONG, __const_Type::SPL_DOUBLE]
				self::value		=> [__const_Type::SPL_LONG, __const_Type::SPL_DOUBLE]
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
					case self::max:
						$_['max'] = $v;
						break;
					case self::value:
						$_['value'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}