<?PHP
	NAMESPACE ILLI\Core\Std\Def\ADVTuple;
	
	CLASS ComponentMethodCallException EXTENDS \ILLI\Core\Std\Def\ADV\ComponentMethodCallException
	{
		CONST ERROR_M_CTOR_E_DEFINITION_LENGTH_ZERO		= 0x0001010;
		CONST ERROR_M_SET_E_OFFSET_VAL_TYPE_EXPECTED		= 0x0101020;
		CONST ERROR_M_PARSE_DEF					= 0x0201000;
		CONST ERROR_M_PARSE_DEF_E_OFFSET_INTEGER_EXPECTED	= 0x0201010;
		CONST ERROR_M_PARSE_DEF_E_RESULT_LENGTH_ZERO		= 0x0201020;
		CONST ERROR_M_VALIDATE_VAL				= 0x0202000;
		CONST ERROR_M_GET_VAL_GC				= 0x0203000;
		CONST ERROR_M_GET_TUPLE_GC				= 0x0204000;
		CONST M_CTOR_E_DEFINITION_LENGTH_ZERO			= 'Constructor-Argument offset-definition is an empty array.';
		CONST M_SET_E_OFFSET_VAL_TYPE_EXPECTED			= 'Invalid value-type for {:class} at offset [{:offset}].';
		CONST M_PARSE_DEF_E_OFFSET_INTEGER_EXPECTED		= 'Error in type-definition for {:class} at offset [{:offset}].';
		CONST M_PARSE_DEF_E_RESULT_LENGTH_ZERO			= 'Parser-result is an empty array.';
	}