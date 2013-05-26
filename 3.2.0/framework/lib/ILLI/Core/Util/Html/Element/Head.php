<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Head EXTENDS \ILLI\Core\Util\Html\Element
	{
		CONST close	= TRUE;
		CONST name	= 'head';
		
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\IContent\IMetadata'
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\Element\Html'
		];
	}