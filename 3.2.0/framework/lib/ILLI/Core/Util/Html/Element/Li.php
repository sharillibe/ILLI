<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Li EXTENDS \ILLI\Core\Util\Html\Element
	{
		CONST close	= TRUE;
		CONST name	= 'li';
		
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\IContent\IFlow',
			__const_Type::SPL_STRING
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\Element\Menu',
			'ILLI\Core\Util\Html\Element\Ol',
			'ILLI\Core\Util\Html\Element\Ul'
		];
	}