<?PHP
	NAMESPACE ILLI\Core\Std;

	INTERFACE IThrowable
	{
		CONST ADDR_SEPARATOR = ':';
		
		public function __construct();
		
		public function setNext(IThrowable $__Exception);
		public function hasNext();
		public function getNext();
		public function hasPrevious();
		public function getAddress();
		public function getAddressStack($__addressString = NULL);
		public function getAddressCode();
		public function getHashCode();
		public function solveAddressStack($__addressString = NULL);
		public function asSolved();
		public function isSolved();
		
		public static function reset();
		public static function parents($__splClassName = NULL);
		public static function hasCatched($__exceptionClass);
		public static function hasErrorsLogged();
	}