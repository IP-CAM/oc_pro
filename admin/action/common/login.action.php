<?php  

class LoginAction extends Action {

	protected $lang='common/login';

	public function index() {

		S('AID') && go('/admin/');

		if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
		
			$status=M::common('login','local',array('uname'=>$_POST['username'],'password'=>$_POST['password']));
			// echo admin_url('common','index');exit();
			$status && go(admin_url('common','index'));
		}

		$this->display('common/login');
  	}
}