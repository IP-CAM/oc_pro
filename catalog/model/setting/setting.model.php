<?php

class SettingMysql extends MysqlModel {

	public function getSettings() {

		return $this->find("SELECT * FROM " . DB_PREFIX . "setting;");
	}

	public function getSettingByKey($key){

		return $this->find("SELECT * FROM " . DB_PREFIX . "setting WHERE `key`='{$key}';");	
	}
}

// store:string

class SettingRedis extends RedisModel{

	public function setSetting($key,$value){

		assert(is_string($value));

		$this->set(REDIS_SETTING_KEY_PREFIX.$key,$value);
	}

	public function getSetting($key){

		assert(is_string($key));

		$value = $this->get(REDIS_SETTING_KEY_PREFIX.$key);
		
		return unserialize($value);
	}
}