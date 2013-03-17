<?PHP
	NAMESPACE ILLI\Core\Std\Dom;
	USE ILLI\Core\Std\Dom\Attributes;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS P EXTENDS \ILLI\Core\Std\Dom\Element IMPLEMENTS \ILLI\Core\Std\Dom\IFlow, \ILLI\Core\Std\Dom\IPalpable
	{
		protected static $__defineT =
		[
			self::attribute		=> ['ILLI\Core\Std\Dom\Attributes'],
			self::content		=> ['ILLI\Core\Std\Dom\IPhrasing', __const_Type::SPL_STRING],
			self::parent		=> ['ILLI\Core\Std\Dom\IFlow']
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