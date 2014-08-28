<?php

// store:mysql && sphinx

class Product extends Medium{

	public function run($action,$data){

		switch ($action) {

			case 'detail':return $this->detail($data); break;

			case 'list':return $this->listProducts($data);break;

		}
	}

	private function detail($data){

		$product_id=$data['product_id'];

		$product=SEA::product('product','getProduct_v2',array($product_id));

		return $product;
	}

	private function listProducts($data){

		$sign=$data['sign'];

		$GLOBALS['USE_CATALOG']=1;

		return SEA::product('product','getProducts',array());
	}
}