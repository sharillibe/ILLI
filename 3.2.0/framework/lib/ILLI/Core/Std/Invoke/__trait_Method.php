<?PHP
	NAMESPACE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Exception;
	USE ILLI\Core\Std\Reflection\SplMethod;
	
	/**
	 * Method Invokation.
	 */
	TRAIT __trait_Method
	{
		protected static function Core_Std_Invoke___trait_Method_emit($__Instance, $__functionName, array $__arguments = [], array $__options = [])
		{
			$__options += ['accessible' => FALSE];
			
			$arguments = array_values($__arguments);
			
			if(TRUE === $__options['accessible'])
			{
				$method = new ReflectionMethod($__Instance, $__functionName);
				$method->setAccessible(true);
				return $method->invokeArgs($__Instance, $arguments);
			}
			
			if([] === $arguments)
				return $__Instance->$__functionName();
			
			switch(count($arguments)):
				case 1:
					return $__Instance->$__functionName
					(
						$arguments[0]
					);
					break;
				case 2:
					return $__Instance->$__functionName
					(
						$arguments[0],
						$arguments[1]
					);
					break;
				case 3:
					return $__Instance->$__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2]
					);
					break;
				case 4:
					return $__Instance->$__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2],
						$arguments[3]
					);
					break;
				case 5:
					return $__Instance->$__functionName
					(
						$arguments[0],
						$arguments[1],
						$arguments[2],
						$arguments[3],
						$arguments[4]
					);
					break;
				case 6:
					return $__Instance->$__functionName
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
					return $__Instance->$__functionName
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
					return $__Instance->$__functionName
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
					return $__Instance->$__functionName
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
					return $__Instance->$__functionName
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
					return $__Instance->$__functionName
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
					return $__Instance->$__functionName
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
					return $__Instance->$__functionName
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
					return $__Instance->$__functionName
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
					return $__Instance->$__functionName
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
					return $__Instance->$__functionName
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
			
			return (new SplMethod($__Instance, $__functionName))->invokeArgs($__Instance, $arguments);
		}
	}