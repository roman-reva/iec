<?php
	require("../system/incl.php");

  	if (isset($_GET['del'])) {
		$del = addslashes($_GET['del']);
		
		$q = "SELECT * FROM `group2category` WHERE `id_category`='$del'";
		$res = mq($q);
		
		if (mysql_num_rows($res)>0) {			
			$error = array("Невозможно удалить выбранную категорию, так как существуют группы, связанные с ней.");
			$smarty->assign("errors", $error);
		} else {		
			$q = "DELETE FROM `category` WHERE `id`='$del'";
			mq($q);
			$smarty->assign("message", "Удалено!");
		}
	}


	$q = "SELECT * FROM `category` ORDER BY `weight`, `name_ru`";
	$res = mq($q);

	$data = array();
	if (mysql_num_rows($res) > 0) {
		while($info = mysql_fetch_array($res)) {
			$data[] = $info;
		}
	}

	if (count($data) > 0) {
		$smarty->assign("data", $data);
	} else {
		$smarty->assign("nodata", true);
	}

	$smarty->display("adm_category_list.tpl");
?>