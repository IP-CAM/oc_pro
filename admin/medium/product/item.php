<?php

// store:mysql && sphinx

class Item extends Medium{

	public function run($action,$data){

		switch ($action) {

			case 'detail':return $this->detail($data); break;

			case 'list':return $this->listItem($data);break;

		}
	}

	private function detail($data){

		$iid=$data['iid'];

		$product=SEA::product('item','getItem_v2',array($iid));

		return $product;
	}

	private function listItem($data){

		$sign=$data['sign'];

		$GLOBALS['USE_CATALOG']=1;

		return SEA::product('item','getItems',array());
	}
}