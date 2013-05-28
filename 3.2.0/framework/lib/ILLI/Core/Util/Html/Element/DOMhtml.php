<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__name_Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS DOMhtml EXTENDS \ILLI\Core\Util\Html\Element
	{
		CONST close	= TRUE;
		CONST name	= __name_Element::DOM_html;
		
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\Element\DOMhead',
			'ILLI\Core\Util\Html\Element\DOMbody'
		];
		
		protected static $__tParent =
		[
			#! void as the document root
		];
	}