<?PHP
	NAMESPACE ILLI\Core\Std;
	USE ILLI\Core\Std\Invoke;
	USE ILLI\Core\Std\Def\ADT;
	USE ILLI\Core\Std\Def\ADV;
	USE ILLI\Core\Std\Def\ComponentMethodCallException;
	USE Exception;
	
	CLASS Def EXTENDS \ILLI\Core\Std\StaticClass
	{
		CONST ADT	= 'ILLI\Core\Std\Def\ADT';
		CONST ADV	= 'ILLI\Core\Std\Def\ADV';
		
		/**
		 * create ADT instance
		 *
		 * @return	ILLI\Core\Std\Def\ADT
		 * @see		ILLI\Core\Std\Def\ADV::define()
		 */
		public static function t()
		{
			try
			{
				return Invoke::emitStatic(static::ADT, 'define', func_get_args());
			}
			catch(Exception $E)
			{
				throw new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_M_T, ['method' => __METHOD__]);
			}
		}
		
		/**
		 * create ADV instance
		 *
		 * @return	ILLI\Core\Std\Def\ADV;
		 * @see		ILLI\Core\Std\Def\ADV::define()
		 */
		public static function v()
		{
			try
			{
				return Invoke::emitStatic(static::ADV, 'define', func_get_args());
			}
			catch(Exception $E)
			{
				throw new ComponentMethodCallException($E, ComponentMethodCallException::ERROR_M_V, ['method' => __METHOD__]);
			}
		}
	}