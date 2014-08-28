<?php

class ImageSphinx extends SphinxModel {

	protected $index=INDEX_PRODUCT_IMAGE;

	public function getProductImages($sign,$images) {

		assert(is_array($images));

		$this->addFilter(SPH_FILTER_VALUES,'@id',$images);

		$this->add($sign);
	}
}
