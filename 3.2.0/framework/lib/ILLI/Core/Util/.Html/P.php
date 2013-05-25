<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Util\Html\Attributes;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS P EXTENDS \ILLI\Core\Util\Html\Element IMPLEMENTS \ILLI\Core\Util\Html\IFlow, \ILLI\Core\Util\Html\IPalpable
	{
		protected static $__dT =
		[
			Element::content		=> ['ILLI\Core\Util\Html\IPhrasing', __const_Type::SPL_STRING,
									'ILLI\Core\Util\Html\P' // testing
								],
			Element::parent			=> ['ILLI\Core\Util\Html\IFlow']
		];
		
		public function __construct($__data = NULL)
		{
			$__data = (array) $__data;
			$__data[__type_Element::name]	= 'p';
			$__data[__type_Element::close]	= TRUE;
			parent::__construct([], $__data);
		}
	}