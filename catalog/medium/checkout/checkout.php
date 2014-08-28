<?php

class Checkout extends Medium{

	public function run($action,$data){
	
		switch ($action) {

			case 'select.address':return $this->selectAddress();
	
			case 'pay':return $this->pay($data);break;
	
		}
	}
	
	private function pay($data){
		
	}
}