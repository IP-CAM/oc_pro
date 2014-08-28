<?php

class IndexAction extends Action{

	public function index(){

		$cats=M::product('category','get',array('cid'=>60));

		$top=M::product('category','top',array());

		$this->title="ddd.teric.wei";


		// foreach ($top as $k => $v) {
			// $top[$k]['children']=M::product('category','child',array('pid'=>$v['id']));
		// }

		// $header=A::common('header','index',array());

		// print_r($top);exit();
		
		$this->display('common/home');
	}
}