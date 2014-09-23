<?php

// store:mysql && sphinx

class Item extends Medium{

	public function run($action,$data){

		switch ($action) {

			case 'detail':return $this->detail($data); break;

			case 'detail.async':return $this->detailAsync($data);break;

		}
	}

	private function detail($data){

		$iid=$data['iid'];

		$item=SEA::product('item','getItem_v2',array($iid));

		return $item;
	}

	private function detailAsync($data){

		$sign=$data['sign'];

		$iid=$data['iid'];

		SEA::product('item','getItem',array($sign,$iid));
	}
}