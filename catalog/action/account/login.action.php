<?php

class LoginAction extends Action{

	protected $lang="account/login";

	public function index(){

		if($_SERVER['REQUEST_METHOD']=='POST' && $this->validate($_POST)){

		}


		// M::common('login','nick',array('nick'=>'tvrc4m','password'=>'password'));

		$this->display('account/login');
	}

	public function validate($post){

		$nick=$post['nick'];

		
	}


}