<?php 
	
define('ACC', true);
require('../include/init.php');

if (empty($_GET['cat_id'])) {
	exit('栏目id不能为空');
}

$cat = new CatModel();
$sonList = $cat->getCateSonlist($_GET['cat_id']);

if (!empty($sonList)) {
	echo "有自栏目不能删除";
	exit();
}

if ($cat->delete($_GET['cat_id'])) {
	echo "栏目删除成功";
	exit();
} else {
	echo "栏目删除失败";
	exit();
}

 ?>