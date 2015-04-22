<?php 

class HeaderAction extends Action {

	protected $lang="common/header";

	public function index() {
		
		$links['home'] = admin_url('common/index');
		$links['attribute'] = admin_url('product/attr');
		$links['attribute_group'] = admin_url('product/attr_group');
		$links['category'] = admin_url('product/cat');
		$links['product'] = admin_url('product/item' );
		$links['customer'] = admin_url('sale/customer');
		$links['customer_group'] = admin_url('sale/customer_group' );
		$links['logout'] = admin_url('common/logout' );
		$links['option'] = admin_url('product/option' );
		$links['order'] = admin_url('sale/order' );
		$links['order_status'] = admin_url('localisation/order_status' );
		$links['setting'] = admin_url('setting/store' );
		$links['user'] = admin_url('user/user' );
		$links['user_group'] = admin_url('user/user_permission' );

		$folder=$_GET['f'];
		
		$selected[($folder=='payment' || $folder=='module' || $folder=='extension' || $folder=='shipping')?'extension':$folder]='selected';
		
		$links['selected']=$selected;
		
		$this->assign($links);
				
		return $this->fetch('common/header');
	}
}
