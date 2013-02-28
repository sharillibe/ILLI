<?PHP
	NAMESPACE ILLI\Core\Util;

	CLASS Bc
	{
		public static function isOdd($__operand)
		{
			return !self::isEven($__operand);
		}
		
		public static function isEven($__operand)
		{
			return self::mod($__operand, '2') === '0';
		}
		
		public static function invmod($__operand, $__modulus)
		{
			$i = $__operand; $m = $__modulus; $n = $m; $x = $ly = '0'; $y = $lx = '1';
		
			while($m)
			{
				$t = $m;
				$q = self::div($i, $m, 0);
				$m = self::mod($i, $m);
				$i = $t;
				
				$t = $x;
				$x = self::sub($lx, self::mod(self::mul($q, $x), $n));
				$lx = $t;
				
				$t = $y;
				$y = self::sub($ly, self::mod(self::mul($q, $y), $n));
				$ly = $t;
			}
		
			return (self::comp($lx, 0) === -1)
				? self::add($lx, $n)
				: $lx;
		}
		
		public static function gcd($__left, $__right)
		{
			$a = $__left;
			$b = $__right;
			
			if($a < $b)
			{
				$t = $b;
				$b = $a;
				$a = $t;
				unset($t);
			}
			
			return self::mod($a, $b) === '0'
				? $b
				: self::gcd($b, self::mod($a, $b));
		}
		
		public static function hexdec($__operand)
		{
			$h = self::floor($__operand);
			if(strlen($h) === 1)
				return hexdec($__operand);
		
			$r = substr($h, 0, -1);
			$l = substr($h, -1);
			return self::add(self::mul(16, self::hexdec($r)), hexdec($l));
		}
		
		public static function dechex($__operand)
		{
			$d = self::floor($__operand);
			$l = self::mod($d, 16);
			$r = self::div(self::sub($d, $l), 16, 0);
		
			if($r === '0')
				return dechex($l);
				
			return self::dechex($r).dechex($l);
		}
		
		public static function sl($__operand, $__bits)
		{
			return self::mul(self::floor($__operand), self::pow('2', self::floor($__bits)));
		}
		
		public static function sr($__operand, $__bits)
		{
			return self::div(self::floor($__operand), self::pow('2', self::floor($__bits)));
		}
		
		public static function fac($__operand, $__scale = 32)
		{
			if(intval($__operand) === 1)
				return 1;
			
			return self::mul($__operand, self::fac(self::sub($__operand, '1'), $__scale), $__scale);
		}
		
		public static function exp($__operand, $___iterations = 7, $___scale = 32)
		{
			$r = bcadd('1.0', $__operand, $___scale); // Compute e^x.
			
			for($i = 0; $i < $___iterations; $i++)
				$r += self::div(self::pow($__operand, self::add($i, '2'), $___scale), self::fact(self::add($i, '2'), $___scale), $___scale);
				
			return $r;
		}
		
		public static function ln($__operand, $___iterations = 10, $__scale = 32)
		{
			$r = '0.0';	// (n^-1) * ((n - 1) / (n + 1))^(1 / (1 + (i * 2))), {i=0,1,2,…}
		
			for($i = 0; $i < $___iterations; $i++) 
			{
				$p = self::add('1.0', self::mul('2.0', $i, $__scale), $__scale); 					// 1 + (i * 2)
				$m = self::div('1.0', $p, $__scale);									// 1/p
				$b = self::div(self::sub($__operand, '1.0', $__scale), self::add($__operand, '1.0', $scale), $__scale);	// (n - 1) / (n + 1)
				$f = self::mul($m, self::pow($b, $p, $__scale), $__scale);						// m * b^p
				$r = self::add($f, $r, $__scale);									// f + {i=0,1,2,…}
			}
			
			return self::mul('2.0', $r, $__scale);
		}
		
		public static function powx($__left, $__right, $___iterations = 25, $__scale = 32)
		{
			return self::exp(self::mul(self::ln($__left, $___iterations, $__scale), $__right, $__scale), $___iterations, $scale);
		}
		
		public static function floor($__operand, $__scale = 0)
		{
			return self::mul($__operand, '1.0', $__scale);
		}
		
		public static function add($__left, $__right, $__scale = 0)
		{
			return bcadd($__left, $__right, $__scale);
		}
		
		public static function comp($__left, $__right, $__scale = 0)
		{
			return bccomp($__left, $__right, $__scale);
		}
		
		public static function div($__left, $__right, $__scale = 32)
		{
			return bcdiv($__left, $__right, $__scale);
		}
		
		public static function mod($__operand, $__modulus)
		{
			return bcmod($__operand, $__modulus);
		}
		
		public static function mul($__left, $__right, $__scale = 0)
		{
			return bcmul($__left, $__right, $__scale);
		}
		
		public static function pow($__left, $__right, $__scale = 0)
		{
			return bcpow($__left, $__right, $__scale);
		}
		
		public static function powmod($__left, $__right, $__modulus, $__scale = 0)
		{
			return bcpowmod($__left, $__right, $__modulus, $__scale);
		}
		
		public static function sqrt($__operand, $__scale = 0)
		{
			return bcsqrt($__operand, $__scale);
		}
		
		public static function sub($__left, $__right, $__scale = 0)
		{
			return bcsub($__left, $__right, $__scale);
		}
	}