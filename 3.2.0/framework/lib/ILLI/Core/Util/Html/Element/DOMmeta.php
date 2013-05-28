<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__name_Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS DOMmeta EXTENDS \ILLI\Core\Util\Html\Element
	IMPLEMENTS
	\ILLI\Core\Util\Html\IContent\IFlow,
	\ILLI\Core\Util\Html\IContent\IMetadata,
	\ILLI\Core\Util\Html\IContent\IPhrasing
	{
		CONST close	= TRUE;
		CONST name	= __name_Element::DOM_meta;
		
		protected static $__tContent =
		[
			#! void element
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\Element\DOMhead',
			'ILLI\Core\Util\Html\Element\DOMmeta',
			'ILLI\Core\Util\Html\Element\DOMnoscript',
			'ILLI\Core\Util\Html\IContent\IMetadata',
			'ILLI\Core\Util\Html\IContent\IParsing',
			'ILLI\Core\Util\Html\IContent\IPhrasing'
		];
	}