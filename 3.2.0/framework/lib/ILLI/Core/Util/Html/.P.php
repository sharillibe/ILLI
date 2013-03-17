<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Util\Html\Attributes;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS P EXTENDS \ILLI\Core\Util\Html\Element IMPLEMENTS \ILLI\Core\Util\Html\IFlow, \ILLI\Core\Util\Html\IPalpable
	{
		protected static $__defineT =
		[
			self::attribute		=> ['ILLI\Core\Util\Html\Attributes'],
			self::content		=> ['ILLI\Core\Util\Html\IPhrasing', __const_Type::SPL_STRING],
			self::parent		=> ['ILLI\Core\Util\Html\IFlow']
		];
		
		public function __construct($__data = NULL)
		{
			if(is_string($__data))
				$__data = [self::content => $__data];
			
			$__data = (array) $__data;
			$__data[self::name] = 'p';
			
			parent::__construct([], $__data);
		}
	}