<?PHP
	NAMESPACE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Exception;
	USE ILLI\Core\Std\Reflection\SplFunction;
	
	TRAIT __trait_Function
	{
		protected static function Core_Std_Invoke___trait_Function_emit($__functionName, array $__arguments = [])
		{
			$arguments = array_values($__arguments);
			
			switch($__functionName):
				case 'require':
				case 'require_once':
				case 'include':
				case 'include_once':
					
					$return = [];
					foreach($__arguments as $file)
					{
						switch($__functionName):
							case 'require':
								$return[] = require $file;
								break;
							case 'require_once':
								$return[] = require_once $file;
								break;
							case 'include':
								$return[] = include $file;
								break;
							case 'include_once':
								$return[] = include_once $file;
								break;
						endswitch;
					}
					
					return $return;
			endswitch;
			
			if([] === $arguments)
				return $__functionName();
				
			
			switch(count($arguments)):
				case 1:
					return $__functionName
					(
						$arguments[0]
					);
					break;
				case 2:
					return $__functionName
					(
						$arguments[0],
						$arguments[1]
					);
					break;
				case 3:
					return $__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2]
					);
					break;
				case 4:
					return $__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2],
						$arguments[3]
					);
					break;
				case 5:
					return $__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2],
						$arguments[3],
						$arguments[4]
					);
					break;
				case 6:
					return $__functionName
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
					return $__functionName
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
					return $__functionName
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
					return $__functionName
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
					return $__functionName
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
					return $__functionName
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
					return $__functionName
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
					return $__functionName
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
					return $__functionName
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
					return $__functionName
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
					return $__functionName
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
			
			return (new SplFunction($__functionName))->invokeArgs($arguments);
		}
	}