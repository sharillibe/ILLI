<?PHP
	NAMESPACE ILLI\Core\Std;
	USE ILLI\Core\Std\Exception;
	USE Closure;
	
	CLASS Invoke
	{
		USE \ILLI\Core\Std\Invoke\__trait_Callable
		{
			Core_Std_Invoke___trait_Callable_emit	AS public emitCallable;
		}
		
		USE \ILLI\Core\Std\Invoke\__trait_Class
		{
			Core_Std_Invoke___trait_Class_emit	AS public emitClass;
		}
		
		USE \ILLI\Core\Std\Invoke\__trait_Method
		{
			Core_Std_Invoke___trait_Method_emit	AS public emitMethod;
		}
		
		USE \ILLI\Core\Std\Invoke\__trait_Static
		{
			Core_Std_Invoke___trait_Static_emit	AS public emitStatic;
		}
		
		USE \ILLI\Core\Std\Invoke\__trait_Function
		{
			Core_Std_Invoke___trait_Function_emit	AS public emitFunction;
		}
		
		/**
		 * emit normalized invokable array
		 *
		 *	string			-> __trait_Class_emit		-> new string()
		 *	string, array		-> __trait_Class_emit		-> new string(array)
		 *
		 *	object, string		-> __trait_Method_emit	-> object->string()
		 *	object, string, array	-> __trait_Method_emit	-> object->string(array)
		 *
		 *	string, string		-> __trait_Static_emit	-> string::string()
		 *	string, string, array	-> __trait_Static_emit	-> string::string(array)
		 *
		 * 	closure			-> __trait_Callable_emit	-> closure()
		 *	closure, array		-> __trait_Callable_emit	-> closure(array)
		 *	object, closure		-> __trait_Callable_emit	-> closure() use (object)
		 *	object, closure, array	-> __trait_Callable_emit	-> closure(args) use (object)
		 *	string, closure		-> __trait_Callable_emit	-> static::closure()
		 *	string, closure, array	-> __trait_Callable_emit	-> static::closure(array)
		 *
		 * @see normalize()
		 */
		public static function emit()
		{
			$args = func_get_args();
			if([] === $args)
				return NULL;
				
			
			switch(count($args)):
				case 0:
					return NULL;
					break;
				case 1:
					switch(TRUE):
						case is_string($args[0]):
							return static::Core_Std_Invoke___trait_Class_emit($args[0]);
						case is_object($args[0]):
							return static::Core_Std_Invoke___trait_Callable_emit($args[0]);
					endswitch;
					break;
				case 2:
					switch(TRUE):
						case is_string($args[0]) && is_array($args[1]):
							return static::Core_Std_Invoke___trait_Class_emit($args[0], $args[1]);
						case is_object($args[0]) && is_array($args[1]):
							return static::Core_Std_Invoke___trait_Callable_emit($args[0], $args[1]);
						case is_object($args[0]) && is_string($args[1]):
							return static::Core_Std_Invoke___trait_Method_emit($args[0], $args[1]);
						case is_string($args[0]) && is_string($args[1]):
							return static::Core_Std_Invoke___trait_Static_emit($args[0], $args[1]);
						case is_object($args[0]) && is_object($args[1]):
							return static::Core_Std_Invoke___trait_Callable_emit($args[1]);
						case is_string($args[0]) && is_object($args[1]):
							return static::Core_Std_Invoke___trait_Callable_emit($args[1]);
					endswitch;
					break;
				case 3:
				default:
					switch(TRUE):
						case is_object($args[0]) && is_string($args[1]) && is_array($args[2]):
							return static::Core_Std_Invoke___trait_Method_emit($args[0], $args[1], $args[2]);
						case is_string($args[0]) && is_string($args[1]) && is_array($args[2]):
							return static::Core_Std_Invoke___trait_Static_emit($args[0], $args[1], $args[2]);
						case is_object($args[0]) && is_object($args[1]) && is_array($args[2]):
							return static::Core_Std_Invoke___trait_Callable_emit($args[1], $args[2]);
						case is_string($args[0]) && is_object($args[1]) && is_array($args[2]):
							return static::Core_Std_Invoke___trait_Callable_emit($args[1], $args[2]);
					endswitch;
					break;
			endswitch;
			
			$type = [];
			foreach($args as $arg)
				$type[] = getType($arg);
				
			throw new Exception('No Handler defined for ['.implode(', ', $type).'].');
		}
		
		/**
		 * @param array $__subject normalized callable array
		 * @see normalize()
		 */
		public static function isEmitable($__subject)
		{
			if(FALSE === is_array($__subject))
				return FALSE;
			
			$length = count($__subject);
			if($length < 1 || $length > 2)
				return FALSE;
			
			if($length === 1)
			{
				if(is_object($__subject[0]))
				{
					return method_exists($__subject[0], '__invoke');
				}
				else
				if(is_string($__subject[0]))
				{
					return class_exists($__subject[0]);
				}
				
				return false;
			}
			
			if(is_object($__subject[0])
			|| (is_string($__subject[0]) && class_exists($__subject[0])))
			{
				if(is_string($__subject[1]))
				{
					return method_exists($__subject[0], $__subject[1]);
				}
				
				if(is_object($__subject[1]))
				{
					return method_exists($__subject[1], '__invoke');
				}
			}
			
			return false;
		}
		
		/**
		 * convert misc handler-configs to callable address
		 *
		 * create delegatable array from
		 *	- 'class::method'		=> string + string	=> [string, string]	=> class::method()
		 *	- 'method' + target		=> object + string	=> [object, string]	=> target->method()
		 *	- 'class'			=> string		=> [string]		=> new class
		 *
		 *	- [] + target			=> object		=> [object]		=> target->__invoke()
		 *	- ['method'] + target		=> object + string	=> [object, method]	=> target->method()
		 *	- [instance, 'method']		=> object + string	=> [string, string]	=> instance->method()
		 *	- ['class', 'method']		=> string + string	=> [string, string]	=> class::method()
		 *	- ['class']			=> string		=> [string]		=> new class
		 *
		 * empty $__subject delegates to $__target->__invoke
		 *
		 * @param array|string|object $__subject callable array, class::method-string or closure
		 * @param object|string $__target fallback-instance or -class; bind closures to $__target
		 * @return array [string|object class|instance, string|object method|closure]
		 * @see emit()
		 */
		public static function normalize($__subject, $__target)
		{
			// [\foo]
			if(is_object($__subject)
			&& method_exists($__subject, '__invoke'))
			{
				if($__subject instanceOf Closure)
				{
					if(NULL === $__target)
						return [$__subject];
						
					$__subject = is_string($__target)
						? Closure::bind($__subject, NULL, $__target)
						: Closure::bind($__subject, $__target, get_class($__target));
				}
				
				return [$__target, $__subject];
			}
				
			if(is_callable($__subject) && is_array($__subject) && count($__subject) === 2)
				return $__subject;
				
			// '\foo::bar' | '\foo' | 'bar'
			if(is_string($__subject))
			{
				$subject	= explode('::', $__subject);
				$length		= count($subject);
				
				if($length === 2)
				{
					// ['foo', 'bar']
					return $subject;
				}
				else
				if($length === 1)
				{
					if(class_exists($subject[0]))
					{
						// ['foo']
						return $subject;
					}
					else
					{
						// ['bar']
						$__subject = $subject;
					}
				}
			}
			
			// [\foo] | ['\foo'] | ['bar'] | ['\foo', 'bar'] | [\foo, 'bar']
			if(is_array($__subject))
			{
				// []
				if(!isset($__subject[0]))
					return [$__target]; // target->__invoke()
				
				if(count($__subject) === 2)
					// ['\foo', 'bar'] | [\foo, 'bar']
					return $__subject;
				
				// [\foo] | ['\foo'] | ['bar']
				if(count($__subject) === 1)
				{
					// [\foo]
					if(is_object($__subject[0]))
						return $__subject; // \foo()
					
					// ['\foo'] | ['bar']
					if(is_string($__subject[0]))
					{
						// ['\foo']
						if(class_exists($__subject[0]))
							return $__subject; // new foo
						
						// ['bar']
						return [$__target , $__subject[0]]; // target->bar()
					}
				}
			}
			
			// \foo -> function[]{}/object -> [\foo]
			return static::normalize([$__subject], $__target);
		}
	}