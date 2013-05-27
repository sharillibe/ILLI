<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Tr EXTENDS \ILLI\Core\Util\Html\Element
	{
		CONST close	= TRUE;
		CONST name	= 'tr';
		
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\Element\Th',
			'ILLI\Core\Util\Html\Element\Td'
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\Element\Table',
			'ILLI\Core\Util\Html\Element\Tbody',
			'ILLI\Core\Util\Html\Element\Tfoot',
			'ILLI\Core\Util\Html\Element\Thead'
		];
	}