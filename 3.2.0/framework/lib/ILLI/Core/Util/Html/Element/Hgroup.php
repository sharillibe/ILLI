<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Hgroup EXTENDS \ILLI\Core\Util\Html\Element
	IMPLEMENTS
	\ILLI\Core\Util\Html\IContent\IFlow,
	\ILLI\Core\Util\Html\IContent\IHeading,
	\ILLI\Core\Util\Html\IContent\IPalpable
	{
		CONST close	= TRUE;
		CONST name	= 'hgroup';
		
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\Element\H1',
			'ILLI\Core\Util\Html\Element\H2',
			'ILLI\Core\Util\Html\Element\H3',
			'ILLI\Core\Util\Html\Element\H4',
			'ILLI\Core\Util\Html\Element\H5',
			'ILLI\Core\Util\Html\Element\H6'
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\IContent\IFlow'
		];
	}