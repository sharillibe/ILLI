<?PHP
	NAMESPACE ILLI\Core\Std\Exception;
	
	CLASS ArgumentExpectedException EXTENDS \ILLI\Core\Std\Exception\ArgumentException
	{
		CONST CONSTRUCT = 'Expected type <{:expected}>{:target}: <{:detected}>{:value} given.';
	}