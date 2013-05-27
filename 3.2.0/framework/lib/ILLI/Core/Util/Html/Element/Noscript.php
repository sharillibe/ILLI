<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Noscript EXTENDS \ILLI\Core\Util\Html\Element
	IMPLEMENTS
	\ILLI\Core\Util\Html\IContent\IFlow,
	\ILLI\Core\Util\Html\IContent\IMetadata,
	\ILLI\Core\Util\Html\IContent\IPhrasing
	{
		CONST close	= TRUE;
		CONST name	= 'noscript';
		
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\Element\Link',
			'ILLI\Core\Util\Html\Element\Style',
			'ILLI\Core\Util\Html\Element\Meta',
			
			//'ILLI\Core\Util\Html\IContent\ITransparent',
			'ILLI\Core\Util\Html\IContent',
			'ILLI\Core\Util\Html\IContent\IFlow',
			'ILLI\Core\Util\Html\IContent\IPhrasing',
			__const_Type::SPL_STRING,
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\Element\Head',
			'ILLI\Core\Util\Html\IContent\IPhrasing'
		];
	}