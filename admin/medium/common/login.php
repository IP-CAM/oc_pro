<?php

class Login extends Medium{

	public function run($action,$data){
	
		switch ($action) {
	
			case 'local':return $this->local($data);break;
	
		}
	}
	
	private function local($data){
		
		$uname=$data['uname'];
		$password=$data['password'];

		if(empty($uname) || empty($password)) return 'uname or password can not empty';

		$admin=D("admin/admin")->getAdmin($uname);

		if(empty($admin)) return 'no this user';

		if($admin['password']!=SHA1($admin['salt'].SHA1($admin['salt'].SHA1($password)))) return 'password error';

		$uid=$admin['uid'];
		
		S('ADMIN_UID',$uid);

		S('ADMIN',$admin);

		$ip=getip();

		$time=time();

		$logged="{$_SERVER['HTTP_HOST']};{$ip};{$uid};{$time}";
		
		C('ADMINLOGGED',encrypt($logged));

		return true;
	}
}