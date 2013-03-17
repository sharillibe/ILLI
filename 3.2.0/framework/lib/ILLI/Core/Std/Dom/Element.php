<?PHP
	NAMESPACE ILLI\Core\Std\Dom;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Dom\Attributes;
	USE ILLI\Core\Util\String;
	
	CLASS Element EXTENDS \ILLI\Core\Std\Def\ADVTuple
	{
		CONST __GC		= __CLASS__;	#! Element is a pseudo-abstract class
		
		CONST name		= 0x00;
		CONST close		= 0x01;
		CONST attribute		= 0x02;
		CONST content		= 0x03;
		CONST parent		= 0x04;
		
		protected static $__defineT =
		[
			self::attribute		=> ['ILLI\Core\Std\Dom\Attributes'],
			self::content		=> ['ILLI\Core\Std\Dom\Element'],
			self::parent		=> ['ILLI\Core\Std\Dom\Element']
		];
		
		protected static $__template =
		[
			0 => '<{:name}{:attributes}></{:name}>',
			1 => '<{:name}{:attributes} />',
			2 => '<{:name}{:attributes}>{:content}</{:name}>'
		];
		
		/**
		 * Instantiate a new DOM Element.
		 *
		 * :offset<long>
		 *	zero-based index
		 *
		 * :gcType<string>
		 *	a valid __const_Type
		 *
		 * :gcValue<string>
		 *	a valid __const_Type value
		 *
		 * @param	array	$__defineOffsetType	[{:offset} => {:gcType}]
		 * @param	array	$__data			the initial data [{:offset} => {:gcValue}]
		 */
		public function __construct(array $__defineOffsetType = [], array $__data = [])
		{
			parent::__construct
			(
				parent::mergeOffsetTypes($__defineOffsetType, [
					self::name		=> __const_Type::SPL_STRING,
					self::close		=> __const_Type::SPL_BOOLEAN,
					self::attribute		=> static::$__defineT[self::attribute],
					self::content		=> static::$__defineT[self::content],
					self::parent		=> static::$__defineT[self::parent]
				]),
				parent::mergeOffsetValues($__data, [
					self::name		=> 'stub',
					self::close		=> TRUE,
					self::attribute		=> new Attributes,
					self::content		=> NULL,
					self::parent		=> NULL
				])
			);
		}
		
		public function __toString()
		{
			return (string) $this->render();
		}
		
		public function render()
		{
			$c = NULL !== ($c = $this->content) ? $c : NULL;
			
			return String::insert
			(
				static::$__template[$c ? 2 : (TRUE === $this->close ? 0 : 1)],
				['name' => $this->name, 'content' => $c, 'attributes' => (NULL === ($a = $this->attribute->render()) ? '' : ' '.$a)]
			);
		}
		
		public function __set($__constantName, $__value)
		{
			if($__constantName === 'name')
				return;
				
			parent::__set($__constantName, $__value);
			
			if($__constantName === 'content'
			&& $this->content instanceOf Element)
				$this->content->parent = $this;
		}
	}