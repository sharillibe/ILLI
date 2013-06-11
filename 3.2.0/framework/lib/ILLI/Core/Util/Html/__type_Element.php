<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Element EXTENDS \ILLI\Core\Std\Def\ADVTuple
	{
		CONST ns		= 0x00;
		CONST name		= 0x01;
		CONST close		= 0x02;
		CONST content		= 0x03;
		CONST parent		= 0x04;
		CONST attribute		= 0x05;
		CONST wai		= 0x06;
		CONST copy		= 0x07;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct
			(
				parent::mergeOffsetTypes($__defineOffsetType, [
					self::ns	=> __const_Type::SPL_STRING,
					self::name	=> __const_Type::SPL_STRING,
					self::close	=> __const_Type::SPL_BOOLEAN,
					self::content	=> ['ILLI\Core\Util\Html\ElementContent'],
					self::copy	=> __const_Type::SPL_FLAG
				]),
				parent::mergeOffsetValues($__data, [
					self::name	=> 'stub',
					self::close	=> TRUE
				])
			);
			
			$this->__data[self::name] = strtolower($this->__data[self::name]);
		}
	}