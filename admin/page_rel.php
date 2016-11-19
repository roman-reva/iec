<?php
require("../system/incl.php");

if (isset($_POST['id'])) {
	$id = addslashes($_POST['id']);
	if (isset($_POST['groups'])&&count($_POST['groups'])>0) {
		$group_ids = array_unique($_POST['groups']);
		$q = "DELETE FROM `page2group` WHERE `id_page`='$id'";
		mq($q);

		foreach ($group_ids as $g_id) {
			$q = "INSERT INTO `page2group` SET `id_group`='$g_id', `id_page`='$id'";
			mq($q);
		}
	} else {
		$q = "DELETE FROM `page2group` WHERE `id_page`='$id'";
		mq($q);
	}
	$smarty->assign("message", "Сохранено!");
	$_GET['id'] = $id;
}


if (isset($_GET['id'])) {
	$id = addslashes($_GET['id']);
	$q = "SELECT
	          category.id AS c_id,
	          category.name_ru AS c_name,
	          group.id AS g_id,
	          group.name_ru AS g_name
	      FROM
	          (`category` LEFT JOIN `group2category` ON category.id=group2category.id_category)
	            LEFT JOIN `group` ON group2category.id_group=group.id
		  ORDER BY
	          category.name_ru, group.name_ru";
	$res = mq($q);
	$category_list = array();

	$curr_cat_id = -1;

	$cat_list = array();
	while ($info = mysql_fetch_array($res)) {
		if ($info['g_id']>0) { 		// check, if there are any groups in current category
			if ($curr_cat_id != $info['c_id']) {
				$curr_cat_id = $info['c_id'];
				$cat_list[$curr_cat_id]['id'] = $curr_cat_id;
				$cat_list[$curr_cat_id]['name'] = $info['c_name'];
				$cat_list[$curr_cat_id]['groups'] = array();
			}
	
			$cat_list[$curr_cat_id]['groups'][$info['g_id']] = array(
		      'id'=> $info['g_id'],
		      'name'=> $info['g_name'],
	        'checked'=> false
			);
		}
	}

	$q = "SELECT * FROM page2group WHERE id_page='$id'";
	$res = mq($q);
	while ($info = mysql_fetch_array($res)) {
		$g_id = $info['id_group'];
		foreach ($cat_list as $c_id=>$cat) {
			foreach ($cat['groups'] as $gr_id=>$gr) {
				if ($g_id==$gr_id) {
					$cat_list[$c_id]['groups'][$gr_id]['checked'] = true;
				}
			}
		}
	}

	$smarty->assign("cat_list", $cat_list);
	$smarty->assign("id", $id);
}


$smarty->assign("page_title", "Связи материала");
$smarty->display("adm_page_rel.tpl");

?>