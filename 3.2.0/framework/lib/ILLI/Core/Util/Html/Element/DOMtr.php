<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__name_Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS DOMtr EXTENDS \ILLI\Core\Util\Html\Element
	{
		CONST close	= TRUE;
		CONST name	= __name_Element::DOM_tr;
		
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\Element\DOMth',
			'ILLI\Core\Util\Html\Element\DOMtd'
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\Element\DOMtable',
			'ILLI\Core\Util\Html\Element\DOMtbody',
			'ILLI\Core\Util\Html\Element\DOMtfoot',
			'ILLI\Core\Util\Html\Element\DOMthead'
		];
	}