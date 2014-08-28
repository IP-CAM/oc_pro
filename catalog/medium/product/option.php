<?php

class Option extends Medium{

	public function run($action,$data){
	
		switch ($action) {
	
			case 'product.option':return $this->productOption($data);break;
	
		}
	}

	private function productOption($data){

		$sign=$data['sign'];

		$options=$data['options'];

		return SEA::product('option','getProductOptions',array($sign,$options));
	}
}