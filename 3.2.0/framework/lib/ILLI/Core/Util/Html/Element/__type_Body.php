<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	
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
				self::onAfterPrint	=> __const_Type::SPL_STRING,
				self::onBeforePrint	=> __const_Type::SPL_STRING,
				self::onBeforeUnload	=> __const_Type::SPL_STRING,
				self::onBlur		=> __const_Type::SPL_STRING,
				self::onError		=> __const_Type::SPL_STRING,
				self::onFocus		=> __const_Type::SPL_STRING,
				self::onHashChange	=> __const_Type::SPL_STRING,
				self::onLoad		=> __const_Type::SPL_STRING,
				self::onMessage		=> __const_Type::SPL_STRING,
				self::onOffline		=> __const_Type::SPL_STRING,
				self::onOnline		=> __const_Type::SPL_STRING,
				self::onPopState	=> __const_Type::SPL_STRING,
				self::onRedo		=> __const_Type::SPL_STRING,
				self::onResize		=> __const_Type::SPL_STRING,
				self::onStorage		=> __const_Type::SPL_STRING,
				self::onUndo		=> __const_Type::SPL_STRING,
				self::onUnload		=> __const_Type::SPL_STRING
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
						$_['onafterprint'] = $v;
						break;
					case self::onBeforePrint:
						$_['onbeforeprint'] = $v;
						break;
					case self::onBeforeUnload:
						$_['onbeforeunload'] = $v;
						break;
					case self::onBlur:
						$_['onblur'] = $v;
						break;
					case self::onError:
						$_['onerror'] = $v;
						break;
					case self::onFocus:
						$_['onfocus'] = $v;
						break;
					case self::onHashChange:
						$_['onhashchange'] = $v;
						break;
					case self::onLoad:
						$_['onload'] = $v;
						break;
					case self::onMessage:
						$_['onmessage'] = $v;
						break;
					case self::onOffline:
						$_['onoffline'] = $v;
						break;
					case self::onOnline:
						$_['ononline'] = $v;
						break;
					case self::onPopState:
						$_['onpopstate'] = $v;
						break;
					case self::onRedo:
						$_['onredo'] = $v;
						break;
					case self::onResize:
						$_['onresize'] = $v;
						break;
					case self::onStorage:
						$_['onstorage'] = $v;
						break;
					case self::onUndo:
						$_['onundo'] = $v;
						break;
					case self::onUnload:
						$_['onunload'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}