<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE Exception;
	
	CLASS ADVArrayCallable EXTENDS \ILLI\Core\Std\Def\ADVArrayStrict
	{
		public function __construct(array $__setup = [])
		{
			parent::__construct
			(
				[__const_Type::SPL_LONG],
				[__const_Type::SPL_METHOD, __const_Type::SPL_CLOSURE, __const_Type::SPL_FUNCTION],
				$__setup
			);
		}
	}