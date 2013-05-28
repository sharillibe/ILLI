<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Body EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST onAfterPrint	= __addr_Attributes::BODY_onAfterPrint;
		CONST onBeforePrint	= __addr_Attributes::BODY_onBeforePrint;
		CONST onBeforeUnload	= __addr_Attributes::BODY_onBeforeUnload;
		CONST onBlur		= __addr_Attributes::BODY_onBlur;
		CONST onError		= __addr_Attributes::BODY_onError;
		CONST onFocus		= __addr_Attributes::BODY_onFocus;
		CONST onHashChange	= __addr_Attributes::BODY_onHashChange;
		CONST onLoad		= __addr_Attributes::BODY_onLoad;
		CONST onMessage		= __addr_Attributes::BODY_onMessage;
		CONST onOffline		= __addr_Attributes::BODY_onOffline;
		CONST onOnline		= __addr_Attributes::BODY_onOnline;
		CONST onPopState	= __addr_Attributes::BODY_onPopState;
		CONST onRedo		= __addr_Attributes::BODY_onRedo;
		CONST onResize		= __addr_Attributes::BODY_onResize;
		CONST onStorage		= __addr_Attributes::BODY_onStorage;
		CONST onUndo		= __addr_Attributes::BODY_onUndo;
		CONST onUnload		= __addr_Attributes::BODY_onUnload;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::onAfterPrint	=> [__const_Type::SPL_STRING],
				self::onBeforePrint	=> [__const_Type::SPL_STRING],
				self::onBeforeUnload	=> [__const_Type::SPL_STRING],
				self::onBlur		=> [__const_Type::SPL_STRING],
				self::onError		=> [__const_Type::SPL_STRING],
				self::onFocus		=> [__const_Type::SPL_STRING],
				self::onHashChange	=> [__const_Type::SPL_STRING],
				self::onLoad		=> [__const_Type::SPL_STRING],
				self::onMessage		=> [__const_Type::SPL_STRING],
				self::onOffline		=> [__const_Type::SPL_STRING],
				self::onOnline		=> [__const_Type::SPL_STRING],
				self::onPopState	=> [__const_Type::SPL_STRING],
				self::onRedo		=> [__const_Type::SPL_STRING],
				self::onResize		=> [__const_Type::SPL_STRING],
				self::onStorage		=> [__const_Type::SPL_STRING],
				self::onUndo		=> [__const_Type::SPL_STRING],
				self::onUnload		=> [__const_Type::SPL_STRING]
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
					case self::onAfterPrint:
						$_[__name_Attributes::DOM_onAfterPrint] = $v;
						break;
					case self::onBeforePrint:
						$_[__name_Attributes::DOM_onBeforePrint] = $v;
						break;
					case self::onBeforeUnload:
						$_[__name_Attributes::DOM_onBeforeUnload] = $v;
						break;
					case self::onBlur:
						$_[__name_Attributes::DOM_onBlur] = $v;
						break;
					case self::onError:
						$_[__name_Attributes::DOM_onError] = $v;
						break;
					case self::onFocus:
						$_[__name_Attributes::DOM_onFocus] = $v;
						break;
					case self::onHashChange:
						$_[__name_Attributes::DOM_onHashChange] = $v;
						break;
					case self::onLoad:
						$_[__name_Attributes::DOM_onLoad] = $v;
						break;
					case self::onMessage:
						$_[__name_Attributes::DOM_onMessage] = $v;
						break;
					case self::onOffline:
						$_[__name_Attributes::DOM_onOffline] = $v;
						break;
					case self::onOnline:
						$_[__name_Attributes::DOM_onOnline] = $v;
						break;
					case self::onPopState:
						$_[__name_Attributes::DOM_onPopState] = $v;
						break;
					case self::onRedo:
						$_[__name_Attributes::DOM_onRedo] = $v;
						break;
					case self::onResize:
						$_[__name_Attributes::DOM_onResize] = $v;
						break;
					case self::onStorage:
						$_[__name_Attributes::DOM_onStorage] = $v;
						break;
					case self::onUndo:
						$_[__name_Attributes::DOM_onUndo] = $v;
						break;
					case self::onUnload:
						$_[__name_Attributes::DOM_onUnload] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}