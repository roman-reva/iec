<?php
require_once 'system/incl.php';

$menu = getFullMenu();
$smarty->assign("menu", $menu);

if (isset($_GET['id'])&&isset($_GET['gid'])&&isset($_GET['cid'])) {
	$id = addslashes($_GET['id']);	
	$page = getPageInfoById($id);
	$smarty->assign("page", $page);
	
	$gid = addslashes($_GET['gid']);	
	$group = getGroupInfoById($gid);
	$smarty->assign("group", $group);
	
	$cid = addslashes($_GET['cid']);
	$category = getCategoryInfoById($cid);
	$smarty->assign("category", $category);
} else {
	header("location: index.php");
	exit;
}

$smarty->display("viewpage.tpl");
?>