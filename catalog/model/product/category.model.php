<?php

class CategorySphinx extends SphinxModel {

	protected $index=INDEX_CATEGORY;

	public function getCategory($sign,$category_id){

		$params=array('_max_id'=>$category_id,'_min_id'=>$category_id,'_select'=>'*');

		$this->add($sign,array(),$params);
	}

	public function getCategory_v2($category_id) {

		return $this->one($category_id);
	}

	public function getAllCategories() {

		return $this->find();
	}

	public function getTopCategory(){

		$this->addFilter(SPH_FILTER_VALUES,'top',array(1));

		$res=$this->find();

		return $res['value'];
	}

	public function getChildCategories($sign,$parent_id){

		$this->addFilter(SPH_FILTER_VALUES,'parent_id',array($parent_id));

		$this->add($sign);
	}
}
