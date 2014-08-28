<?php

class sina extends medium{

	public function run($data){
	
		switch ($data['action']) {
	
			case 'auth':return ->auth();break;
	
		}
	}
}