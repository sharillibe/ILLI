<?PHP
	NAMESPACE ILLI\Core\Std\Exception;
	
	CLASS ComponentNotFoundException EXTENDS \ILLI\Core\Std\Exception\NotFoundException
	{
		CONST CONSTRUCT = 'Component or Module for request {:class} not found.';
	}