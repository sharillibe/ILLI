<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Iframe EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST allowFullScreen	= __addr_Attributes::IFRAME_allowFullScreen;
		CONST height		= __addr_Attributes::IFRAME_height;
		CONST name		= __addr_Attributes::IFRAME_name;
		CONST sandbox		= __addr_Attributes::IFRAME_sandbox;
		CONST seamless		= __addr_Attributes::IFRAME_seamless;
		CONST src		= __addr_Attributes::IFRAME_src;
		CONST width		= __addr_Attributes::IFRAME_width;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::allowFullScreen	=> __const_Type::SPL_BOOLEAN,
				self::height		=> __const_Type::SPL_LONG,
				self::name		=> __const_Type::SPL_STRING,
				self::sandbox		=> __const_Type::SPL_STRING,
				self::seamless		=> __const_Type::SPL_BOOLEAN,
				self::src		=> __const_Type::SPL_STRING,
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
					case self::allowFullScreen:
						$_[__name_Attributes::DOM_allowFullScreen] = $v;
						break;
					case self::height:
						$_[__name_Attributes::DOM_height] = $v;
						break;
					case self::name:
						$_[__name_Attributes::DOM_name] = $v;
						break;
					case self::sandbox:
						$_[__name_Attributes::DOM_sandbox] = $v;
						break;
					case self::seamless:
						$_[__name_Attributes::DOM_seamless] = $v;
						break;
					case self::src:
						$_[__name_Attributes::DOM_src] = $v;
						break;
					case self::width:
						$_[__name_Attributes::DOM_width] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}