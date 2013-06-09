<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Exception\ArgumentExpectedException;
	USE ILLI\Core\Std\Exception\ArgumentOutOfRangeException;
	USE ArrayAccess;
	
	CLASS ElementContent EXTENDS \ILLI\Core\Std\Def\ADVArrayStrict IMPLEMENTS ArrayAccess
	{
		/**
		 * Instantiate the HTML Element structure
		 *
		 * zero based strict array.
		 * ADT is defined in each element::$__tContent
		 *
		 * @param	array $__t	Element::$__tContent
		 * @param	array $__setup	initial data
		 * @see		ILLI\Core\Util\Html\Element::__construct()
		 * @see		ILLI\Core\Util\Html\Element::$__tContent
		 */
		public function __construct(array $__t, array $__setup = [])
		{
			$__t = array_merge($__t, [__const_Type::SPL_METHOD, __const_Type::SPL_CLOSURE, __const_Type::SPL_FUNCTION]);
			parent::__construct([__const_Type::SPL_LONG], $__t, $__setup);
		}
		
		/**
		 * convert __type_Element::content to string
		 *
		 * @return	string
		 * @see		ILLI\Core\Util\Html\__type_Element::content
		 * @see		ILLI\Core\Util\Html\Element::$__tContent
		 */
		public function render()
		{
			$r = [];
			foreach($this->__data as $e)
			{
				switch(TRUE):
					case $e instanceOf Element:
						$r[] = $e->render();
						break;
						/*
					case $e->isVal($e, __const_Type::SPL_CLOSURE):
						$r[] = Invoke::emitCallable($e);
						break;
					case $e->isVal($e, __const_Type::SPL_FUNCTION):
						$r[] = Invoke::emitFunction($e);
						break;
					case $e->isVal($e, __const_Type::SPL_METHOD):
						$r[] = Invoke::emit($e);
						break;
						*/
					case is_string($e):
						$r[] = $e;
						break;
				endswitch;
			}
			
			return [] === $r
				? NULL
				: implode(PHP_EOL, $r);
		}
		
	}