<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Html EXTENDS \ILLI\Core\Util\Html\Element
	{
		CONST close	= TRUE;
		CONST name	= 'html';
		
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\Element\Head',
			'ILLI\Core\Util\Html\Element\Body'
		];
		
		protected static $__tParent =
		[
			#! void as the document root
		];
	}