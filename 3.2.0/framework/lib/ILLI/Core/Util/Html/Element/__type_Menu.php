<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	
	CLASS __type_Menu EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST type		= __addr_Attributes::MENU_type;
		CONST label		= __addr_Attributes::MENU_label;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::type		=> __const_Type::SPL_STRING, // enum: context, toolbar, list
				self::label		=> __const_Type::SPL_STRING
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
					case self::type:
						if(FALSE === in_array($v, ['context', 'toolbar', 'list']))
							continue;
						
						$_['type'] = $v;
						break;
					case self::label:
						$_['label'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}