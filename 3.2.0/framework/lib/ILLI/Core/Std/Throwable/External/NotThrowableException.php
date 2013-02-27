<?PHP
	NAMESPACE ILLI\Core\Std\Throwable\External;
	
	CLASS NotThrowableException EXTENDS \ILLI\Core\Std\Throwable
	{
		CONST CONSTRUCT = 'The exception {:className} is not throwable.';
	}