<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Audio EXTENDS \ILLI\Core\Util\Html\Element
	IMPLEMENTS
	\ILLI\Core\Util\Html\IContent\IEmbedded,
	\ILLI\Core\Util\Html\IContent\IFlow,
	\ILLI\Core\Util\Html\IContent\IPalpable,
	\ILLI\Core\Util\Html\IContent\IPhrasing,
	\ILLI\Core\Util\Html\IContent\ISectioning
	{
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\IContent\ITransparent',
			'ILLI\Core\Util\Html\Element\Track',
			'ILLI\Core\Util\Html\Element\Source',
			__const_Type::SPL_STRING
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\IContent'
		];
		
		public function __construct($__data = NULL)
		{
			$__data				= (array) $__data;
			$__data[__type_Element::name]	= 'audio';
			$__data[__type_Element::close]	= TRUE;
			parent::__construct([], $__data);
		}
	}