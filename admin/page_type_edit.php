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
    $name_ru = $_POST['name_ru'];
		$name_en = $_POST['name_en'];
    $weight = prep($_POST['weight']);
    $color = prep($_POST['color']);

// validation
    if (empty($name_ru) || empty($name_en)) {
        $errors[] = "Название не может быть пустым!";
    }

    if (count($errors)>0) {
        if ($id>0) {
            $edit = true;
        }
        $data['id'] = $_POST['id'];
        $data['weight'] = $_POST['weight'];
        $data['color'] = $_POST['color'];
        $data['name_ru'] = str_replace("\\'", "'", $_POST['name_ru']);
			$data['name_en'] = str_replace("\\'", "'", $_POST['name_en']);
        $smarty->assign("data", $data);

        $smarty->assign("errors", $errors);
    } else {
// database modifications
        if ($id>0) {
            $q = "UPDATE `$table` SET
`name_ru`='$name_ru',
	        	    	`name_en`='$name_en',
`weight`='$weight',
`color`='$color'
WHERE `id`='$id'";
            mq($q);
        } else {
            $q = "INSERT INTO `$table` SET
`id`='0',
`weight`='$weight',
`name_ru`='$name_ru',
	        	    	`name_en`='$name_en',
`color`='$color'";
            mq($q);
            $id = mysqli_insert_id();
        }
        $smarty->assign("message", "Сохранено!");
        $_GET['id'] = $id;
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
    $smarty->assign("page_title", "Редактировать тип материала");
} else {
    $smarty->assign("page_title", "Новый тип материала");
}

$smarty->display("adm_page_type_edit.tpl");
?>