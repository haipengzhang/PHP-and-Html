<?php

define('ACC', true);
require('../include/init.php');

if (empty($_POST['cat_id'])) {
	exit('cat_id不能为空');
}
$cat_id = $_POST['cat_id'] + 0;

$data = array();
$data['cat_name'] = $_POST['cat_name'];
$data['parent_id'] = $_POST['parent_id'];
$data['intro'] = $_POST['intro'];

$cat = new CatModel();
$fatherList = $cat->getCateFatherList($data['parent_id']);

print_r($fatherList);

$isContain = false;
foreach ($fatherList as $key => $value) {
	if ($value[@"cat_id"] == $cat_id) {
		$isContain = true;
		break;
	}
}

if (!$isContain) {
	if ($cat->update($data, $cat_id)) {
		echo "栏目修改成功";
	} else {
		echo "栏目修改失败";
	}
} else {
	echo "父栏目指定错误";	
}

?>