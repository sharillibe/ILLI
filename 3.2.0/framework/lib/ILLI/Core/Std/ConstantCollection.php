<?PHP
	NAMESPACE ILLI\Core\Std;
	USE ILLI\Core\Std\Reflection\SplClass;
	
	ABSTRACT CLASS ConstantCollection EXTENDS \ILLI\Core\Std\ContextStatic
	{
		public static function toArray()
		{
			return (new SplClass(get_called_class()))->getConstants();
		}
	}