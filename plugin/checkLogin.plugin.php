<?php

class CheckLoginPlugin extends Plugin{
	
	public function run($data){

		$uid=S('UID');

		if(!empty($uid)) return 1;

		$logged=C('logged');

		if(!empty($logged)){
			
			$logged=decrypt($logged);

			$array=explode(';', $logged);

			$userinfo=array();

			if($_SERVER['HTTP_HOST']==$array[0] &&  getip()==$array[1]){

				$userinfo=SEA::account('user','get.by.uid',array('uid'=>$array[2]));
			}
			
			return P('loginSession',$userinfo);
		}

		return 0;
	}
}