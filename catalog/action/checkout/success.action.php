<?php

class SuccessAction extends Action{

	public function index(){
		
		M::order('order','add',array());
	}
}