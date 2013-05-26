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
		
		public function __construct($__data = NULL)
		{
			$__data				= (array) $__data;
			$__data[__type_Element::name]	= 'hgroup';
			$__data[__type_Element::close]	= TRUE;
			parent::__construct([], $__data);
		}
	}