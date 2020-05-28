<?php
require("../system/incl.php");

$table = "category";
$errors = array();
$edit = false;

$weights = array();
for ($i = 1; $i < 21; $weights[] = $i++) ;
$smarty->assign("weights", $weights);

if (isset($_POST['save'])) {
	$id = prep($_POST['id']);
    $name_ru = prep($_POST['name_ru']);
    $name_en = prep($_POST['name_en']);
    $menuname_ru = prep($_POST['menuname_ru']);
	$menuname_en = prep($_POST['menuname_en']);
    $weight = prep($_POST['weight']);

    // validation
    if (empty($name_ru) || empty($name_en)) {
        $errors[] = "Название не может быть пустым!";
    }

    if (count($errors) > 0) {
        if ($id > 0) {
            $edit = true;
        }
        $data['id'] = $_POST['id'];
        $data['weight'] = $_POST['weight'];
        $data['name_ru'] = str_replace("\\'", "'", $_POST['name_ru']);
		$data['name_en'] = str_replace("\\'", "'", $_POST['name_en']);
		$data['menuname_ru'] = str_replace("\\'", "'", $_POST['menuname_ru']);
        $data['menuname_en'] = str_replace("\\'", "'", $_POST['menuname_en']);
        $smarty->assign("data", $data);

        $smarty->assign("errors", $errors);
    } else {
        // database modifications
        if ($id > 0) {
            $q = "UPDATE `$table` SET
        	    	`name_ru`='$name_ru',
        	    	`name_en`='$name_en',
        	    	`menuname_ru`='$menuname_ru',
        	    	`menuname_en`='$menuname_en',
              		`weight`='$weight'
	              WHERE `id`='$id'";
            mq($q);
        } else {
            $q = "INSERT INTO `$table` SET
	            	`id`='0',
              		`weight`='$weight',
              		`name_ru`='$name_ru',
        	    	`name_en`='$name_en',
        	    	`menuname_ru`='$menuname_ru',
        	    	`menuname_en`='$menuname_en'";
            mq($q);
            $id = mysqli_insert_id();
        }
        $_GET['id'] = $id;
        $smarty->assign("message", "Сохранено!");
    }
}

if (isset($_GET['id'])) {
    $id = addslashes($_GET['id']);

    $q = "SELECT * FROM `$table` WHERE id=$id";
    $res = mq($q);
    $data = mysqli_fetch_array($res);
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