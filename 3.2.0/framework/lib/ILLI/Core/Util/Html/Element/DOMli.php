<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__name_Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS DOMli EXTENDS \ILLI\Core\Util\Html\Element
	{
		CONST close	= TRUE;
		CONST name	= __name_Element::DOM_li;
		
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\IContent\IFlow',
			__const_Type::SPL_STRING
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\Element\DOMmenu',
			'ILLI\Core\Util\Html\Element\DOMol',
			'ILLI\Core\Util\Html\Element\DOMul'
		];
	}