<?PHP
	NAMESPACE ILLI\Core\Util\Html\Element;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Util\Html\__addr_Attributes;
	USE ILLI\Core\Util\Html\__name_Attributes;
	
	CLASS __type_Meta EXTENDS \ILLI\Core\Util\Html\__type_Attributes
	{
		CONST charset		= __addr_Attributes::META_charset;
		CONST content		= __addr_Attributes::META_content;
		CONST httpEquiv		= __addr_Attributes::META_httpEquiv;
		CONST name		= __addr_Attributes::META_name;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::charset		=> [__const_Type::SPL_STRING],
				self::content		=> [__const_Type::SPL_STRING],
				self::httpEquiv		=> [__const_Type::SPL_STRING],
				self::name		=> [__const_Type::SPL_STRING]
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
						$_[__name_Attributes::DOM_charset] = $v;
						break;
					case self::content:
						$_[__name_Attributes::DOM_content] = $v;
						break;
					case self::httpEquiv:
						$_[__name_Attributes::DOM_httpEquiv] = $v;
						break;
					case self::name:
						$_[__name_Attributes::DOM_name] = $v;
						break;
				endswitch;
			}
			
			$r = [];
			
			// 'http-equiv', 'name' before 'content'
			foreach([
				__name_Attributes::DOM_charset,
				__name_Attributes::DOM_httpEquiv,
				__name_Attributes::DOM_name,
				__name_Attributes::DOM_content
			] as $k)
				FALSE === isset($_[$k]) ?: $r[$k] = $_[$k];
			
			return $r;
		}
	}