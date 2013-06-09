<?PHP
	NAMESPACE ILLI\Core\Std\Exception;
	
	CLASS InvocationTargetException EXTENDS \ILLI\Core\Std\Exception\ExternalException
	{
		CONST CONSTRUCT = 'Error invoke {:target}';
	}