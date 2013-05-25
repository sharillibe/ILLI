<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Util\Html\__type_Element;
	USE ILLI\Core\Util\Html\Attributes;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS OptGroup EXTENDS \ILLI\Core\Util\Html\Element IMPLEMENTS \ILLI\Core\Util\Html\IFlow, \ILLI\Core\Util\Html\IPhrasing, \ILLI\Core\Util\Html\IInteractive, \ILLI\Core\Util\Html\IFormAssocListed, \ILLI\Core\Util\Html\IFormAssocLabelable, \ILLI\Core\Util\Html\IFormAssocResettable, \ILLI\Core\Util\Html\IFormAssocSubmittable
	{
		protected static $__tAttributes = '\ILLI\Core\Util\Html\__type_AttributesOptGroup';
		protected static $__tContent	= ['ILLI\Core\Util\Html\Option'];
		protected static $__tParent	= ['ILLI\Core\Util\Html\Select'];
		
		public function __construct($__data = NULL)
		{
			$__data				= (array) $__data;
			$__data[__type_Element::name]	= 'optgroup';
			$__data[__type_Element::close]	= TRUE;
			parent::__construct([], $__data);
		}
	}