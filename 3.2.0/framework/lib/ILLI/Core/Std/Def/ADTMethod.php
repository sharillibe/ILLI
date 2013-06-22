<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\String;
	USE Exception;
	
	FINAL CLASS ADTMethod EXTENDS \ILLI\Core\Std\Def\ADT
	{
		public function __construct()
		{
			parent::__construct([__const_Type::SPL_METHOD]);
		}
		
		public function validate($__value)
		{
			$t = getType($__value);
			
			if($t !==__const_Type::SPL_STRING && $t !==__const_Type::SPL_ARRAY)
				return FALSE;
			
			if(2 !== sizeOf($__value))
				return FALSE;
			
			list($c, $m) = $__value;
			
			if(is_string($c)
			&& FALSE === class_exists($c))
				return FALSE;
				
			if(method_exists($c, $m))
				return TRUE;
			
			if(method_exists($c, '__call'))
				return TRUE;
				
			if(method_exists($c, '__callStatic'))
				return TRUE;
			
			return FALSE;
		}
	}