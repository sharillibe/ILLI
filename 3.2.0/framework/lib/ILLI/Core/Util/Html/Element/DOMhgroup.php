<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__name_Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS DOMhgroup EXTENDS \ILLI\Core\Util\Html\Element
	IMPLEMENTS
	\ILLI\Core\Util\Html\IContent\IFlow,
	\ILLI\Core\Util\Html\IContent\IHeading,
	\ILLI\Core\Util\Html\IContent\IPalpable
	{
		CONST close	= TRUE;
		CONST name	= __name_Element::DOM_hgroup;
		
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\Element\DOMh1',
			'ILLI\Core\Util\Html\Element\DOMh2',
			'ILLI\Core\Util\Html\Element\DOMh3',
			'ILLI\Core\Util\Html\Element\DOMh4',
			'ILLI\Core\Util\Html\Element\DOMh5',
			'ILLI\Core\Util\Html\Element\DOMh6'
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\IContent\IFlow'
		];
	}