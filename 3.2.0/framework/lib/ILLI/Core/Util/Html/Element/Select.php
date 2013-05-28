<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__name_Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Select EXTENDS \ILLI\Core\Util\Html\Element
	IMPLEMENTS
	\ILLI\Core\Util\Html\IContent\IFlow,
	\ILLI\Core\Util\Html\IContent\IPhrasing,
	\ILLI\Core\Util\Html\IContent\IInteractive,
	\ILLI\Core\Util\Html\IContent\IFormAssoc,
	\ILLI\Core\Util\Html\IContent\IFormAssoc\IListed,
	\ILLI\Core\Util\Html\IContent\IFormAssoc\ILabelable,
	\ILLI\Core\Util\Html\IContent\IFormAssoc\IResettable,
	\ILLI\Core\Util\Html\IContent\IFormAssoc\ISubmittable
	{
		CONST close	= TRUE;
		CONST name	= __name_Element::DOM_select;
		
		protected static $__tContent	=
		[
			'ILLI\Core\Util\Html\Element\Option',
			'ILLI\Core\Util\Html\Element\Optgroup'
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\IContent\IPhrasing'
		];
	}