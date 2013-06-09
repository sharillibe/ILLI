<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE Exception;
	
	CLASS ADVArrayInstance EXTENDS \ILLI\Core\Std\Def\ADVArrayStrict
	{
		public function __construct(array $__setup = [])
		{
			parent::__construct
			(
				[__const_Type::SPL_LONG],
				[__const_Type::SPL_CLASS, __const_Type::SPL_INTERFACE],
				$__setup
			);
		}
		
		public function offsetSet($__offset = NULL, $__value)
		{
			parent::offsetSet($__offset, $__value);
			$this->__data = array_unique($this->__data);
			return $this;
		}
	}