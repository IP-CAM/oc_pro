<?php

const ALIPAY_API="";

class Alipay extends Medium{

	public function run($data){

		switch ($data['action']) {

			case 'auth':return $this->auth($data);break;

			case 'capture':return $this->capture($data);break;

			case 'sale':return $this->sale($data);break;
		}
	}

	private function auth($data){


	}

	private function capture($data){

	}

	private function sale($data){

	}
}