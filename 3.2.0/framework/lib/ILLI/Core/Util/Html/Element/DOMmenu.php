<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__name_Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS DOMmenu EXTENDS \ILLI\Core\Util\Html\Element
	IMPLEMENTS
	\ILLI\Core\Util\Html\IContent\IFlow,
	\ILLI\Core\Util\Html\IContent\IInteractive,
	\ILLI\Core\Util\Html\IContent\IPalpable
	{
		CONST close	= TRUE;
		CONST name	= __name_Element::DOM_menu;
		
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\IContent\IFlow',
			'ILLI\Core\Util\Html\Element\DOMli'
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\IContent\IFlow'
		];
	}