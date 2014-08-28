<?php

class Layout extends Medium{

	public function run($action,$data){
	
		switch ($action) {
	
			case 'list':return $this->listLayout($data);break;

			case 'add':return $this->add($data);break;

			case 'del':return $this->del($data);break;
		}
	}
	
	private function listLayout($data){
		
	}

	private function add($data){

	}

	private function del($data){
		
	}
}