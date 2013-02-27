<?PHP
	NAMESPACE ILLI\Core\Std\Exception;
	
	CLASS ArgumentAccessException EXTENDS \ILLI\Core\Std\Exception\ArgumentException
	{
		CONST CONSTRUCT = 'Argument {:target} is not accessible.';
	}