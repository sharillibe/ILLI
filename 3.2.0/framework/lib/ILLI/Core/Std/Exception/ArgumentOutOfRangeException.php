<?PHP
	NAMESPACE ILLI\Core\Std\Exception;
	
	CLASS ArgumentOutOfRangeException EXTENDS \ILLI\Core\Std\Exception\ArgumentException
	{
		CONST CONSTRUCT = 'Undefined offset {:target}[<{:detected}>{:offset}]';
	}