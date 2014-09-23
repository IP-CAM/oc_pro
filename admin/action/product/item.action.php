<?php

class ItemAction extends AdminAction {
	
	protected $lang='product/item';
     
  	public function index() {

  		$products=M::product('item','list',array());

  		$this->assign(array('products'=>$products['value'],'total'=>$products['total']));

  		$this->display('product/item_list');
  	}

  	public function edit(){
  		$this->display('product/product_form');
  	}
}