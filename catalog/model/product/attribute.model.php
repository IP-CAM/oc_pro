<?php

class AttributeSphinx extends SphinxModel {

	protected $index=INDEX_ATTRIBUTE;

	public function getAttribute($attribute_id) {

		return $this->one($attribute_id);
	}
					
	public function getProductAttributes($attributes) {

		if(empty($attributes) || !is_array($attributes)) return array();

		$this->addFilter(SPH_FILTER_VALUES,'@id',$attributes);

		return $this->find(array());
	}

	public function getAttributesByGroup($group_attribute_id){

		$this->addFilter(SPH_FILTER_VALUES,'attribute_group_id',array($group_attribute_id));

		$res=$this->find();

		return $res['value'];
	}
	
	public function getGroupAttribute(){

		$params=array('_select'=>'attribute_group_id,group_name','_groupby'=>'attribute_group_id');

		$res=$this->find(array(),$params);

		return $res['value'];
	}

	public function getColorAttributes($color_attribute_id){

		$this->addFilter(SPH_FILTER_VALUES,'@id',array($color_attribute_id));

		$params=array('_select'=>'name,code');

		$res=$this->find(array(),$params);
		
		return $res['value'];
	}

}
