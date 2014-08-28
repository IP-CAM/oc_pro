<?php

class LatestAction extends AdminAction {

	protected $lang='module/latest';

	public function index() {   
				
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {

			$this->model_setting_setting->editSetting('latest', $this->request->post);		
						
			go(admin_url('extension/module'));
		}

		$this->display('module/latest');
	}
}