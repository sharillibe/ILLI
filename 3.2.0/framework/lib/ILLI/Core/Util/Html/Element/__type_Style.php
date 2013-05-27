<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	
	CLASS __type_Style EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST disabled		= __addr_Attributes::STYLE_disabled;
		CONST media		= __addr_Attributes::STYLE_media;
		CONST scoped		= __addr_Attributes::STYLE_scoped;
		CONST title		= __addr_Attributes::STYLE_title;
		CONST type		= __addr_Attributes::STYLE_type;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::disabled		=> __const_Type::SPL_BOOLEAN,
				self::media		=> __const_Type::SPL_STRING,
				self::scoped		=> __const_Type::SPL_BOOLEAN,
				self::title		=> __const_Type::SPL_STRING,
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
					case self::disabled:
						$_['disabled'] = $v;
						break;
					case self::media:
						$_['media'] = $v;
						break;
					case self::scoped:
						$_['scoped'] = $v;
						break;
					case self::title:
						$_['title'] = $v;
						break;
					case self::type:
						$_['type'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}