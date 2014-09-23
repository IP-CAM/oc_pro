<?php

class Option extends Medium{

	public function run($action,$data){
	
		switch ($action) {
	
			case 'item.option':return $this->itemOption($data);break;
	
		}
	}

	private function itemOption($data){

		$sign=$data['sign'];

		$options=$data['options'];

		return SEA::product('option','getItemOptions',array($sign,$options));
	}
}