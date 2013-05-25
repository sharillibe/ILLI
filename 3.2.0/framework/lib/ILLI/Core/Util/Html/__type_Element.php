<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\Attributes;
	USE ILLI\Core\Util\String;
	
	CLASS __type_Element EXTENDS \ILLI\Core\Std\Def\ADVTuple
	{
		//CONST __GC		= __CLASS__;
		
		CONST name		= 0x00;
		CONST close		= 0x01;
		CONST content		= 0x02;
		CONST attribute		= 0x03;
		CONST parent		= 0x04;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct
			(
				parent::mergeOffsetTypes($__defineOffsetType, [
					__type_Element::name		=> __const_Type::SPL_STRING,
					__type_Element::close		=> __const_Type::SPL_BOOLEAN,
					__type_Element::content		=> ['ILLI\Core\Util\Html\ElementContent']
				]),
				parent::mergeOffsetValues($__data, [
					__type_Element::name		=> 'stub',
					__type_Element::close		=> TRUE
				])
			);
		}
	}