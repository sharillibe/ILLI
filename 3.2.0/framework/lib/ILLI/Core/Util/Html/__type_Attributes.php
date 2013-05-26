<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\String;
	
	CLASS __type_Attributes EXTENDS \ILLI\Core\Std\Def\ADVTuple
	{
		CONST accesskey		= 0x00;
		CONST cssClass		= 0x01;
		CONST contenteditable	= 0x02;
		CONST contextmenu	= 0x03;
		CONST data		= 0x04;
		CONST dir		= 0x05;
		CONST draggable		= 0x06;
		CONST dropzone		= 0x07;
		CONST hidden		= 0x08;
		CONST id		= 0x09;
		CONST itemid		= 0x0A;
		CONST itemprop		= 0x0B;
		CONST itemref		= 0x0C;
		CONST itemscope		= 0x0D;
		CONST itemtype		= 0x0E;
		CONST lang		= 0x0F;
		CONST spellcheck	= 0x10;
		CONST style		= 0x11;
		CONST tabindex		= 0x12;
		CONST title		= 0x13;
		
		protected static $__format =
		[
			'format'	=> '{:key}="{:value}"',
			'delimeter'	=> ' '
		];
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::accesskey		=> __const_Type::SPL_STRING,
				self::cssClass		=> __const_Type::SPL_ARRAY,
				self::contenteditable	=> __const_Type::SPL_BOOLEAN,
				self::contextmenu	=> __const_Type::SPL_STRING,
				self::data		=> __const_Type::SPL_ARRAY,
				self::dir		=> __const_Type::SPL_STRING,
				self::draggable		=> __const_Type::SPL_BOOLEAN,
				self::dropzone		=> __const_Type::SPL_STRING, // enum: copy, move, link
				self::hidden		=> __const_Type::SPL_BOOLEAN,
				self::id		=> __const_Type::SPL_STRING,
				self::itemid		=> __const_Type::SPL_STRING,
				self::itemprop		=> __const_Type::SPL_STRING,
				self::itemref		=> __const_Type::SPL_STRING,
				self::itemscope		=> __const_Type::SPL_STRING,
				self::itemtype		=> __const_Type::SPL_STRING,
				self::lang		=> __const_Type::SPL_STRING,
				self::spellcheck	=> __const_Type::SPL_BOOLEAN,
				self::style		=> __const_Type::SPL_STRING,
				self::tabindex		=> __const_Type::SPL_LONG,
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
					case self::accesskey:
						$_['accesskey'] = $v;
						break;
					case self::cssClass:
						if([] === $v)
							continue;
						
						$_['class'] = implode(' ', array_unique($v));
						break;
					case self::contenteditable:
						$_['contenteditable'] = $v === TRUE ? 'true' : 'false';
						break;
					case self::contextmenu:
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
						$_['dir'] = $v;
						break;
					case self::draggable:
						$_['draggable'] = $v === TRUE ? 'true' : 'false';
						break;
					case self::dropzone:
						if(FALSE === in_array($v, ['copy', 'move', 'link']))
							continue;
							
						$_['dropzone'] = $v;
						break;
					case self::hidden:
						$_['hidden'] = $v === TRUE ? 'true' : 'false';
						break;
					case self::id:
						$_['id'] = $v;
						break;
					case self::itemid:
						$_['itemid'] = $v;
						break;
					case self::itemprop:
						$_['itemprop'] = $v;
						break;
					case self::itemref:
						$_['itemref'] = $v;
						break;
					case self::itemscope:
						$_['itemscope'] = $v;
						break;
					case self::itemtype:
						$_['itemtype'] = $v;
						break;
					case self::lang:
						$_['lang'] = $v;
						break;
					case self::spellcheck:
						$_['spellcheck'] = $v === TRUE ? 'true' : 'false';
						break;
					case self::style:
						$_['style'] = $v;
						break;
					case self::tabindex:
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
			return [] !== ($_ = $this->toArray())
				? String::attribute($_, static::$__format)
				: NULL;
		}
	}