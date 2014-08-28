<?php  

class FooterAction extends Action {
			
	public function index(){

		$this->children= M::setting('layout','layout',array('position'=>'footer','layout'=>''));

		$this->assign(array('footer_container'=>array_keys($this->children)));
		
		return $this->fetch('common/footer');
	}
}
