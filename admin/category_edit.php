<?php
require("../system/incl.php");

$table = "category";
$errors = array();
$edit = false;

$weights = array();
for($i=1; $i<21; $weights[]=$i++);
$smarty->assign("weights", $weights);

if (isset($_POST['save'])) {
	$id = prep($_POST['id']);
	$name = prep($_POST['name']);
	$menuname = prep($_POST['menuname']);
	$weight = prep($_POST['weight']);

	// validation
	if (empty($name)) {
		$errors[] = "Название не может быть пустым!";
	}

	if (count($errors)>0) {
		if ($id>0) {
			$edit = true;
		}
		$data['id'] = $_POST['id'];
		$data['weight'] = $_POST['weight'];
		$data['name'] = str_replace("\\'", "'", $_POST['name']);
		$data['menuname'] = str_replace("\\'", "'", $_POST['menuname']);
		$smarty->assign("data", $data);

		$smarty->assign("errors", $errors);
	} else {
		// database modifications
		if ($id>0) {
			$q = "UPDATE `$table` SET
        	    	`name`='$name',
        	    	`menuname`='$menuname',
              		`weight`='$weight'
	              WHERE `id`='$id'";
			mq($q);
		} else {
			$q = "INSERT INTO `$table` SET
	            	`id`='0',
              		`weight`='$weight',
              		`menuname`='$menuname',
	            	`name`='$name'";
			mq($q);
			$id = mysql_insert_id();
		}
		$_GET['id'] = $id;
		$smarty->assign("message", "Сохранено!");		
	}
} 

if (isset($_GET['id'])) {
	$id = addslashes($_GET['id']);

	$q = "SELECT * FROM `$table` WHERE id=$id";
	$res = mq($q);
	$data = mysql_fetch_array($res);		
	$smarty->assign("data", $data);
	
	$edit = true;
}


if ($edit) {
	$smarty->assign("page_title", "Редактировать тематику");
} else {
	$smarty->assign("page_title", "Новая тематика");
}

$smarty->display("adm_category_edit.tpl");
?>