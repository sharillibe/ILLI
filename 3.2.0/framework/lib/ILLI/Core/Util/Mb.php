<?PHP
	NAMESPACE ILLI\Core\Util;
	
	CLASS Mb
	{
		public static function toCharArray($__string)
		{
			$s = mb_strlen($__string);
			$i = 1;
			$chrs = [];
			
			while($s > 0)
			{
				array_push($chrs, mb_substr($__string, 0, $i));
				
				$__string	= mb_substr($__string, $i, $s);
				$s		= mb_strlen($__string);
			}
			
			return $chrs;
		}
		
		public static function rev($__string)
		{
			return implode('', array_reverse(self::toCharArray($__string)));
		}
	}