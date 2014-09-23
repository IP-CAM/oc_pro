<?php

class OptionSphinx extends SphinxModel {

	protected $index=INDEX_OPTION;

	public function getOption($option_id) {

		return $this->one($option_id);
	}
					
	public function getItemOptions($sign,$options) {

		if(empty($options) || !is_array($options)) return array();

		$this->addFilter(SPH_FILTER_VALUES,'@id',$options);

		$this->add($sign);
	}
}
