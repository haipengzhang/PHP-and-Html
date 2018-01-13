<?php 
	
	//后台控制器
	define('ACC', true);
	require('../include/init.php');

	$cat_id = $_GET['cat_id'];

	$cat = new CatModel();
	$cateInfo = $cat->find($cat_id);
	$catelist = $cat->getCateSonlist();
	
	include(ROOT . 'view/admin/templates/cateEdit.html'); 
	
 ?>