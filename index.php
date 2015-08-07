<?php
require_once 'system/incl.php';

$menu = getFullMenu();
$smarty->assign("menu", $menu);

if (isset($_GET['id'])) {
	$id = addslashes($_GET['id']);
} else {
	$id = 0;
	$top = fetchInfopageMenuPart(true);
	if (count($top)>0) {
		$id = $top[0]['id'];
	} else {
		$bottom = fetchInfopageMenuPart(false);
		$id = $bottom[0]['id'];
	}
}

$page = getInfopageById($id);
$smarty->assign("page", $page);

$smarty->display("viewinfopage.tpl");
?>