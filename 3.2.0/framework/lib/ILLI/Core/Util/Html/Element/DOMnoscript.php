<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__name_Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS DOMnoscript EXTENDS \ILLI\Core\Util\Html\Element
	IMPLEMENTS
	\ILLI\Core\Util\Html\IContent\IFlow,
	\ILLI\Core\Util\Html\IContent\IMetadata,
	\ILLI\Core\Util\Html\IContent\IPhrasing
	{
		CONST close	= TRUE;
		CONST name	= __name_Element::DOM_noscript;
		
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\Element\DOMlink',
			'ILLI\Core\Util\Html\Element\DOMstyle',
			'ILLI\Core\Util\Html\Element\DOMmeta',
			
			//'ILLI\Core\Util\Html\IContent\ITransparent',
			'ILLI\Core\Util\Html\IContent',
			'ILLI\Core\Util\Html\IContent\IFlow',
			'ILLI\Core\Util\Html\IContent\IPhrasing',
			__const_Type::SPL_STRING,
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\Element\DOMhead',
			'ILLI\Core\Util\Html\IContent\IPhrasing'
		];
	}