<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Exception\ArgumentExpectedException;
	USE ILLI\Core\Std\Exception\ArgumentOutOfRangeException;
	USE ILLI\Core\Std\Invoke;
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
			$r = $this->map(function($e)
			{
				switch(TRUE):
					case $e instanceOf Element:
						return $e->render();
						break;
					case $this->isVal(__const_Type::SPL_CLOSURE, $e):
						return Invoke::emitInvokable($e);
						break;
					case $this->isVal(__const_Type::SPL_FUNCTION, $e):
						return Invoke::emitFunction($e);
						break;
					case $this->isVal(__const_Type::SPL_METHOD, $e):
						return Invoke::emit($e);
						break;
					case is_string($e):
						return $e;
						break;
				endswitch;
			});
			
			return [] === $r
				? NULL
				: implode(PHP_EOL, $r);
		}
		
	}