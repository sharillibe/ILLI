<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Html EXTENDS \ILLI\Core\Util\Html\Element
	{
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\Element\Head',
			'ILLI\Core\Util\Html\Element\Body'
		];
		
		protected static $__tParent =
		[
			#! void as the document root
		];
		
		public function __construct($__data = NULL)
		{
			$__data				= (array) $__data;
			$__data[__type_Element::name]	= 'html';
			$__data[__type_Element::close]	= TRUE;
			parent::__construct([], $__data);
		}
	}