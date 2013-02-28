<?PHP
	NAMESPACE ILLI\Core\Util;
	USE ILLI\Core\Util\Bc;
	USE ILLI\Core\Util\Mb;
	
	CLASS Integer
	{
		protected static $__primes =
		[
			7, 71, 7177, 717719, 71771701, 7177177103, 717717717757, 71771771771779, 7177177177177153
		];
		
		protected static $__chars =
		[
			0x0030, 0x0031, 0x0032, 0x0033, 0x0034, 0x0035, 0x0036, 0x0037,
			0x0038, 0x0039, 0x0041, 0x0042, 0x0043, 0x0044, 0x0045, 0x0046,
			0x0047, 0x0048, 0x0049, 0x004A, 0x004B, 0x004C, 0x004D, 0x004E,
			0x004F, 0x0050, 0x0051, 0x0052, 0x0053, 0x0054, 0x0055, 0x0056,
			0x0057, 0x0058, 0x0059, 0x005A, 0x0061, 0x0062, 0x0063, 0x0064,
			0x0065, 0x0066, 0x0067, 0x0068, 0x0069, 0x006A, 0x006B, 0x006C,
			0x006D, 0x006E, 0x006F, 0x0070, 0x0071, 0x0072, 0x0073, 0x0074,
			0x0075, 0x0076, 0x0077, 0x0078, 0x0079, 0x007A
		];
		
		public static function encode($__num, $__len = NULL)
		{
			$chrs = implode('', array_map('chr', self::$__chars));
			
			$b = sizeOf(self::$__chars);			// base
			
			if(NULL !== $__len)
			{
				// normalize
				
				$n = Bc::floor($__num);			// number
				$l = Bc::floor($__len);			// pow
				$p = self::$__primes[$l];		// prime
				
				// encode: n * p mod b^l = d
				
				$m = Bc::pow($b, $l);			// mod b^l
				$d = Bc::mod(Bc::mul($n, $p), $m);	// n * p mod b^l
				
				unset($n, $l, $p, $m);
			}
			else
			{
				$d = $__num; 				// bypass prime-decode
			}
			
			// d to create base^n-string
			
			$s = [];
			
			while($d > 0)
			{
				
				array_unshift($s, chr(self::$__chars[Bc::mod($d, $b)]));	// prepend chr by d mod b
				$d = Bc::div($d, $b, 0);					// d = d/b
			}
			
			return implode('', $s);
		}
		
		public static function decode($__code, $__len = NULL)
		{
			$ords = array_flip(array_map('chr', self::$__chars));
			$chrs = Mb::toCharArray(Mb::rev($__code));
			
			// base^n-string to d
			
			$b = sizeOf(self::$__chars);
			$d = '';
			
			for($i = sizeOf($chrs); $i; $i--)
			{
				$h = $i - 1;
				$d = Bc::add($d, Bc::mul($ords[$chrs[$h]], Bc::pow($b, $h)));
			}
			
			unset($ords, $chrs, $h);
			
			if(NULL === $__len)
				return $d;			// bypass prime-decode
			
			// normalize
			
			$l = Bc::floor($__len);			// pow
			$p = Bc::floor(self::$__primes[$l]);	// prime
			
			// decode: d * (p^-1 mod b^l) mod b^l = n
			
			$m = Bc::pow($b, $l);			// mob b^l
			$i = Bc::invmod($p, $m);		// p^-1
			$n = Bc::mod(Bc::mul($d, $i), $m);	// d * (p^-1 mod b^l) mod b^l
			
			return $n;
		}
	}