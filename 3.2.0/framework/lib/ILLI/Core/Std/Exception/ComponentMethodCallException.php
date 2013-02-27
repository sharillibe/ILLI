<?PHP
	NAMESPACE ILLI\Core\Std\Exception;
	
	CLASS ComponentMethodCallException EXTENDS \ILLI\Core\Std\Exception\ComponentException
	{
		CONST ERROR_CTOR				= 0x001000;
		CONST ERROR_DTOR				= 0x002000;
		
		CONST CONSTRUCT = 'Method Error in {:method}().';
	}