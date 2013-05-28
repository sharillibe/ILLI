<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__name_Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS DOMbase EXTENDS \ILLI\Core\Util\Html\Element
	IMPLEMENTS
	\ILLI\Core\Util\Html\IContent\IMetadata
	{
		CONST close	= FALSE;
		CONST name	= __name_Element::DOM_base;
		
		protected static $__tContent =
		[
			#! void element
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\Element\DOMhead'
		];
	}