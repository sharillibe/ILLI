<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Base EXTENDS \ILLI\Core\Util\Html\Element
	IMPLEMENTS
	\ILLI\Core\Util\Html\IContent\IMetadata
	{
		protected static $__tContent =
		[
			#! void element
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\Element\Head'
		];
		
		public function __construct($__data = NULL)
		{
			$__data				= (array) $__data;
			$__data[__type_Element::name]	= 'base';
			$__data[__type_Element::close]	= FALSE;
			parent::__construct([], $__data);
		}
	}