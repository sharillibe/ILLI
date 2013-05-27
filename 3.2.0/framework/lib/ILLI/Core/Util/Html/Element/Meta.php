<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Meta EXTENDS \ILLI\Core\Util\Html\Element
	IMPLEMENTS
	\ILLI\Core\Util\Html\IContent\IFlow,
	\ILLI\Core\Util\Html\IContent\IMetadata,
	\ILLI\Core\Util\Html\IContent\IPhrasing
	{
		CONST close	= TRUE;
		CONST name	= 'meta';
		
		protected static $__tContent =
		[
			#! void element
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\Element\Head',
			'ILLI\Core\Util\Html\Element\Meta',
			'ILLI\Core\Util\Html\Element\Noscript',
			'ILLI\Core\Util\Html\IContent\IMetadata',
			'ILLI\Core\Util\Html\IContent\IParsing',
			'ILLI\Core\Util\Html\IContent\IPhrasing'
		];
	}