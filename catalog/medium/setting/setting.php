<?php

class Setting extends Medium{

	public function run($action,$data){
	
		switch ($action) {
	
			case 'cache':return $this->cache();break;

			case 'cache.key':return $this->cacheKey($data['key']);break;

			case 'get':return $this->get($data['key']);break;
	
		}
	}
	
	private function cache(){
		
		$settings=SQL::setting('setting','getSettings',array());

		foreach ($settings as $setting)  CACHE::setting('setting','setSetting',array($setting['key'],$setting['value']));
	}

	public function cacheKey($key){
		
		$setting=SQL::setting('setting','getSettingByKey',array($key));

		if(empty($setting)) return;

		CACHE::setting('setting','setSetting',array($setting['key'],$setting['value']));
	}

	private function get($key){

		$cache=CACHE::setting('setting','exists',array(REDIS_SETTING_KEY_PREFIX.$key));

		if(!$cache) $this->cacheKey($key);

		return CACHE::setting('setting','getSetting',array($key));
	}
}