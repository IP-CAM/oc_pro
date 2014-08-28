<?php

class NeedLoginPlugin extends Plugin{
	
	public function run($data){
echo 3434;exit();
		$status=P('CheckLogin');

		//$furl='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_RUI'];
		
		if(!$status) go(HOST.'/login.html');

		return 1;
	}
}