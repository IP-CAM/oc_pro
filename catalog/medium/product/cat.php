<?php

class Cat extends Medium{

	public function run($action,$data){
	
		switch ($action) {
	
			case 'top':return $this->top();break;

			case 'get':return $this->get($data);break;

			case 'get.async':return $this->getAsync($data);break;

			case 'child':return $this->child($data);break;
	
		}
	}

	private function top(){

		return SEA::product('cat','getTopCat',array());
	}

	private function get($data){

		assert(is_integer($data['cid']));

		return SEA::product('cat','getCat_v2',array($data['cid']));
	}

	private function getAsync($data){

		assert(is_integer($data['cid']));

		SEA::product('cat','getCat',array($data['sign'],$data['cid']));
	}

	private function child($data){

		assert(is_integer($data['pid']));

		return SEA::product('cat','getChildCat',array($data['pid']));
	}
}