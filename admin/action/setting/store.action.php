<?php

class StoreAction extends AdminAction {

	protected $lang="setting/store";

	public function index() {

		$stores=M::setting('store','all',array());

		$this->assign(array('stores'=>$stores));

		$this->display('setting/store_list');
	}
 }