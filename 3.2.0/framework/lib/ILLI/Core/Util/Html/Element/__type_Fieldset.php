<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Fieldset EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST disabled		= 0x14;
		CONST form		= 0x15;
		CONST name		= 0x16;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::disabled		=> __const_Type::SPL_BOOLEAN,
				self::form		=> __const_Type::SPL_STRING,
				self::name		=> __const_Type::SPL_STRING
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
					case self::disabled:
						$_['disabled'] = $v;
						break;
					case self::form:
						$_['form'] = $v;
						break;
					case self::name:
						$_['name'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}