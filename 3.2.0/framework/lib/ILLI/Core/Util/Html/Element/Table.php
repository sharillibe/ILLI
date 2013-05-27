<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Table EXTENDS \ILLI\Core\Util\Html\Element
	IMPLEMENTS
	\ILLI\Core\Util\Html\IContent\IFlow
	{
		CONST close	= TRUE;
		CONST name	= 'table';
		
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\Element\Caption',
			'ILLI\Core\Util\Html\Element\Colgroup',
			'ILLI\Core\Util\Html\Element\Tbody',
			'ILLI\Core\Util\Html\Element\Thead',
			'ILLI\Core\Util\Html\Element\Tfoot',
			'ILLI\Core\Util\Html\Element\Tr'
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\IContent\IFlow'
		];
	}