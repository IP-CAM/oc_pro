<?php

// store:mongodb
// cart:product_id,options,quantity,
// struct:{product_id:int,options:[color,size],quantity:int}

class Cart extends Medium{

	protected $product_id=0;
	protected $options=array();
	protected $quantity=1;
	protected $cart=array();

	public function run($data){

		$this->cart=S('cart');

		$this->product_id=$data['product_id'];
		$this->options=$data['options'];
		$this->quantity=$action['quantity'];

		switch ($data['action']) {

			case 'get':return $this->get();break;

			case 'add':return $this->add();break;

			case 'delete':return $this->delete();break;

			case 'remove':return $this->remove();break;

			case 'update':$this->update($data['cart']);
		}
	}

	private function get(){

		if(empty($this->cart)) return array();

		$cart=array();

		foreach ($this->cart as $k => $v) {
			
		}
	}

	private function add(){

		if(empty($this->cart)) 
			$this->cart[]=array('product_id'=>$this->product_id,'options'=>$this->options,'quantity'=>$this->quantity);
		else
			foreach ($this->cart as $k => $v) {
				if($v['product_id']==$this->product_id && $v['options']==$this->options)
					$this->cart[$k]['quantity']+=$this->quantity;
				else
					$this->cart[]=array('product_id'=>$this->product_id,'options'=>$this->options,'quantity'=>$this->quantity);
			}

		$this->update();
	}

	private function delete(){

		if(empty($this->product_id) || empty($this->cart)) return;

		foreach ($this->cart as $k => $v) {
			if($v['product_id']==$this->product_id && $v['options']==$this->options){
				$this->cart[$k]['quantity']-=$this->quantity;
				if($this->cart[$k]['quantity']<=0)
					unset($this->cart[$k]);
			}
		}

		$this->update();
	}

	private function remove(){

		if(empty($this->product_id) || empty($this->cart)) return;

		foreach ($this->cart as $k => $v) {
			if($v['product_id']==$this->product_id && $v['options']==$this->options){
				unset($this->cart[$k]);
			}
		}

		$this->update();
	}

	private function update($cart=array()){

		S('cart',$this->cart);

		if(!empty($cart)){
			
		}
		
		if(P('checkLogin')){

			NOSQL::checkout('cart','updateUserCart',array($cart));
		}
	}
}