<?PHP
	NAMESPACE ILLI\Core\Std\Def\ADVArrayStrict;
	
	CLASS ComponentMethodCallException EXTENDS \ILLI\Core\Std\Def\ADV\ComponentMethodCallException
	{
		CONST ERROR_M_SET_E_OFFSET_KEY_TYPE_EXPECTED	= 0x0201020;
		CONST ERROR_M_SET_E_OFFSET_VAL_TYPE_EXPECTED	= 0x0201030;
		CONST ERROR_M_VALIDATE_KEY			= 0x0207000;
		CONST ERROR_M_VALIDATE_VAL			= 0x0208000;
		CONST ERROR_M_GET_KEY_GC			= 0x0209000;
		CONST ERROR_M_GET_VAL_GC			= 0x020A000;
		
		CONST M_SET_E_OFFSET_KEY_TYPE_EXPECTED		= 'Invalid offset-type for {:class} at offset [{:offset}].';
		CONST M_SET_E_OFFSET_VAL_TYPE_EXPECTED		= 'Invalid value-type for {:class} at offset [{:offset}].';
	}