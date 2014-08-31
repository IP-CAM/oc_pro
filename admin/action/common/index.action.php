<?php
  
class IndexAction extends AdminAction {

	protected $lang="common/index";

	public function index() {

		$this->display('common/home');
  	}
}