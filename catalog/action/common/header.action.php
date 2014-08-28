<?php

class HeaderAction extends Action{

	public function index($args){
		// page title,keywords,description
		$this->assign($args);

		$this->children=M::setting('layout','layout',array('position'=>'content_top','layout'=>1));

		return $this->fetch('common/header');
	}
}