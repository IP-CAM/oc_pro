<?php

class ImageSphinx extends SphinxModel {

	protected $index=INDEX_ITEM_IMAGE;

	public function getItemImage($sign,$images) {

		assert(is_array($images));

		$this->addFilter(SPH_FILTER_VALUES,'@id',$images);

		$this->add($sign);
	}
}
