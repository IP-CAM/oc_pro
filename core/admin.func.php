<?php

function admin_url($url){
	
	return sprintf("http://%s/admin/%s",$_SERVER['HTTP_HOST'],$url);
}