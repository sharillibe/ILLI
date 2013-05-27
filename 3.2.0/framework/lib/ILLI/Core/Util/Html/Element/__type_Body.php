<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Body EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST onAfterPrint	= 0x14;
		CONST onBeforePrint	= 0x15;
		CONST onBeforeUnload	= 0x16;
		CONST onBlur		= 0x17;
		CONST onError		= 0x18;
		CONST onFocus		= 0x19;
		CONST onHashChange	= 0x1A;
		CONST onLoad		= 0x1B;
		CONST onMessage		= 0x1C;
		CONST onOffline		= 0x1D;
		CONST onOnline		= 0x1E;
		CONST onPopState	= 0x1F;
		CONST onRedo		= 0x20;
		CONST onResize		= 0x21;
		CONST onStorage		= 0x22;
		CONST onUndo		= 0x23;
		CONST onUnload		= 0x24;
		
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