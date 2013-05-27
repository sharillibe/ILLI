<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__const_AttrIndex;
	
	CLASS __type_Attributes EXTENDS ElementAttributes
	{
		CONST accessKey		= __addr_Attributes::GLOB_accessKey;
		CONST cssClass		= __addr_Attributes::GLOB_class;
		CONST contentEditable	= __addr_Attributes::GLOB_contentEditable;
		CONST contextMenu	= __addr_Attributes::GLOB_contextMenu;
		CONST data		= __addr_Attributes::GLOB_data;
		CONST dir		= __addr_Attributes::GLOB_dir;
		CONST draggable		= __addr_Attributes::GLOB_draggable;
		CONST dropzone		= __addr_Attributes::GLOB_dropzone;
		CONST hidden		= __addr_Attributes::GLOB_hidden;
		CONST id		= __addr_Attributes::GLOB_id;
		CONST itemId		= __addr_Attributes::GLOB_itemId;
		CONST itemProp		= __addr_Attributes::GLOB_itemProp;
		CONST itemRef		= __addr_Attributes::GLOB_itemRef;
		CONST itemScope		= __addr_Attributes::GLOB_itemScope;
		CONST itemType		= __addr_Attributes::GLOB_itemType;
		CONST lang		= __addr_Attributes::GLOB_lang;
		CONST spellCheck	= __addr_Attributes::GLOB_spellCheck;
		CONST style		= __addr_Attributes::GLOB_style;
		CONST tabIndex		= __addr_Attributes::GLOB_tabIndex;
		CONST title		= __addr_Attributes::GLOB_title;
		
		/**
		 * global HTML attributes
		 *
		 * @see ILLI\Core\Util\Html\__type_WAI
		 */
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::accessKey		=> __const_Type::SPL_STRING,
				self::cssClass		=> __const_Type::SPL_ARRAY,
				self::contentEditable	=> __const_Type::SPL_BOOLEAN,
				self::contextMenu	=> __const_Type::SPL_STRING,
				self::data		=> __const_Type::SPL_ARRAY,
				self::dir		=> __const_Type::SPL_STRING, // enum: ltr, trl, auto
				self::draggable		=> __const_Type::SPL_BOOLEAN,
				self::dropzone		=> __const_Type::SPL_STRING, // enum: copy, move, link
				self::hidden		=> __const_Type::SPL_BOOLEAN,
				self::id		=> __const_Type::SPL_STRING,
				self::itemId		=> __const_Type::SPL_STRING,
				self::itemProp		=> __const_Type::SPL_STRING,
				self::itemRef		=> __const_Type::SPL_STRING,
				self::itemScope		=> __const_Type::SPL_STRING,
				self::itemType		=> __const_Type::SPL_STRING,
				self::lang		=> __const_Type::SPL_STRING,
				self::spellCheck	=> __const_Type::SPL_BOOLEAN,
				self::style		=> __const_Type::SPL_STRING,
				self::tabIndex		=> __const_Type::SPL_LONG,
				self::title		=> __const_Type::SPL_STRING,
			]), $__data);
		}
		
		public function toArray()
		{
			if(NULL === $this->__data)
				return [];
				
			$_ = [];
			
			foreach($this->getTupleGC() as $k => $GC)
			{
				if(NULL === ($v = $this->__data[$k]))
					continue;
				
				switch($k):
					case self::accessKey:
						$_['accesskey'] = $v;
						break;
					case self::cssClass:
						if([] === $v)
							continue;
						
						$_['class'] = implode(' ', array_unique($v));
						break;
					case self::contentEditable:
						$_['contenteditable'] = $v;
						break;
					case self::contextMenu:
						$_['contextmenu'] = $v;
						break;
					case self::data:
						if([] === $v)
							continue;
						
						foreach($v as $l => $w)
							$_['data-'.$l] = $w;
						
						continue;
						break;
					case self::dir:
						if(FALSE === in_array($v, ['ltr', 'rtl', 'auto']))
							continue;
							
						$_['dir'] = $v;
						break;
					case self::draggable:
						$_['draggable'] = $v;
						break;
					case self::dropzone:
						if(FALSE === in_array($v, ['copy', 'move', 'link']))
							continue;
							
						$_['dropzone'] = $v;
						break;
					case self::hidden:
						$_['hidden'] = $v;
						break;
					case self::id:
						$_['id'] = $v;
						break;
					case self::itemId:
						$_['itemid'] = $v;
						break;
					case self::itemProp:
						$_['itemprop'] = $v;
						break;
					case self::itemRef:
						$_['itemref'] = $v;
						break;
					case self::itemScope:
						$_['itemscope'] = $v;
						break;
					case self::itemType:
						$_['itemtype'] = $v;
						break;
					case self::lang:
						$_['lang'] = $v;
						break;
					case self::spellCheck:
						$_['spellcheck'] = $v;
						break;
					case self::style:
						$_['style'] = $v;
						break;
					case self::tabIndex:
						$_['tabindex'] = $v;
						break;
					case self::title:
						$_['title'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}