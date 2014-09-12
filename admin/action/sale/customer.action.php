<?php

class CustomerAction extends AdminAction { 
	
	protected $lang='sale/customer';
  
  	public function index() {

		$this->display('sale/customer_list');
  	}
 }