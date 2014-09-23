<?php

class AdminMysql extends MysqlModel{

	public function getAdmin($nick){

		$sql="SELECT * FROM ".DB_PREFIX."admin WHERE nick = '" . $nick . "' AND status = 1";
		
		return $this->get($sql);
	}

	public function getAdminByID($uid){

		$sql="SELECT * FROM ".DB_PREFIX."admin WHERE uid={$uid}";

		return $this->get($sql);
	}
}