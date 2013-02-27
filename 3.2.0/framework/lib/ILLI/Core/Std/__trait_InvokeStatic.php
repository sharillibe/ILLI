<?PHP
	NAMESPACE ILLI\Core\Std;
	USE ILLI\Core\Exception;
	USE ILLI\Core\Std\Reflection\SplMethod;
	
	TRAIT __trait_InvokeStatic
	{
		protected function Core_Std___trait_InvokeStatic_emit($__functionName, array $__arguments = [])
		{
			$arguments = array_values($__arguments);
			
			if([] === $arguments)
				return static::$__functionName();
			
			switch(count($arguments)):
				case 1:
					return static::$__functionName
					(
						$arguments[0]
					);
					break;
				case 2:
					return static::$__functionName
					(
						$arguments[0],
						$arguments[1]
					);
					break;
				case 3:
					return static::$__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2]
					);
					break;
				case 4:
					return static::$__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2],
						$arguments[3]
					);
					break;
				case 5:
					return static::$__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2],
						$arguments[3],
						$arguments[4]
					);
					break;
				case 6:
					return static::$__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2],
						$arguments[3],
						$arguments[4],
						$arguments[5]
					);
					break;
				case 7:
					return static::$__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2],
						$arguments[3],
						$arguments[4],
						$arguments[5],
						$arguments[6]
					);
					break;
				case 8:
					return static::$__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2],
						$arguments[3],
						$arguments[4],
						$arguments[5],
						$arguments[6],
						$arguments[7]
					);
					break;
				case 9:
					return static::$__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2],
						$arguments[3],
						$arguments[4],
						$arguments[5],
						$arguments[6],
						$arguments[7],
						$arguments[8]
					);
					break;
				case 10:
					return static::$__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2],
						$arguments[3],
						$arguments[4],
						$arguments[5],
						$arguments[6],
						$arguments[7],
						$arguments[8],
						$arguments[9]
					);
					break;
				case 11:
					return static::$__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2],
						$arguments[3],
						$arguments[4],
						$arguments[5],
						$arguments[6],
						$arguments[7],
						$arguments[8],
						$arguments[9],
						$arguments[10]
					);
					break;
				case 12:
					return static::$__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2],
						$arguments[3],
						$arguments[4],
						$arguments[5],
						$arguments[6],
						$arguments[7],
						$arguments[8],
						$arguments[9],
						$arguments[10],
						$arguments[11]
					);
					break;
				case 13:
					return static::$__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2],
						$arguments[3],
						$arguments[4],
						$arguments[5],
						$arguments[6],
						$arguments[7],
						$arguments[8],
						$arguments[9],
						$arguments[10],
						$arguments[11],
						$arguments[12]
					);
					break;
				case 14:
					return static::$__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2],
						$arguments[3],
						$arguments[4],
						$arguments[5],
						$arguments[6],
						$arguments[7],
						$arguments[8],
						$arguments[9],
						$arguments[10],
						$arguments[11],
						$arguments[12],
						$arguments[13]
					);
					break;
				case 15:
					return static::$__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2],
						$arguments[3],
						$arguments[4],
						$arguments[5],
						$arguments[6],
						$arguments[7],
						$arguments[8],
						$arguments[9],
						$arguments[10],
						$arguments[11],
						$arguments[12],
						$arguments[13],
						$arguments[14]
					);
					break;
				case 16:
					return static::$__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2],
						$arguments[3],
						$arguments[4],
						$arguments[5],
						$arguments[6],
						$arguments[7],
						$arguments[8],
						$arguments[9],
						$arguments[10],
						$arguments[11],
						$arguments[12],
						$arguments[13],
						$arguments[14],
						$arguments[15]
					);
					break;
			endswitch;
			
			return (new SplMethod($this, $__functionName))->invokeArgs($this, $arguments);
		}
	}