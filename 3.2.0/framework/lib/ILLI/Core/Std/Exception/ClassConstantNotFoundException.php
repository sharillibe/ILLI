<?PHP
	NAMESPACE ILLI\Core\Std\Exception;
	
	CLASS ClassConstantNotFoundException EXTENDS \ILLI\Core\Std\Exception\NotFoundException
	{
		CONST CONSTRUCT = 'Constant {:class}::{:const} not found.';
	}