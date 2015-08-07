<?php
require_once 'system/incl.php';

$menu = getFullMenu();
$smarty->assign("menu", $menu);

if (isset($_GET['id'])) {
	$id = addslashes($_GET['id']);
	$groups = getGroupsInfoByCategoryId($id);
	$smarty->assign("groups", $groups);
	
	$category = getCategoryInfoById($id);
	$smarty->assign("category", $category);	
} else {
	header("location: index.php");
	exit;
}

$smarty->display("category.tpl");
?>