<?php

class AdminMysql extends MysqlModel{

	protected $table='admin';

	public function getAdmin($nick){

		$param=array('where'=>array('nick'=>$nick,'status'=>1));
		
		return $this->one($sql);
	}

	public function getAdminByID($uid){

		$param=array('where'=>array('uid'=>$uid));
		
		return $this->one($sql);
	}
}