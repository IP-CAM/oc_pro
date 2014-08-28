<?php
  
class IndexAction extends AdminAction {

	protected $lang="common/index";

	public function index() {

		// $this->data['breadcrumbs'] = array();

		// $this->data['token'] = $this->session->data['token'];
		
		// $this->load->model('sale/order');

		// $this->data['total_sale'] = $this->currency->format($this->model_sale_order->getTotalSales(), $this->config->get('config_currency'));
		// $this->data['total_sale_year'] = $this->currency->format($this->model_sale_order->getTotalSalesByYear(date('Y')), $this->config->get('config_currency'));
		// $this->data['total_order'] = $this->model_sale_order->getTotalOrders();
		
		// $this->load->model('sale/customer');
		
		// $this->data['total_customer'] = $this->model_sale_customer->getTotalCustomers();
		// $this->data['total_customer_approval'] = $this->model_sale_customer->getTotalCustomersAwaitingApproval();
		
		// $this->load->model('catalog/review');
		
		// $this->data['total_review'] = $this->model_catalog_review->getTotalReviews();
		// $this->data['total_review_approval'] = $this->model_catalog_review->getTotalReviewsAwaitingApproval();
		
		// $this->load->model('sale/affiliate');
		
		// $this->data['total_affiliate'] = $this->model_sale_affiliate->getTotalAffiliates();
		// $this->data['total_affiliate_approval'] = $this->model_sale_affiliate->getTotalAffiliatesAwaitingApproval();
				
		// $this->data['orders'] = array(); 
		
		// $data = array(
		// 	'sort'  => 'o.date_added',
		// 	'order' => 'DESC',
		// 	'start' => 0,
		// 	'limit' => 10
		// );
		
		// $results = $this->model_sale_order->getOrders($data);
    	
  //   	foreach ($results as $result) {
		// 	$action = array();
			 
		// 	$action[] = array(
		// 		'text' => $this->language->get('text_view'),
		// 		'href' => $this->url->link('sale/order/info', 'token=' . $this->session->data['token'] . '&order_id=' . $result['order_id'], 'SSL')
		// 	);
					
		// 	$this->data['orders'][] = array(
		// 		'order_id'   => $result['order_id'],
		// 		'customer'   => $result['customer'],
		// 		'status'     => $result['status'],
		// 		'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
		// 		'total'      => $this->currency->format($result['total'], $result['currency_code'], $result['currency_value']),
		// 		'action'     => $action
		// 	);
		// }

		// if ($this->config->get('config_currency_auto')) {
		// 	$this->load->model('localisation/currency');
		
		// 	$this->model_localisation_currency->updateCurrencies();
		// }
		
		$this->display('common/home');
  	}
	
	public function permission() {
		if (isset($this->request->get['route'])) {
			$route = '';
			
			$part = explode('/', $this->request->get['route']);
			
			if (isset($part[0])) {
				$route .= $part[0];
			}
			
			if (isset($part[1])) {
				$route .= '/' . $part[1];
			}
			
			if (!in_array($route, $ignore) && !$this->user->hasPermission('access', $route)) {
				return $this->forward('error/permission');
			}
		}
	}	
}