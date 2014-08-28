<?php

/**
	table:cart
	struct:{_id:uid,products:[{}]}
**/

class CartMongo extends MongoModel{

	protected $table='cart';

	public function getUserCart($uid,$cart,$options=array()){

		$data=array_merge(array('_id'=>$uid),array('products'=>$cart));

		$params=array('insert'=>$data,'_options'=>$options);
		
		return $this->query($params);
	}

	public function updateUserCart($uid,$cart,$options=array()){

		$params=array('update'=>array('_id'=>$uid),'_set'=>array('products'=>$cart,'utime'=>time()),'_options'=>$options);
		
		return $this->query($params);
	}
}