<?PHP
	NAMESPACE ILLI\Core\Std\Exception;
	
	CLASS MemberNotFoundException EXTENDS \ILLI\Core\Std\Exception\NotFoundException
	{
		CONST CONSTRUCT = 'Member {:name} not found.';
	}