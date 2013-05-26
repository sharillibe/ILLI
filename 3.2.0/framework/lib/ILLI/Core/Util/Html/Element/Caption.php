<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Caption EXTENDS \ILLI\Core\Util\Html\Element
	{
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\IContent\IFlow',
			__const_Type::SPL_STRING
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\Element\Table'
		];
		
		public function __construct($__data = NULL)
		{
			$__data				= (array) $__data;
			$__data[__type_Element::name]	= 'caption';
			$__data[__type_Element::close]	= TRUE;
			parent::__construct([], $__data);
		}
	}