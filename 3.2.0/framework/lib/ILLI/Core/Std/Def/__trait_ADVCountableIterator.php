<?PHP
	NAMESPACE ILLI\Core\Std\Def;

	TRAIT __trait_ADVCountableIterator
	{
		public function count()
		{
			return $this->__data->count();
		}
	}