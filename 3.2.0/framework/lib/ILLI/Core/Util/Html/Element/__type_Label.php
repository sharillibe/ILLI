<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Label EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST forId		= __addr_Attributes::LABEL_for;
		CONST form		= __addr_Attributes::LABEL_form;
		
		protected static $__keywordAlias =
		[
			__name_Attributes::DOM_for => 'forId'
		];
		
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
						$_[__name_Attributes::DOM_for] = $v;
						break;
					case self::form:
						$_[__name_Attributes::DOM_form] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}