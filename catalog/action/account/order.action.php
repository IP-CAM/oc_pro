<?php

class OrderAction extends Action{

	public function index(){

		$order=M::order('order','get',array('order_no'=>'WF53f435149be029.25215691'));
		print_r($order);
	}
}