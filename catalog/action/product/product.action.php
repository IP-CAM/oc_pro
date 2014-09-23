<?php

class ProductAction extends Action{

	public function index(){
		
		$id=$_GET['id'];

		empty($id) && exit('no product id');

		$product=M::product('product','detail',array('item_id'=>$id));

		empty($product) && go('/');

		// print_r($product);//exit();

		M::product('image','product.image',array('sign'=>'product_images','images'=>$product['product_images']));

		M::product('option','product.option',array('sign'=>'product_options','options'=>$product['product_options']));

		M::product('category','get.async',array('sign'=>'category','cid'=>$product['cid']));

		// M::product('')

		$result = SEA::run();

		$images=$result['product_images'];

		$options=$result['product_options'];

		print_r($result);exit();

		$this->display('product/product');
	}
	
}