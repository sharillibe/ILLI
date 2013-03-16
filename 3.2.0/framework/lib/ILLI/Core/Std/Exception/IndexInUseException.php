<?PHP
	NAMESPACE ILLI\Core\Std\Exception;
	
	CLASS IndexInUseException EXTENDS \ILLI\Core\Std\Exception\RangeException
	{
		CONST CONSTRUCT = 'Offset {:offset} already defined.';
	}