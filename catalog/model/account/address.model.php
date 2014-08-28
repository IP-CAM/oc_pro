<?php

class AddressMysql extends MysqlModel{

	public function addAddress($data){

		$sql="INSERT INTO ".DB_PREFIX."address SET user_id='{S('UID')}',realname='{$data['realname']}',province='{$data['province']}',city='{$data['city']}',address='{$data['address']}',phone='{$data['phone']}';";

		return $this->get($sql);
	}

	public function getUserAddress($uid){

		$sql="SELECT * FROM ".DB_PREFIX."address WHERE user_id={$uid}";

		return $this->find($sql);
	}
}