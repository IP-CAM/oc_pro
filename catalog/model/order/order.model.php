<?php

/**
	{_id:int,order_no:string,uid:int,products:[{}],payment:[{}],shipping:{},status:tinyint,ctime:int,utime:int}
**/

class OrderMongo extends MongoModel{

	protected $table='order';

	public function addOrder($data,$options=array()){

		$data=array_merge(array('ctime'=>time(),'status'=>ORDER_STATUS_PENDING),$data);

		$params=array('insert'=>$data,'_options'=>$options);
		
		return $this->query($params);
	}

	public function updateOrder($order_no,$data,$options=array()){

		$data=array_merge(array('utime'=>time()),$data);

		$params=array('update'=>array('order_no'=>$order_no),'_set'=>$data,'_options'=>$options);
		
		return $this->query($params);
	}

	public function getOrderByNO($order_no){

		$params=array('findOne'=>array('order_no'=>$order_no));
		
		return $this->get($params);
	}

	public function getOrder($_id){

		$params=array('findOne'=>array('_id'=>$_id));
		
		return $this->get($params);
	}

	public function getUserOrders($uid,$sort=array(),$page=1,$limit=20){

		$params=array('find'=>array('uid'=>$uid),'sort'=>$sort,'skip'=>($page-1)*$limit,'limit'=>$limit);
		
		return $this->find($params);
	}
}