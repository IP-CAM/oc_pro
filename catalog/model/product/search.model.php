<?php

class SearchSphinx extends SphinxModel {

	protected $index=INDEX_ITEM;

	public function searchProducts($q,$cid,$attrs,$sort,$page,$limit){
		
		$params=array('_select'=>'title,price,special,alias,cid,product_images','_offset'=>$limit*($page-1),'_limit'=>$limit);

		!empty($cid) && $this->addFilter(SPH_FILTER_VALUES,'cid',array($cid));
			
		!empty($attrs) && $this->addFilter(SPH_FILTER_VALUES,'product_attrs',$attrs);
		
		!empty($sort) && $params=array_merge($params,$sort);

		$data=array('@title'=>$q);

		return $this->find($data,$params);
	}
}