<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Embed EXTENDS \ILLI\Core\Util\Html\Element
	IMPLEMENTS
	\ILLI\Core\Util\Html\IContent\IEmbedded,
	\ILLI\Core\Util\Html\IContent\IFlow,
	\ILLI\Core\Util\Html\IContent\IInteractive,
	\ILLI\Core\Util\Html\IContent\IPalpable,
	\ILLI\Core\Util\Html\IContent\IPhrasing
	{
		protected static $__tContent =
		[
			#! void element
		];
		
		protected static $__tParent =
		[
			// any element that accepts 'ILLI\Core\Util\Html\IContent\IEmbedded'
			'ILLI\Core\Util\Html\IContent'
		];
		
		public function __construct($__data = NULL)
		{
			$__data				= (array) $__data;
			$__data[__type_Element::name]	= 'embed';
			$__data[__type_Element::close]	= FALSE;
			parent::__construct([], $__data);
		}
	}