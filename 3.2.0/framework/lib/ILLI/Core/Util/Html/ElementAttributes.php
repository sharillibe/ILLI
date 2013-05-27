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
	}