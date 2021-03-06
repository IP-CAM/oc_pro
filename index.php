<?php

header('Content-type:text/html;charset=utf-8');

error_reporting(E_ALL & ~E_NOTICE);
// error_reporting(E_ALL);

date_default_timezone_set('Asia/Shanghai');

define("ROOT",dirname(__FILE__));

$folder=isset($_REQUEST['f'])?strtolower($_REQUEST['f']).'/':'common/';

include_once(ROOT.'/core/config.php');

// ini_set('session.cookie_domain',COOKIE_DOMAIN);

session_save_path(SESSION);

session_start();

include_once(CORE.'function.php');
include_once(CORE.'common.php');
include_once(CORE.'db.class.php');
include_once(CORE.'sphinx.class.php');
include_once(CORE.'model.class.php');
include_once(CORE.'view.class.php');
include_once(CORE.'action.class.php');
include_once(CORE.'medium.class.php');
include_once(CORE.'lang.class.php');
include_once(CORE.'plugin.class.php');
include_once(CORE.'alias.class.php');


// init default language 
$lang=new Lang();

!isset($_REQUEST['app']) && $_REQUEST['app']='index';

$app=$_REQUEST['app'];

$method=isset($_REQUEST['act'])?$_REQUEST['act']:'index';

$appFile=ACTION.$folder.strtolower($app).'.action.php';

!file_exists($appFile) && exit('指定文件不存在');

include_once($appFile);

$className=ucfirst($app).'Action';

$appInstance=new $className;

!method_exists($appInstance,$method) && exit('instance method is not exist');

$appInstance->$method();
