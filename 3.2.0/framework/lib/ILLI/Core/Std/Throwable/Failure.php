<?PHP
	NAMESPACE ILLI\Core\Std\Throwable;
	USE Exception;
	
	CLASS Failure EXTENDS \ILLI\Core\Std\Throwable\External
	{
		CONST ERROR_CONSTRUCT				= 500;
		CONST CONSTRUCT					= 'An error occurred.';
	}