<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_Meta EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST charset		= 0x14;
		CONST content		= 0x15;
		CONST httpEquiv		= 0x16;
		CONST name		= 0x17;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::charset		=> __const_Type::SPL_STRING,
				self::content		=> __const_Type::SPL_STRING,
				self::httpEquiv		=> __const_Type::SPL_STRING,
				self::name		=> __const_Type::SPL_STRING
			]));
		}
		
		public function toArray()
		{
			if(NULL === $this->__data)
				return [];
				
			$_ = parent::toArray();
			
			foreach($this->getTupleGC() as $k => $GC)
			{
				if(NULL === ($v = $this->__data[$k]))
					continue;
				
				switch($k):
					case self::charset:
						$_['charset'] = $v;
						break;
					case self::content:
						$_['content'] = $v;
						break;
					case self::httpEquiv:
						$_['http-equiv'] = $v;
						break;
					case self::name:
						$_['name'] = $v;
						break;
				endswitch;
			}
			
			$r = [];
			
			// 'http-equiv', 'name' before 'content'
			foreach(['charset', 'http-equiv', 'name', 'content'] as $k)
				FALSE === isset($_[$k]) ?: $r[$k] = $_[$k];
			
			return $r;
		}
	}