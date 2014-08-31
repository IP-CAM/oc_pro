<?php

class AdminMysql extends MysqlModel{

	public function getAdmin($nick){

		$sql="SELECT * FROM ".DB_PREFIX."user WHERE username = '" . $nick . "' AND status = 1";
		
		return $this->get($sql);
	}

	public function getAdminByID($uid){

		$sql="SELECT * FROM ".DB_PREFIX."user WHERE user_id={$uid}";

		return $this->get($sql);
	}
}