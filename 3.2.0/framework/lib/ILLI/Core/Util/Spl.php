<?PHP
	NAMESPACE ILLI\Core\Util;
	USE ILLI\Core\Exception;
	USE ILLI\Core\Util\String;
	
	CLASS Spl
	{
		public static function nameWithHash($__className, $__splObjHash)
		{
			if(is_object($__splObjHash))
				$__splObjHash = spl_object_hash($__splObjHash);
				
			return String::insert('{:__className}<{:__splObjHash}>', compact('__className', '__splObjHash'));
		}
		
		public static function inspectableClass($__className)
		{
			return $__className;
		}
		
		public static function inspectableNamespace($__namespaceName)
		{
			return $__namespaceName;
		}
		
		public static function inspectableTrait($__traitName)
		{
			return $__traitName;
		}
		
		public static function inspectableInterface($__interfaceName)
		{
			return $__interfaceName;
		}
		
		public static function inspectableProperty($__className, $__propertyName)
		{
			return String::insert('{:__className}::${:__propertyName}', compact('__className', '__propertyName'));
		}
		
		public static function inspectableConstant($__className, $__constName)
		{
			return String::insert('{:__className}::{:__constName}', compact('__className', '__constName'));
		}
		
		public static function inspectableMethod($__className, $__methodName)
		{
			return String::insert('{:__className}::{:__methodName}()', compact('__className', '__methodName'));
		}
	}