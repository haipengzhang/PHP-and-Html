<?php 
	
define('ACC', true);
require('../include/init.php');

if (empty($_POST['cat_name'])) {
	exit('栏目名不能为空');
}

$data = array();
$data['cat_name'] = $_POST['cat_name'];
$data['parent_id'] = $_POST['parent_id'];
$data['intro'] = $_POST['intro'];

$cat = new CatModel();
if ($cat->add($data)) {
	echo "栏目添加成功";
	exit();
} else {
	echo "栏目添加失败";
	exit();
}

 ?>