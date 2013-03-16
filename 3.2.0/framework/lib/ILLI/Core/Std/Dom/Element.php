<?PHP
	NAMESPACE ILLI\Core\Std\Dom;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Dom\Attributes;
	USE ILLI\Core\Util\String;
	
	CLASS Element EXTENDS \ILLI\Core\Std\Def\ADVTuple
	{
		CONST __GC		= __CLASS__;
			
		CONST name		= 0x00;
		CONST close		= 0x01;
		CONST attribute		= 0x02;
		CONST content		= 0x03;
		
		public function __construct($__defineOffsetType = [], $__data = NULL)
		{
			parent::__construct(parent::mergeOffsetTypes([
				self::name		=> __const_Type::SPL_STRING,
				self::close		=> __const_Type::SPL_BOOLEAN,
				self::attribute		=> 'ILLI\Core\Std\Dom\Attributes',
				self::content		=> 'ILLI\Core\Std\Dom\Element'
			], $__defineOffsetType), (array) $__data +
			[
				self::name		=> 'div',
				self::close		=> TRUE,
				self::attribute		=> new Attributes
			]);
		}
		
		public function render()
		{
			$con = $this->content;
			$con = $con ? $con->render() : NULL;
			$tpl = $con ? '<{:name} {:attributes}>{:content}</{:name}>' : (TRUE === $this->close ? '<{:name} {:attributes}></{:name}>' : '<{:name} {:attributes} />');
			
			$ins = ['name' => $this->name, 'content' => $con, 'attributes' => $this->attribute->render()];
			
			return String::insert($tpl, $ins);
		}
	}