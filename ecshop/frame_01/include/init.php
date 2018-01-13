<?php 

/*
 *所有由用户直接访问到的这些页面，都得先加载init.php
 */

defined('ACC') || exit('ACC DENIED');

//初始化当前的绝对路径
define('ROOT', str_replace('\\', '/', dirname(dirname(__FILE__))).'/');
define('DEBUG', true);
//设置报错级别
if (defined('DEBUG')) {
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
} else {
	error_reporting(0);
}

require(ROOT.'include/lib_base.php');

//new 一个对象的时候会自动调用
function __autoload($class) {
	if (strtolower(substr($class, -5)) == 'model') {
		require(ROOT . 'model/' . $class . '.class.php');
	} else {
		require(ROOT . 'include/' . $class . '.class.php');
	}
}

$_GET = _addslashes($_GET);
$_POST = _addslashes($_POST);
$_COOKIE = _addslashes($_COOKIE);


?>