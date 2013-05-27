<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Object EXTENDS \ILLI\Core\Util\Html\Element
	IMPLEMENTS
	\ILLI\Core\Util\Html\IContent\IFlow,
	\ILLI\Core\Util\Html\IContent\IEmbedded,
	\ILLI\Core\Util\Html\IContent\IPhrasing,
	\ILLI\Core\Util\Html\IContent\IPalpable,
	\ILLI\Core\Util\Html\IContent\IInteractive,
	\ILLI\Core\Util\Html\IContent\IFormAssoc\IListed,
	\ILLI\Core\Util\Html\IContent\IFormAssoc\ISubmittable
	{
		CONST close	= TRUE;
		CONST name	= 'object';
		
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\Element\Param',
			
			//'ILLI\Core\Util\Html\IContent\ITransparent',
			'ILLI\Core\Util\Html\IContent',
			__const_Type::SPL_STRING,
		];
		
		protected static $__tParent =
		[
			// any element that accepts 'ILLI\Core\Util\Html\IContent\IEmbedded'
			'ILLI\Core\Util\Html\IContent',
		];
	}