<?php 
	
	//后台控制器
	define('ACC', true);
	require('../include/init.php');

	$goodsModel = new GoodsModel();
	$goodsList = $goodsModel->getGoods();

	include(ROOT . 'view/admin/templates/goodslist.html'); 
	
 ?>