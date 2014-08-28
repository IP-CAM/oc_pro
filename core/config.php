<?php

// base path
define('CORE', ROOT.'/core/');
define('CATALOG', ROOT.'/catalog/');
define('PLUGIN', ROOT.'/plugin/');
define('STATIC', ROOT.'/static/');
define('SYSTEM', ROOT.'/system/');
define('EXTENSION', ROOT.'/extension/');
define('ADMIN', ROOT.'/admin/');
define('CACHE', ROOT.'/cache/');
define('CONFIG', ROOT.'/config/');

if (defined('IS_ADMIN')) {
	// admin path
	define('ACTION', ADMIN.'action/');
	define('MEDIUM', ADMIN.'medium/');
	define('MODEL', ADMIN.'model/');
	define('VIEW', ADMIN.'view/default/');
	define('LANG', ADMIN.'lang/');
	define('IMAGE', '/admin/static/image/');
}else{
	// catalog path
	define('ACTION', CATALOG.'action/');
	define('MEDIUM', CATALOG.'medium/');
	define('MODEL', CATALOG.'model/');
	define('VIEW', CATALOG.'view/default/');
	define('LANG', CATALOG.'lang/');
}

// System
define('LIBRARY', SYSTEM.'library/');

// extension library 
define('SMARTY', EXTENSION.'smarty/');


// cache
define('COMPILE_DIR', CACHE.'compile/');
define('CACHE_DIR', CACHE.'html/');
define('HTML_CACHE',false);

// cookie  && session
define('COOKIE_DOMAIN','oc');
define('COOKIE_ENCRYPT_KEY','tvrc4m@cookie');


include_once(CONFIG.'db.config.php');
include_once(CONFIG.'index.config.php');
include_once(CONFIG.'order.config.php');
include_once(CONFIG.'redis.config.php');

