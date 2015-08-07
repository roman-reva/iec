<?php
	require("../system/incl.php");
	
	$table = "page_type";
	$errors = array();
	$edit = false;
	
	$weights = array();
	for($i=1; $i<21; $weights[]=$i++);
	$smarty->assign("weights", $weights);
	
	// if submit button was pressed
	if (isset($_POST['sent'])) {
		$id = prep($_POST['id']);
		$name = $_POST['name'];
		$weight = prep($_POST['weight']);
		$color = prep($_POST['color']);
	
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
			$data['color'] = $_POST['color'];
			$data['name'] = str_replace("\\'", "'", $_POST['name']);
			$smarty->assign("data", $data);
	
			$smarty->assign("errors", $errors);
		} else {
			// database modifications
			if ($id>0) {
				$q = "UPDATE `$table` SET
	        	    	`name`='$name',
	                	`weight`='$weight',
	                	`color`='$color'
		              WHERE `id`='$id'";
				mq($q);
			} else {
				$q = "INSERT INTO `$table` SET
		            	`id`='0',
	              		`weight`='$weight',
		            	`name`='$name',
		            	`color`='$color'";
				mq($q);
				$id = mysql_insert_id();
			}
			$smarty->assign("message", "Сохранено!");
			$_GET['id'] = $id;
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
		$smarty->assign("page_title", "Редактировать тип материала");
	} else {
		$smarty->assign("page_title", "Новый тип материала");
	}
	
	$smarty->display("adm_page_type_edit.tpl");
?>