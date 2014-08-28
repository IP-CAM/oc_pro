<?php

class Image extends Medium{

	public function run($action,$data){
	
		switch ($action) {
	
			case 'product.image':return $this->productImage($data);break;
	
		}
	}

	private function productImage($data){

		$sign=$data['sign'];

		$images=$data['images'];

		return SEA::product('image','getProductImages',array($sign,$images));
	}
}