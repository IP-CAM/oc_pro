<?php

class ProductSphinx extends SphinxModel {

	protected $index=INDEX_PRODUCT;

	public function getProduct($sign,$product_id) {

		$params=array('_max_id'=>$product_id,'_min_id'=>$product_id);

		$this->add($sign,array(),$params);
	}

	public function getProduct_v2($product_id){
		
		return $this->one($product_id);
	}

	public function getCategoryProduct($cats,$data=array(),$attrs=array(),$sort=array(),$page=1,$limit=40){

		$attrs &&  $this->addFilter(SPH_FILTER_VALUES,'product_attrs',$attrs);

		$this->addFilter(SPH_FILTER_VALUES,'category_id',$cats);

		$params=array('_mode'=>SPH_MATCH_ALL,'_select'=>'*','_offset'=>($page-1)*$limit,'_limit'=>$limit);
		
		$params=array_merge($params,$sort);
		// print_r($params);exit();
		return $this->find($data,$params);
	}

	public function getCartProducts($products){

		if(empty($products) && !is_array($products)) return array();

		$this->addFilter(SPH_FILTER_VALUES,'@id',$products);

		return $this->find();
	}

	public function filterProductAttributeInCategory($category_id,$attributes=array()){

		$this->addFilter(SPH_FILTER_VALUES,'category_id',array($category_id));

		!empty($attributes) && $this->addFilter(SPH_FILTER_VALUES,'product_attrs',$attributes);

		$params=array('_select'=>'product_attrs','_groupby'=>'product_attrs');
		
		return $this->find(array(),$params);
	}

	public function getRelatedProduct($category_id,$title,$exclude,$limit){

		$this->addFilter(SPH_FILTER_VALUES,'category_id',array($category_id));

		$this->addFilter(SPH_FILTER_VALUES,'@id',array($exclude),true);

		$params=array('_select'=>'title,alias,price,category_id,product_images','_sortby'=>'@random','_limit'=>$limit);
		// TODO: 未处理分词
		// return $this->find(array('@(title,description,meta_keyword,tag)'=>$title),$params);
		return $this->find('',$params);
	}

	public function getProducts($data = array(),$sort=array(),$page=1,$limit=10) {

		// $filters[]=array("type"=>SPH_FILTER_VALUES, "attr"=>'@id', "exclude"=>false, "values"=>$products);

		$params=array('_sort'=>$sort[0],'_sortby'=>$sort[1],'_offset'=>($page-1)*$limit,'_limit'=>$limit);
		return $this->find(array(),$params);
	}

	public function getAttrCountByGroup($cats,$attrs){

		$this->addFilter(SPH_FILTER_VALUES,'category_id',$cats);

		$this->addFilter(SPH_FILTER_VALUES,'product_attrs',$attrs);

		$params=array('_select'=>'price','_groupby'=>'product_attrs');
		
		return $this->find('',$params);
	}

	public function getAttrCountByQ($q,$attrs){

		$this->addFilter(SPH_FILTER_VALUES,'product_attrs',$attrs);

		$params=array('_select'=>'price','_groupby'=>'product_attrs');
		
		return $this->find(array('@title'=>$q),$params);
	}

	public function recommandInCategory($products,$attr,$limit=6){

		$this->addFilter(SPH_FILTER_VALUES,'@id',$products);

		$attrs && $this->addFilter(SPH_FILTER_VALUES,'product_attrs',$attrs);

		$params=array('_select'=>'title,alias,price,category_id,discount,special,product_images','_limit'=>$limit);
		// print_r($params);exit();
		return $this->find('',$params);
	}

	public function alsoViewProducts($product_id,$limit=6){

		$this->addFilter(SPH_FILTER_VALUES,'@id',array($product_id));

		$params=array('_sortby'=>'@random','_select'=>'title,alias,price,category_id,discount,special,product_images','_limit'=>$limit);
		// print_r($params);exit();
		return $this->find('',$params);
	}
}
