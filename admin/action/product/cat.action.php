<?php 

class CatAction extends AdminAction {

	protected $lang="product/cat";
 
	public function index() {

		$cats=M::product('cat','all',array());

		$total=$cats['total'];

		$this->assign(array('cats'=>$cats['value'],'total'=>$total));

		$this->display('product/cat_list');
	}

	public function edit(){

		$this->display('product/cat_form');
	}	
}
