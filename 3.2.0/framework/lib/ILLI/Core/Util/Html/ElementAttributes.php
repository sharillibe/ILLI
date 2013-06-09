<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\String;
	
	CLASS ElementAttributes EXTENDS \ILLI\Core\Std\Def\ADVTuple
	{
		protected static $__format =
		[
			'format'	=> '{:key}="{:value}"',
			'delimeter'	=> ' '
		];
		
		/**
		 * constant name for php keywords
		 *
		 * [class => [constantName => alias]]
		 */
		private static $__keywordAlias = [];
		
		public function toArray()
		{
			return NULL === ($r = $this->__data)
				? []
				: $r;
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
		
		public function __set($__constantName, $__value)
		{
			$a = &self::$__keywordAlias[get_called_class()][$__constantName];
			return parent::__set(isset($a) ? $a : $__constantName, $__value);
		}
		
		public function __get($__constantName)
		{
			$a = &self::$__keywordAlias[get_called_class()][$__constantName];
			return parent::__get(isset($a) ? $a : $__constantName);
		}
		
		protected function registerAlias($__constantName, $__alias)
		{
			self::$__keywordAlias[get_called_class()][$__constantName] = $__alias;
			return $this;
		}
	}