<?php

class LogoutAction extends AdminAction{

	public function index(){

		S('ADMIN_UID',null);

		S('ADMIN',null);

		unset($_SESSION);

		session_destroy();

		go('/admin/index.php?app=login');
	}
}