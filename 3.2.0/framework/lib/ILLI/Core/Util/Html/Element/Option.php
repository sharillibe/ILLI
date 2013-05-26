<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Option EXTENDS \ILLI\Core\Util\Html\Element
	{
		CONST close	= TRUE;
		CONST name	= 'option';
		
		protected static $__tContent =
		[
			__const_Type::SPL_STRING
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\Element\Select',
			'ILLI\Core\Util\Html\Element\Optgroup',
			'ILLI\Core\Util\Html\Element\Datalist'
		];
	}