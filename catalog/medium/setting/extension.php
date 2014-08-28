<?php

class Extension extends Medium{

	public function run($action,$data){
	
		switch ($action) {
	
			case 'cache':return $this->cache();break;

			case 'get':return $this->get($data['type']);break;
	
		}
	}
	
	private function cache(){
		
		$extensions=SQL::setting('extension','getExtensions',array());
		
		foreach ($extensions as $extension)  CACHE::setting('extension','setExtension',array($extension['type'],$extension['code']));
	}

	private function get($type){

		$cache=CACHE::setting('extension','exists',array(REDIS_EXTENSION_KEY_PREFIX.$type));

		if(!$cache) $this->cache();

		return CACHE::setting('extension','getExtension',array($type));
	}
}