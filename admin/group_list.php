<?php
	require("../system/incl.php");

    if (isset($_GET['del'])) {
		$del = addslashes($_GET['del']);
		
		$q = "SELECT * FROM `page2group` WHERE `id_group`='$del'";
		$res = mq($q);
		
		if (mysql_num_rows($res)>0) {			
			$error = array("Ќевозможно удалить выбранный проект, так как существуют материалы, св€занные с ним.");
			$smarty->assign("errors", $error);
		} else {
			$q = "SELECT * FROM `group` WHERE `id`='$del'";
			$data = mysql_fetch_array(mq($q));
			if (!empty($data['image'])) {
				if (is_file($data['image'])) {
					unlink("../".$data['image']);
				}
			}		
			$q = "DELETE FROM `group` WHERE `id`='$del'";
			mq($q);
			$q = "DELETE FROM `group2category` WHERE `id_group`='$del'";
			mq($q);
			$smarty->assign("message", "”далено!");
		}
	}


	$q = "SELECT * FROM `group` ORDER BY `name_ru`";
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

	$smarty->display("adm_group_list.tpl");
?>