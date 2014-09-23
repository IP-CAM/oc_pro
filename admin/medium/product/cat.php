<?php

class Cat extends Medium{

	public function run($action,$data){
	
		switch ($action) {
	
			case 'all':return $this->all();break;

			case 'get':return $this->get($data);break;

			case 'child':return $this->child($data);break;
	
		}
	}

	private function all(){

		$GLOBALS['USE_CATALOG']=1;

		return SEA::product('cat','getAllCat',array());
	}

	private function get($data){

		assert(is_integer($data['cid']));

		$GLOBALS['USE_CATALOG']=1;

		return SEA::product('cat','getCat_v2',array($data['cid']));
	}

	private function child($data){

		assert(is_integer($data['pid']));

		$GLOBALS['USE_CATALOG']=1;

		return SEA::product('cat','getChildCat',array($data['pid']));
	}
}