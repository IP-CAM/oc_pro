<?php
/*
 * 控制层
 */
class Action extends View{

	public function __construct(){

		parent::__construct();
		$this->initialize();
	}

	protected function initialize(){
		$this->view->registerPlugin('block','lrtip','smarty_block_lrtip',false);
		$this->view->registerPlugin('block','top','smarty_block_top',false);
		$this->view->registerPlugin('block','toplr','smarty_block_toplr',false);
	}

	/**
	*	调用Action静态方法
	*	@param dir Medium下的第一层文件夹名--小写
	*	@param args array args[0]->文件名(无后缀) args[1]->run具体方法参数数组
	*   @return run方法的结果值
	*/

	public static function run($path,$args=array()){

		assert(is_string($path));
		assert(is_array($args));

		list($parent,$cls,$action)=explode('/', $path);

		$classname=ucfirst($cls).'Action';

		$file=ACTION.$parent.'/'.$cls.'.action.php';
		// echo $file.PHP_EOL;
		if(!is_file($file)) exit('action file not found');
		
		include_once($file);

		$cls=new $classname;

		return call_user_func_array(array($cls,$action),array($args));
	}
}

class AccountAction extends Action{

	public function __construct(){
		parent::__construct();

	}
	
}

class AdminAction extends Action{

	public function __construct(){
		parent::__construct();
		$this->checkLogin();
	}

	private function checkLogin(){
		// print_r($_SESSION);exit();
		if(!S('ADMIN_UID')){
			redirect('/admin/index.php?app=login');
		}
	}
}

function smarty_block_lrtip($param, $content, &$smarty) {
	return $content;
}

function smarty_block_top($param, $content, &$smarty) {
	return $content;
}

function smarty_block_toplr($param, $content, &$smarty) {
	return $content;
}