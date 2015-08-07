<?php
require_once 'system/incl.php';

$menu = getFullMenu();
$smarty->assign("menu", $menu);

if (isset($_GET['id'])&&isset($_GET['cid'])) {
	$id = addslashes($_GET['id']);	
	$group = getGroupInfoById($id);
	$smarty->assign("group", $group);
	
	//$tabs = getTabs();
	$tabs = getTabsByGroupId($id);
	
	$smarty->assign("tabs", $tabs);
	
	$cid = addslashes($_GET['cid']);
	$category = getCategoryInfoById($cid);
	$smarty->assign("category", $category);
	
	if (isset($_GET['tid'])) {
		$tid = addslashes($_GET['tid']);
		$smarty->assign("selected_tab", $tid);
		
		if ($tid>0) {
			$pagelist = getPagesInfoByGroupIdAndTypeId($id, $tid);
			$smarty->assign("pagelist", $pagelist);
		}	
	}
} else {
	header("location: index.php");
	exit;
}

$smarty->display("group.tpl");
?>