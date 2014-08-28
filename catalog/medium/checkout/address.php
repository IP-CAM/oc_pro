<?php

// store:mysql

const ADDRESS_NO_ADDRESS='';
const ADDRESS_NO_PHONE='';
const ADDRESS_NO_REALNAME='';


class Address extends Medium{

	public function run($action,$data){

		if(!P('checkLogin')) return false;
	
		switch ($action) {
		
			case 'add':return $this->add($data);break;
	
		}
	}
	
	private function add($data){
		
		$country=$data['country'];
		$city=$data['city'];
		$zone=$data['zone'];
		$address=$data['address'];
		$phone=$data['phone'];
		$realname=$data['realname'];

		if(empty($address)) return ADDRESS_NO_ADDRESS;
		if(empty($phone)) return ADDRESS_NO_PHONE;
		if(empty($realname)) return ADDRESS_NO_REALNAME;

		

	}
}