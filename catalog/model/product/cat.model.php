<?php

class CatSphinx extends SphinxModel {

	protected $index=INDEX_CATEGORY;

	public function getCat($sign,$cid){

		$params=array('_max_id'=>$cid,'_min_id'=>$cid,'_select'=>'*');

		$this->add($sign,array(),$params);
	}

	public function getCat_v2($cid) {

		return $this->one($cid);
	}

	public function getAllCat() {

		return $this->find();
	}

	public function getTopCat(){

		$this->addFilter(SPH_FILTER_VALUES,'top',array(1));

		$res=$this->find();

		return $res['value'];
	}

	public function getChildCat($sign,$parent_id){

		$this->addFilter(SPH_FILTER_VALUES,'pid',array($parent_id));

		$this->add($sign);
	}
}
