<?php

class Layout extends Medium{

	public function run($action,$data){

		switch ($action) {
	
			case 'layout':return $this->contain($data);break;
	
		}
	}
	
	private function contain($data){

		$position=$data['position'];

		$layout=$data['layout'];

		$result = $sort = array();
		
		$extensions=M::setting('extension','get',array('type'=>'module'));

		if(empty($extensions)) return array();
		
		foreach ($extensions as $extension) {

			$modules=M::setting('setting','get',array('key'=>$extension.'_module'));

			if(empty($modules)) break;
			
			foreach ($modules as $key=>$module) {
				
				if ($module['layout_id'] == $layout && $module['position'] == $position && $module['status']) {

					$result[] = array(
                        'code'       => $extension,
                        'setting'    => $module,
                        'sort_order' => $module['sort_order']
                    );

                    $sort[] = $module['sort_order'];
				}
			}
		}

		if(empty($result)) return array();

		array_multisort($sort, SORT_ASC, $result);
		
		$modules = array();

		foreach ($result as $k=>$res) $modules[$res['code'].$k]=array('module/'.$res['code'].'/index',$res['setting']);

		return $modules;
	}
}