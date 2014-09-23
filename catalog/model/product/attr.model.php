<?php

class AttrSphinx extends SphinxModel {

	protected $index=INDEX_ATTRIBUTE;

	public function getAttr($attr_id) {

		return $this->one($attr_id);
	}
					
	public function getItemAttr($attrs) {

		if(empty($attrs) || !is_array($attrs)) return array();

		$this->addFilter(SPH_FILTER_VALUES,'@id',$attrs);

		return $this->find(array());
	}

	public function getAttrsByGroup($attr_group_id){

		$this->addFilter(SPH_FILTER_VALUES,'attr_group_id',array($attr_group_id));

		$res=$this->find();

		return $res['value'];
	}
	
	public function getGroupAttr(){

		$params=array('_select'=>'attr_group_id,group_name','_groupby'=>'attr_group_id');

		$res=$this->find(array(),$params);

		return $res['value'];
	}

	public function getColorAttr($color_attr_id){

		$this->addFilter(SPH_FILTER_VALUES,'@id',array($color_attr_id));

		$params=array('_select'=>'name,code');

		$res=$this->find(array(),$params);
		
		return $res['value'];
	}

}
