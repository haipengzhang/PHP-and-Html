<?php 

	define('ACC', true);
	
	require('./include/init.php');
	// $mysql = Mysql::getIns();

	$t1 = $_GET['t1'];
	$t2 = $_GET['t2'];

	$sql = "insert into test(t1, t2) values('$t1', '$t2');";

	// var_dump($mysql->query($sql));
 ?>