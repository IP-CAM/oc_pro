<?php

// store:mysql && sphinx

class Product extends Medium{

	public function run($action,$data){

		switch ($action) {

			case 'detail':return $this->detail($data); break;

			case 'detail.async':return $this->detailAsync($data);break;

		}
	}

	private function detail($data){

		$product_id=$data['product_id'];

		$product=SEA::product('product','getProduct_v2',array($product_id));

		return $product;
	}

	private function detailAsync($data){

		$sign=$data['sign'];

		$product_id=$data['product_id'];

		SEA::product('product','getProduct',array($sign,$product));
	}
}