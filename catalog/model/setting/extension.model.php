<?php

class ExtensionMysql extends MysqlModel {

	public function getExtensions() {

		$res = $this->find("SELECT `type`,GROUP_CONCAT(`code`) as code FROM " . DB_PREFIX . "extension GROUP BY `type`;");
		return array_map(function($array){
			return array('type'=>$array['type'],'code'=>empty($array['code'])?'':explode(',',$array['code']));
		}, $res);
	}
}


// store:set

class ExtensionRedis extends RedisModel{

	public function setExtension($type,$code){

		assert(is_array($code));

		foreach ($code as $k => $v)  $this->sadd(REDIS_EXTENSION_KEY_PREFIX.$type,$v);
	}

	public function getExtension($type){

		assert(is_string($type));

		return $this->smembers(REDIS_EXTENSION_KEY_PREFIX.$type);
	}
}