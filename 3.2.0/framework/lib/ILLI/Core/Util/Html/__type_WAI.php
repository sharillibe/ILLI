<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	USE ILLI\Core\Std\Def\__const_Type;
	
	CLASS __type_WAI EXTENDS ElementAttributes
	{
		CONST aria		= 0x00;
		CONST role		= 0x01;
		
		/**
		 * global WAI attributes
		 *
		 *	$a = new Link;
		 *	$a->wai->role = 'checkbox';
		 *	$a->wai->aria = ['foo' => 'bar'];
		 *	print $a; // <link aria-foo="bar" role="checkbox" />
		 *
		 * @see ILLI\Core\Util\Html\__type_Attributes
		 */
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes($__defineOffsetType, [
				self::aria		=> __const_Type::SPL_ARRAY,
				self::role		=> __const_Type::SPL_STRING
			]), $__data);
		}
		
		public function toArray()
		{
			if(NULL === $this->__data)
				return [];
				
			$_ = [];
			
			foreach($this->getTupleGC() as $k => $GC)
			{
				if(NULL === ($v = $this->__data[$k]))
					continue;
				
				switch($k):
					case self::aria:
						if([] === $v)
							continue;
						
						foreach($v as $l => $w)
							$_['aria-'.$l] = $w;
						
						break;
					case self::role:
						$_['role'] = $v;
						break;
				endswitch;
			}
			
			return $_;
		}
	}