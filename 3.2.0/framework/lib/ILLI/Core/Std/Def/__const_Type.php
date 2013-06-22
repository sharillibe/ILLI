<?PHP
	NAMESPACE ILLI\Core\Std\Def;

	/**
	 * predefined base-types
	 */
	FINAL CLASS __const_Type EXTENDS \ILLI\Core\Std\ConstantCollection
	{
		#+ php real-types
		#! defined by php::getType()
		CONST SPL_ARRAY			= 'array';
		CONST SPL_BOOLEAN		= 'boolean';
		CONST SPL_DOUBLE		= 'double';
		CONST SPL_INTEGER		= 'integer';
		CONST SPL_NULL			= 'NULL';	#! never change to LC
		CONST SPL_OBJECT		= 'object';
		CONST SPL_RESOURCE		= 'resource';
		CONST SPL_STRING		= 'string';
		
		#+ aliases
		CONST SPL_FLOAT			= 'float';
		CONST SPL_LONG			= 'long';
		CONST SPL_VOID			= 'void';
		
		#+ misc
		CONST SPL_STRICT_ARRAY		= 'strictarray';
		CONST SPL_CALLABLE		= 'callable';
		CONST SPL_CLOSURE		= 'closure';
		//CONST SPL_INVOKABLE		= 'invokable';
		CONST SPL_CLASS			= 'class';
		CONST SPL_DIRECTORY		= 'directory';
		CONST SPL_FILE			= 'file';
		CONST SPL_FLAG			= 'flag';
		CONST SPL_FUNCTION		= 'function';
		CONST SPL_INTERFACE		= 'interface';
		CONST SPL_METHOD		= 'method';
		CONST SPL_TRAIT			= 'trait';
		CONST SPL_TUPLE			= 'tuple';
		CONST SPL_PAIR			= 'pair';
	}