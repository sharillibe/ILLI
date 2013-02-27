<?PHP
	NAMESPACE ILLI\Core\Std\Exception;
	
	CLASS ClassOrInterfaceNotFoundException EXTENDS \ILLI\Core\Std\Exception\NotFoundException
	{
		CONST CONSTRUCT = 'Class or interface {:name} not found.';
	}