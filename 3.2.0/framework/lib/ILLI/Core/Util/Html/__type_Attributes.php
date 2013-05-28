<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	USE ILLI\Core\Util\String;
	
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
						$_[__name_Attributes::DOM_accessKey] = $v;
						break;
					case self::cssClass:
						if([] === $v)
							continue;
						
						$_[__name_Attributes::DOM_class] = implode(' ', array_unique($v));
						break;
					case self::contentEditable:
						$_[__name_Attributes::DOM_contentEditable] = $v;
						break;
					case self::contextMenu:
						$_[__name_Attributes::DOM_contextMenu] = $v;
						break;
					case self::data:
						if([] === $v)
							continue;
						
						foreach($v as $l => $w)
							$_[String::insert(__name_Attributes::DOM_data__, ['key' => $l])] = $w;
						
						continue;
						break;
					case self::dir:
						if(FALSE === in_array($v, ['ltr', 'rtl', 'auto']))
							continue;
							
						$_[__name_Attributes::DOM_dir] = $v;
						break;
					case self::draggable:
						$_[__name_Attributes::DOM_draggable] = $v;
						break;
					case self::dropzone:
						if(FALSE === in_array($v, ['copy', 'move', 'link']))
							continue;
							
						$_[__name_Attributes::DOM_dropzone] = $v;
						break;
					case self::hidden:
						$_[__name_Attributes::DOM_hidden] = $v;
						break;
					case self::id:
						$_[__name_Attributes::DOM_id] = $v;
						break;
					case self::itemId:
						$_[__name_Attributes::DOM_itemId] = $v;
						break;
					case self::itemProp:
						$_[__name_Attributes::DOM_itemProp] = $v;
						break;
					case self::itemRef:
						$_[__name_Attributes::DOM_itemRef] = $v;
						break;
					case self::itemScope:
						$_[__name_Attributes::DOM_itemScope] = $v;
						break;
					case self::itemType:
						$_[__name_Attributes::DOM_itemType] = $v;
						break;
					case self::lang:
						$_[__name_Attributes::DOM_itemLang] = $v;
						break;
					case self::spellCheck:
						$_[__name_Attributes::DOM_spellCheck] = $v;
						break;
					case self::style:
						$_[__name_Attributes::DOM_style] = $v;
						break;
					case self::tabIndex:
						$_[__name_Attributes::DOM_tabIndex] = $v;
						break;
					case self::title:
						$_[__name_Attributes::DOM_title] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}