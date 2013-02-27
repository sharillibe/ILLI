<?PHP
	NAMESPACE ILLI\Core\Std\Exception;
	
	CLASS ClassNotFoundException EXTENDS \ILLI\Core\Std\Exception\NotFoundException
	{
		CONST CONSTRUCT = 'Class {:name} not found.';
	}