<?php

class OrderAction extends AdminAction {
	
	protected $lang="sale/order";

  	public function index() {

  		$this->display('sale/order_list');
  	}
}