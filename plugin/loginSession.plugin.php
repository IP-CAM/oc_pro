<?php

class LoginSessionPlugin extends Plugin{

	public function run($userinfo){
		
		if(empty($userinfo)){

			C('logged',null);
			
			return 0;
		} 

		$uid=$userinfo['user_id'];

		S('user',$userinfo);

		S('uid',$uid);

		$ip=getip();

		$logged="{$_SERVER['HTTP_HOST']};{$ip};{$uid};{time()}";

		C('logged',encrypt($logged));

		return 1;
	}
}