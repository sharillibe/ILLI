<?PHP
	NAMESPACE ILLI\Core\Std\Def;

	TRAIT __trait_ADVCountable
	{
		public function count()
		{
			$count = iterator_count($this->__data);
			rewind($this->__data);
			return $count;
		}
	}