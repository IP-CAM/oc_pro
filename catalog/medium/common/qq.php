<?php

class qq extends Medium{

	public function run($data){
	
		switch ($data['action']) {
	
			case 'auth':return ->auth();break;
	
		}
	}
}
