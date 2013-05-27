<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Style EXTENDS \ILLI\Core\Util\Html\Element
	IMPLEMENTS
	\ILLI\Core\Util\Html\IContent\IFlow,
	\ILLI\Core\Util\Html\IContent\IMetadata
	{
		CONST close	= TRUE;
		CONST name	= 'style';
		
		protected static $__tContent =
		[
			__const_Type::SPL_STRING
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\IContent\IMetadata',
			'ILLI\Core\Util\Html\IContent\IFlow',
			'ILLI\Core\Util\Html\Element\Noscript'
		];
	}