<?php

class ProductAction extends AdminAction {
	
	protected $lang='product/product';
     
  	public function index() {

  		$products=M::product('product','list',array());

  		$this->assign(array('products'=>$products['value'],'total'=>$products['total']));

  		$this->display('product/product_list');
  	}

  	public function edit(){
  		$this->display('product/product_form');
  	}
}