<?php

class User extends Medium{

	public function run($action,$data){
	
		switch ($action) {
	
			case 'get.by.uid':return $this->getUserByID($data['uid']);break;

			case 'get.by.nick':return $this->getUserByNick($data['nick']);break;

			case 'get.by.phone':return $this->getUserByPhone($data['phone']);break;
	
		}
	}
	
	private function getUserByID($data){

		assert(is_int($data['uid']));
		
		return NOSQL::account('user','getUser',array($uid));
		// return SEA::account('user','getUserByID',array($data['uid']));
	}

	private function getUserByNick($nick){
		
		assert(is_string($nick));
		
		return NOSQL::account('user','getUserBy',array(array('nick'=>$nick)));
	}

	private function getUserByPhone($phone){
		
		return NOSQL::account('user','getUserBy',array(array('phone'=>$phone)));
	}
}