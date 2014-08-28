<?php 

class CategoryAction extends AdminAction {

	protected $lang="product/category";
 
	public function index() {

		$categories=M::product('category','all',array());

		$total=$categories['total'];

		$this->assign(array('categories'=>$categories['value'],'total'=>$total));

		$this->display('product/category_list');
	}

	public function edit(){

		$this->display('product/category_form');
	}	
}
