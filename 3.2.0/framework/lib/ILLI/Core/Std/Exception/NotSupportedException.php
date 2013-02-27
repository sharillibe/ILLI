<?PHP
	NAMESPACE ILLI\Core\Std\Exception;
	
	CLASS NotSupportedException EXTENDS \ILLI\Core\Std\Exception\MemberException
	{
		CONST CONSTRUCT = '{:target} is not supported.';
	}