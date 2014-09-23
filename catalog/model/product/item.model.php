<?php

class ItemSphinx extends SphinxModel {

	protected $index=INDEX_ITEM;

	public function getItem($sign,$iid) {

		$params=array('_max_id'=>$iid,'_min_id'=>$iid);

		$this->add($sign,array(),$params);
	}

	public function getItem_v2($iid){
		
		return $this->one($iid);
	}

	public function getCatItem($cats,$data=array(),$attrs=array(),$sort=array(),$page=1,$limit=40){

		$attrs &&  $this->addFilter(SPH_FILTER_VALUES,'attrs',$attrs);

		$this->addFilter(SPH_FILTER_VALUES,'cid',$cats);

		$params=array('_mode'=>SPH_MATCH_ALL,'_select'=>'*','_offset'=>($page-1)*$limit,'_limit'=>$limit);
		
		$params=array_merge($params,$sort);
		// print_r($params);exit();
		return $this->find($data,$params);
	}

	public function getCartItems($items){

		if(empty($items) && !is_array($items)) return array();

		$this->addFilter(SPH_FILTER_VALUES,'@id',$items);

		return $this->find();
	}

	public function filterItemAttrInCat($cid,$attrs=array()){

		$this->addFilter(SPH_FILTER_VALUES,'cid',array($cid));

		!empty($attrs) && $this->addFilter(SPH_FILTER_VALUES,'attrs',$attrs);

		$params=array('_select'=>'attrs','_groupby'=>'attrs');
		
		return $this->find(array(),$params);
	}

	public function getRelatedItem($cid,$title,$exclude,$limit){

		$this->addFilter(SPH_FILTER_VALUES,'cid',array($cid));

		$this->addFilter(SPH_FILTER_VALUES,'@id',array($exclude),true);

		$params=array('_select'=>'title,alias,price,cid,product_images','_sortby'=>'@random','_limit'=>$limit);
		// TODO: 未处理分词
		// return $this->find(array('@(title,description,meta_keyword,tag)'=>$title),$params);
		return $this->find('',$params);
	}

	public function getItems($data = array(),$sort=array(),$page=1,$limit=10) {

		// $filters[]=array("type"=>SPH_FILTER_VALUES, "attr"=>'@id', "exclude"=>false, "values"=>$products);

		$params=array('_sort'=>$sort[0],'_sortby'=>$sort[1],'_offset'=>($page-1)*$limit,'_limit'=>$limit);
		return $this->find(array(),$params);
	}

	public function getAttrCountByGroup($cats,$attrs){

		$this->addFilter(SPH_FILTER_VALUES,'cid',$cats);

		$this->addFilter(SPH_FILTER_VALUES,'attrs',$attrs);

		$params=array('_select'=>'price','_groupby'=>'attrs');
		
		return $this->find('',$params);
	}

	public function getAttrCountByQ($q,$attrs){

		$this->addFilter(SPH_FILTER_VALUES,'attrs',$attrs);

		$params=array('_select'=>'price','_groupby'=>'attrs');
		
		return $this->find(array('@title'=>$q),$params);
	}

	public function recommandInCategory($products,$attr,$limit=6){

		$this->addFilter(SPH_FILTER_VALUES,'@id',$products);

		$attrs && $this->addFilter(SPH_FILTER_VALUES,'attrs',$attrs);

		$params=array('_select'=>'title,alias,price,cid,discount,special,product_images','_limit'=>$limit);
		// print_r($params);exit();
		return $this->find('',$params);
	}

	public function alsoViewItems($iid,$limit=6){

		$this->addFilter(SPH_FILTER_VALUES,'@id',array($iid));

		$params=array('_sortby'=>'@random','_select'=>'title,alias,price,cid,discount,special,product_images','_limit'=>$limit);
		// print_r($params);exit();
		return $this->find('',$params);
	}
}
