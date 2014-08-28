<?php

/**	本地登录	**/

//目前只支持用户名登录

define('LGOIN_ERROR_ACCOUNT',-1); // 账户不存在
define('LGOIN_ERROR_PASSWORD',-2); // 密码错误
define('LGOIN_ERROR_OTHER',0); // 其他原因

define('LOGIN_SUCCESS',1);


class Login extends Medium{

	public function run($action,$data){

		$password=$data['password'];

		$status=0;
	
		switch ($action) {
	
			case 'nick':$status=$this->nick($data['nick'],$password);break;

			case 'email':$status=$this->email($data['email'],$password);break;

			case 'phone':$status=$this->phone($data['phone'],$password);break;
	
		}

		if($status!=LOGIN_SUCCESS) return $status;

		P('loginSesssion',$userinfo);
	}
	
	private function nick($nick,$password){
		
		$userinfo=SEA::account('user','getUserByNick',array($nick));
		print_r($userinfo);

	}

	private function email($email,$password){
		

	}

	private function phone($phone,$password){
		

	}

	private function update(){

	}

	private function cart(){
		
	}

}