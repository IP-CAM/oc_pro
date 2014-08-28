<?php

const PAYPAL_API_URL="https://api-3t.paypal.com/nvp";
const PAYPAL_API_SANDBOX_URL="https://api-3t.sandbox.paypal.com/nvp";
const PAYPAL_API_USERNAME="tvrc4m-facilitator_api1.qq.com";
const PAYPAL_API_PASSWORD="1406621861";
const PAYPAL_API_SIGNATURE="An5ns1Kso7MWUdW4ErQKJJJ4qi4-AQlum6dK5Y1ghhmwN3q7h-0-f01a";

class Paypal extends Medium{

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