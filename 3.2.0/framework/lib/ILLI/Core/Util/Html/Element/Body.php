<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Body EXTENDS \ILLI\Core\Util\Html\Element
	IMPLEMENTS
	\ILLI\Core\Util\Html\IContent\IRootSectioning
	{
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\IContent\IFlow'
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\Element\Html'
		];
		
		public function __construct($__data = NULL)
		{
			$__data				= (array) $__data;
			$__data[__type_Element::name]	= 'body';
			$__data[__type_Element::close]	= TRUE;
			parent::__construct([], $__data);
		}
	}