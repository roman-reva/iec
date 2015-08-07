<?php
	require("../system/incl.php");

  if (isset($_GET['id'])) {
   	$id = addslashes($_GET['id']);

	  $q = "SELECT * FROM `category` ORDER BY `name`";
	  $res = mq($q);
	  $category_list = array();
	  while ($info = mysql_fetch_array($res)) {
	    $category_list[$info['id']] = array(
	        'id'=>$info['id'],
	        'name'=>$info['name'],
	        'checked'=>false
	    );
	  }

    $q = "SELECT * FROM `group2category` WHERE `id_group`='$id'";
    $res = mq($q);
    while ($info = mysql_fetch_array($res)) {
			$category_list[$info['id_category']]['checked'] = true;
    }

		$smarty->assign("cat_list", $category_list);
    $smarty->assign("id", $id);
  } else if (isset($_POST['id'])) {

    $id = addslashes($_POST['id']);
    $selected_cats = $_POST['catlist'];
    $q = "DELETE FROM `group2category` WHERE `id_group`='$id'";
    mq($q);

    foreach ($selected_cats as $c_id) {
    	$q = "INSERT INTO `group2category` SET
      			`id_group`='$id',
            `id_category`='$c_id'";
      mq($q);
    }

    header('location: group_list.php');
    exit;
  }

	$smarty->assign("page_title", "Связи проекта");
	$smarty->display("adm_group_rel.tpl");
?>