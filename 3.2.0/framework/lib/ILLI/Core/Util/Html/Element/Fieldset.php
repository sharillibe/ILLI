<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS Fieldset EXTENDS \ILLI\Core\Util\Html\Element
	IMPLEMENTS
	\ILLI\Core\Util\Html\IContent\IFlow,
	\ILLI\Core\Util\Html\IContent\IFormAssoc,
	\ILLI\Core\Util\Html\IContent\IPalpable,
	\ILLI\Core\Util\Html\IContent\IRootSectioning
	{
		protected static $__tContent =
		[
			'ILLI\Core\Util\Html\Element\Legend',
			'ILLI\Core\Util\Html\IContent\IFlow'
		];
		
		protected static $__tParent =
		[
			'ILLI\Core\Util\Html\IContent\IFlow'
		];
		
		public function __construct($__data = NULL)
		{
			$__data				= (array) $__data;
			$__data[__type_Element::name]	= 'fieldset';
			$__data[__type_Element::close]	= TRUE;
			parent::__construct([], $__data);
		}
	}