<?PHP
	NAMESPACE ILLI\Core\Std\Throwable;
	USE ILLI\Core\Std\Throwable;
	USE ILLI\Core\Std\Throwable\External\NotExternalException;
	USE ILLI\Core\Std\Throwable\External\NotThrowableException;
	USE Exception;
	
	CLASS External Extends \ILLI\Core\Std\Throwable
	{
		CONST ERROR_CONSTRUCT				= 500;
		CONST CONSTRUCT					= 'An external error occurred.';
		
		protected $__Exception 	= NULL;
		
		final public function __construct()
		{
			$trace = debug_backtrace(0, 2);
			if(FALSE === (isset($trace[1])
				&& $trace[1]['function'] === 'import'
				&& $trace[1]['class'] === __CLASS__))
					throw new NotThrowableException([
						'className' => get_called_class()
					]);
		}
		
		protected function staticConstruct(Exception $__Exception)
		{
			if(NULL !== $this->__Exception)
				return $this;
			
			$this->__Exception	= $__Exception;
			$this->file		= $__Exception->getFile();
			$this->line		= $__Exception->getLine();
			$this->code		= $__Exception->getCode();
			parent::__construct($__Exception->getMessage(), $__Exception->getCode(), $__Exception->getPrevious());
			return $this;
		}
		
		public static function import(Exception $__Exception)
		{
			if($__Exception instanceOf Throwable)
				throw new NotExternalException([
					'className' => get_class($__Exception)
				]);
			
			$c = get_called_class();
			return (new $c)->staticConstruct($__Exception); // parent::__construct is not allowed from static context
		}
		
		public function getExternal()
		{
			return $this->__Exception;
		}
	}