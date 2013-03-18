<?PHP
	NAMESPACE ILLI\Core\Std;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Std\Def\ComponentMethodCallException;
	USE Exception;
	
	FINAL CLASS Dom EXTENDS \ILLI\Core\Std\StaticClass
	{
		/**
		 * create DOM Element instance
		 *
		 * @return	ILLI\Core\Std\Dom\Element;
		 * @see		ILLI\Core\Std\Dom\Element::__construct()
		 */
		public static function element()
		{
			try
			{
				return Invoke::emitClass('ILLI\Core\Std\Dom\Element', func_get_args());
			}
			catch(Exception $E)
			{
				throw new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_M_ELEMENT, ['method' => __METHOD__]);
			}
		}
		
		/**
		 * create DOM Attribute instance
		 *
		 * @return	ILLI\Core\Std\Dom\Attribute;
		 * @see		ILLI\Core\Std\Dom\Attribute::__construct()
		 */
		public static function attribute()
		{
			try
			{
				return Invoke::emitClass('ILLI\Core\Std\Dom\Attribute', func_get_args());
			}
			catch(Exception $E)
			{
				throw new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_M_ATTRIBUTE, ['method' => __METHOD__]);
			}
		}
	}