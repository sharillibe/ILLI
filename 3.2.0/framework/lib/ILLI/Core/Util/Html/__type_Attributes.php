<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\String;
	
	CLASS __type_Attributes EXTENDS \ILLI\Core\Std\Def\ADVTuple
	{
		CONST accessKey		= 0x00;
		CONST cssClass		= 0x01;
		CONST contentEditable	= 0x02;
		CONST contextMenu	= 0x03;
		CONST data		= 0x04;
		CONST dir		= 0x05;
		CONST draggable		= 0x06;
		CONST dropzone		= 0x07;
		CONST hidden		= 0x08;
		CONST id		= 0x09;
		CONST itemId		= 0x0A;
		CONST itemProp		= 0x0B;
		CONST itemRef		= 0x0C;
		CONST itemScope		= 0x0D;
		CONST itemType		= 0x0E;
		CONST lang		= 0x0F;
		CONST spellCheck	= 0x10;
		CONST style		= 0x11;
		CONST tabIndex		= 0x12;
		CONST title		= 0x13;
		
		protected static $__format =
		[
			'format'	=> '{:key}="{:value}"',
			'delimeter'	=> ' '
		];
		
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
		
		public function render()
		{
			return [] === ($_ = $this->toArray())
				? NULL
				: String::attribute($_, static::$__format, function($value, $key, $options)
				{
					if(FALSE === $value)
						return NULL;
						
					if(TRUE === $value)
						$value = $key;
						
					return String::insert($options['format'], ['key' => $key, 'value' => $value]);
				});
		}
	}