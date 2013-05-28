<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__name_Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS DOMparam EXTENDS \ILLI\Core\Util\Html\Element
	{
		CONST close	= TRUE;
		CONST name	= __name_Element::DOM_param;
		
		protected static $__tContent =
		[
			#! void element
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\Element\DOMobject'
		];
	}