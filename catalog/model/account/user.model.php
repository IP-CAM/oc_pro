<?php

class UserMongo extends MongoModel{

	public function updateUser($uid,$data,$options=array()){

		$data=array_merge(array('ctime'=>time(),'status'=>0),$data);

		$params=array('update'=>array('_id'=>$uid),'_set'=>$data,'_options'=>$options);
		
		return $this->query($params);
	}

	public function getUser($uid){

		$params=array('findOne'=>array('_id'=>$uid));
		
		return $this->get($params);
	}

	public function getUserBy($where){

		$params=array('findOne'=>$where);

		return $this->get($params);
	}
}