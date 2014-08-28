<?php

class Extension extends Medium{

	public function run($action,$data){
	
		switch ($action) {
	
			case 'installed':return $this->installed($data);break;

			case 'install':return $this->install($data);break;

			case 'uninstall':return $this->uninstall($data);break;
	
		}
	}
	
	private function installed($data){

		$type=$data['type'];
		
		$installed=SQL::extension('extension','getExtensionByType',array($type));

		foreach ($installed as $code) {

			if (!file_exists(ACTION .$type. '/' . $code . '.action.php')) {

				$this->uninstall(array('code'=>$code));

				unset($installed[$code]);
			}
		}
		
		$extensions = array();
		
		foreach (glob(ACTION .$type. '/*.action.php') as $file){

			$extension=basename($file, '.action.php');
			
			L::load("{$type}/{$extension}");

			$extensions[]=in_array($extension, $installed)?array('code'=>$extension,'installed'=>1):array('code'=>$extension,'installed'=>0);
		}

		return $extensions;
	}


	private function install($data){
		
		$type=$data['type'];
		$code=$data['code'];

		SQL::extension('extension','addExtension',array($type,$code));
	}

	private function uninstall($data){
		
		$code=$data['code'];

		SQL::extension('extension','delExtension',array($code));
	}
}