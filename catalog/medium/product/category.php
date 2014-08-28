<?php

class Category extends Medium{

	public function run($action,$data){
	
		switch ($action) {
	
			case 'top':return $this->top();break;

			case 'get':return $this->get($data);break;

			case 'get.async':return $this->getAsync($data);break;

			case 'child':return $this->child($data);break;
	
		}
	}

	private function top(){

		return SEA::product('category','getTopCategory',array());
	}

	private function get($data){

		assert(is_integer($data['cid']));

		return SEA::product('category','getCategory_v2',array($data['cid']));
	}

	private function getAsync($data){

		assert(is_integer($data['cid']));

		SEA::product('category','getCategory',array($data['sign'],$data['cid']));
	}

	private function child($data){

		assert(is_integer($data['pid']));

		return SEA::product('category','getChildCategories',array($data['pid']));
	}
}