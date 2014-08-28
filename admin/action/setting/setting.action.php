<?php

class SettingAction extends AdminAction {

	protected $lang='setting/setting';
	 
	public function index() {
		
		$this->display('setting/setting');
	}
}
