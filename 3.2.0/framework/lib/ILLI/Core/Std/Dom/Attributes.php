<?PHP
	NAMESPACE ILLI\Core\Std\Dom;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\String;
	
	CLASS Attributes EXTENDS \ILLI\Core\Std\Def\ADVTuple
	{
		CONST id		= 0x00;
		CONST cssClass		= 0x01;
		CONST data		= 0x02;
		
		protected static $__format =
		[
			'format'	=> '{:key}="{:value}"',
			'delimeter'	=> ' '
		];
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes([
				self::id		=> __const_Type::SPL_STRING,
				self::cssClass		=> __const_Type::SPL_ARRAY,
				self::data		=> __const_Type::SPL_ARRAY
			], $__defineOffsetType), (array) $__data + 
			[
				self::id		=> '',
				self::cssClass		=> [],
				self::data		=> []
			]);
		}
		
		public function render()
		{
			$att = [];
			
			$id = $this->id;
			'' === $id ?: $att['id'] = $id;
			
			$class = $this->cssClass;
			[] === $class ?: $att['class'] = implode(' ', array_unique($class));
			
			$data = $this->data;
			if([] !== $data)
			{
				foreach($data as $k => $v)
					$att['data-'.$k] = $v;
			}
			
			return [] !== $att
				? String::attribute($att, static::$__format)
				: NULL;
		}
	}