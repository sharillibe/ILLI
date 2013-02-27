<?PHP
	NAMESPACE ILLI\Core\Std\Exception;
	
	CLASS ComponentInitializationException EXTENDS \ILLI\Core\Std\Exception\ComponentException
	{
		CONST CONSTRUCT = 'Initialization Error in {:class}.';
	}