<?php 
	
	//后台控制器
	define('ACC', true);
	require('../include/init.php');
	
	$cat = new CatModel();
	$catelist = $cat->getCateSonlist();
	
	include(ROOT . 'view/admin/templates/catelist.html'); 

 ?>