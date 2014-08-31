<?php

/**
*视图层
*/
class View{
	
	public static $_instance=null;
	
	protected $view=null;

	protected $children=array();

	protected $lang;

	protected $title;

	protected $keyword;

	protected $description;
	
	public function __construct(){
		$this->init();
		$this->init_REQUEST();
	}
	
	/**
	*	单例模式
	*/
	public static function Instance(){
		if(self::$_instance==null){
			$c=get_called_class();
			self::$_instance=new $c;
			self::$_instance->init();
		}
		return self::$_instance;
	}
	/**
	*	初始化smarty类
	*/
	private function init(){
		include_once(SMARTY.'/Smarty.class.php');
		$this->view=new Smarty;
		$this->view->setTemplateDir(VIEW);
		$this->view->setCacheDir(CACHE_DIR);
		$this->view->setCompileDir(COMPILE_DIR);
		$this->view->caching=HTML_CACHE;
	}

	private function init_REQUEST(){

		P('SecurityFilter');

		$page=isset($_GET['page'])?$_GET['page']:1;

		$page< 1 && $page=1;
		$page>100 && $page=100;

		$_GET['page']=$page;
	}

	/**
	*	安全性过滤
	*/
	private function stripslashes_array(&$array) {
		while(list($key,$var) = each($array)) {
			if ($key != 'argc' && $key != 'argv' && (strtoupper($key) != $key || ''.intval($key) == "$key")) {
				is_string($var) && $array[$key] = stripslashes($var);
				is_array($var) && $array[$key] = stripslashes_array($var);
			}
		}
		return $array;
	}

	private function lang($lang=''){
		if(!empty($lang)){
			global $langs;
			if(is_string($lang)) 
				L::load($lang);
			else if(is_array($lang)) 
				foreach ($lang as $l)  $this->lang($l);
			$this->view->assign('langs',$langs);
		}
	}
	/**
	*	子Action调用 
	*/
	private function children(){
		$loadChild=array(
			'header'=>array('common/header/index',array('pTitle'=>$this->title,'pKeyword'=>$this->keyword,'pDesc'=>$this->description)),
			'footer'=>'common/footer/index',
		);
		if(!defined('IS_ADMIN')){
			$loadChild=array_merge($loadChild,array(
				'top'=>'common/top/index',
				'bottom'=>'common/bottom/index',
				'left'=>'common/left/index',
				'right'=>'common/right/index',
			));
		}
		$children=array_merge($loadChild,$this->children);
		foreach ($children as $key=>$child) {
			if(is_array($child)){
				$this->view->assign($key,A::run($child[0],$child[1]));
			}else{
				$this->view->assign($key,A::run($child,array()));
			}
		}
	}

	private function children_v2(){
		foreach ($this->children as $key=>$child) {
			if(is_array($child)){
				$this->view->assign($key,A::run($child[0],$child[1]));
			}else{
				$this->view->assign($key,A::run($child,array()));
			}
		}
	}

	/**
	**	向页面赋值
	*/
	public function assign($array){
		foreach($array as $k=>$v){
			$this->view->assign($k,$v);
		}
	}

	/**
	*	显示页面
	*/
	public function display($tpl,$cache_id=null,$compile_id=null,$suffix='.tpl'){
		$this->lang($this->lang);
		$this->children();
		$this->view->display($tpl.$suffix,$cache_id,$compile_id);
	}

	/**
	*	获取页面内容
	*/

	public function fetch($tpl,$cache_id=null,$compile_id=null,$suffix='.tpl'){
		$this->lang($this->lang);
		$this->children_v2();
		return $this->view->fetch($tpl.$suffix,$cache_id,$compile_id);
	}
}