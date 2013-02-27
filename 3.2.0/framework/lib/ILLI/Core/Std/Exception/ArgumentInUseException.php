<?PHP
	NAMESPACE ILLI\Core\Std\Exception;
	
	CLASS ArgumentInUseException EXTENDS \ILLI\Core\Std\Exception\ArgumentException
	{
		CONST CONSTRUCT = 'Argument {:target} is already in use.';
	}