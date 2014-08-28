<?php

function admin_url($url){
	return "http://".$_SERVER['HTTP_HOST']."/admin/{$url}";
}