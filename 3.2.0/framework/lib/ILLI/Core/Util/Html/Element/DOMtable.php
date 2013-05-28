<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__name_Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS DOMtable EXTENDS \ILLI\Core\Util\Html\Element
	IMPLEMENTS
	\ILLI\Core\Util\Html\IContent\IFlow
	{
		CONST close	= TRUE;
		CONST name	= __name_Element::DOM_table;
		
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\Element\DOMcaption',
			'ILLI\Core\Util\Html\Element\DOMcolgroup',
			'ILLI\Core\Util\Html\Element\DOMtbody',
			'ILLI\Core\Util\Html\Element\DOMthead',
			'ILLI\Core\Util\Html\Element\DOMtfoot',
			'ILLI\Core\Util\Html\Element\DOMtr'
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\IContent\IFlow'
		];
	}