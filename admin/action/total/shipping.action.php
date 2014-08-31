<?php

class ShippingAction extends AdminAction { 
	
	protected $lang='total/shipping';
	 
	public function index() { 
		
		$this->load->model('setting/setting');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('shipping', $this->request->post);
		
			$this->session->data['success'] = $this->language->get('text_success');
			
			$this->redirect($this->url->link('extension/total', 'token=' . $this->session->data['token'], 'SSL'));
		}
		
		if (isset($this->request->post['shipping_estimator'])) {
			$this->data['shipping_estimator'] = $this->request->post['shipping_estimator'];
		} else {
			$this->data['shipping_estimator'] = $this->config->get('shipping_estimator');
		}
		
		if (isset($this->request->post['shipping_status'])) {
			$this->data['shipping_status'] = $this->request->post['shipping_status'];
		} else {
			$this->data['shipping_status'] = $this->config->get('shipping_status');
		}

		if (isset($this->request->post['shipping_sort_order'])) {
			$this->data['shipping_sort_order'] = $this->request->post['shipping_sort_order'];
		} else {
			$this->data['shipping_sort_order'] = $this->config->get('shipping_sort_order');
		}
																		
		$this->display('total/shipping');
	}
}