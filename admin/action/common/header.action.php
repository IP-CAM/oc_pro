<?php 

class HeaderAction extends Action {

	protected $lang="common/header";

	public function index() {
		
		$links['home'] = admin_url('common/index');
		$links['affiliate'] = admin_url('sale/affiliate');
		$links['attribute'] = admin_url('product/attribute');
		$links['attribute_group'] = admin_url('product/attribute_group');
		$links['category'] = admin_url('product/category');
		$links['coupon'] = admin_url('sale/coupon');
		$links['currency'] = admin_url('localisation/currency');
		$links['customer'] = admin_url('sale/customer');
		$links['customer_fields'] = admin_url('sale/customer_field');
		$links['customer_group'] = admin_url('sale/customer_group' );
		$links['customer_ban_ip'] = admin_url('sale/customer_ban_ip' );
		$links['custom_field'] = admin_url('design/custom_field' );
		$links['layout'] = admin_url('design/layout' );
		$links['logout'] = admin_url('common/logout' );
		$links['module'] = admin_url('extension/module' );
		$links['option'] = admin_url('product/option' );
		$links['order'] = admin_url('sale/order' );
		$links['order_status'] = admin_url('localisation/order_status' );
		$links['payment'] = admin_url('extension/payment' );
		$links['product'] = admin_url('product/product' );
		$links['return'] = admin_url('sale/return' );
		$links['shipping'] = admin_url('extension/shipping' );
		$links['setting'] = admin_url('setting/store' );
		$links['total'] = admin_url('extension/total' );
		$links['user'] = admin_url('user/user' );
		$links['user_group'] = admin_url('user/user_permission' );


		$links['stores'] = array();

		$this->assign($links);
				
		return $this->fetch('common/header');
	}
}
