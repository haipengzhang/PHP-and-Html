<?php 
	
define('ACC', true);
require('../include/init.php');

if ($_GET['act'] && $_GET['act'] == 'show') {
	$goodsModel = new GoodsModel();
	$goodsList = $goodsModel->trushedGoodsList();
	include(ROOT . 'view/admin/templates/goodslist.html'); 
} else {
	if (empty($_GET['goods_id'])) {
		exit('goods_id');
	}

	$goods_id = $_GET['goods_id'];

	$goodsModel = new GoodsModel();
	if ($goodsModel->trushGoods($goods_id)) {
		echo "商品删除成功";
	} else {	
		echo "商品删除失败";	
	}
}

 ?>