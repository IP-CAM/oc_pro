<?php

class SearchSphinx extends SphinxModel {

	protected $index=INDEX_PRODUCT;

	public function searchProducts($q,$cid,$attrs,$sort,$page,$limit){
		
		$params=array('_select'=>'title,price,special,alias,category_id,product_images','_offset'=>$limit*($page-1),'_limit'=>$limit);

		!empty($cid) && $this->addFilter(SPH_FILTER_VALUES,'category_id',array($cid));
			
		!empty($attrs) && $this->addFilter(SPH_FILTER_VALUES,'product_attrs',$attrs);
		
		!empty($sort) && $params=array_merge($params,$sort);

		$data=array('@title'=>$q);

		return $this->find($data,$params);
	}
}