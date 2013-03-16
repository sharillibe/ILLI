<?PHP
	NAMESPACE ILLI\Core\Std\Exception;
	
	CLASS IndexOutOfRangeException EXTENDS \ILLI\Core\Std\Exception\RangeException
	{
		CONST CONSTRUCT = 'Offset {:offset} not defined.';
	}