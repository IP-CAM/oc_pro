<?php

// store:mysql && sphinx

class Order extends Medium{

	public function run($action,$data){

		switch ($action) {

			case 'get':return $this->get($data);break;

			case 'add':return $this->add($data);break;

			case 'user.list':return $this->userList($data);break;
		}
	}

	private function add($data){

		$order=array();

		$order['order_no']=uniqid(ORDER_NO_PREFIX,false);

		$order['products']=array(array('product_id'=>23,'title'=>'hello'));

		$order['shipping']=array('address'=>'paypal');

		$order['payment']=array('method'=>'paypal','total'=>3434);

		$order['total']=array(array('name'=>'subtotal','amount'=>23),array('name'=>'shipping','amount'=>10));

		NOSQL::order('order','addOrder',array($order));
	}

	private function get($data){

		$order_no=$data['order_no'];

		if(empty($order_no)) return array();

		return NOSQL::order('order','getOrderByNO',array($order_no));
	}

	private function userList($data){

		$page=$data['page'];

		$limit=$data['limit'];

		$order=$data['sort'];

		return NOSQL::order('order','getUserOrders',array(S('UID',$sort,$page,$limit)));
	}
}