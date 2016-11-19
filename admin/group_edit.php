<?php
require("../system/incl.php");

$table = "group";
$errors = array();
$edit = false;

$weights = array();
for($i=1; $i<21; $weights[]=$i++);
$smarty->assign("weights", $weights);

// if submit button was pressed
if (isset($_POST['sent'])) {
	$id = prep($_POST['id']);
	$name_ru = prep($_POST['name_ru']);
	$details_ru = prep($_POST['details_ru']);
	$text_ru = prep($_POST['text_ru']);
	$name_en = prep($_POST['name_en']);
	$details_en = prep($_POST['details_en']);
	$text_en = prep($_POST['text_en']);

	// validation
	if (empty($name_ru) || empty($name_en)) {
		$errors[] = "Название не может быть пустым!";
	}
	// validation
	if (empty($details_ru) || empty($details_en)) {
		$errors[] = "Краткое описание не может быть пустым!";
	}
	
	if (empty($text_ru) || empty($text_en)) {
		$errors[] = "Полное описание не может быть пустым!";
	}

	$path = "";
	if (isset($_FILES['picture'])) {
		if ($_FILES['picture']['size']>0) {
			if (!($_FILES['picture']['type']=='image/gif'||$_FILES['picture']['type']=='image/jpeg')) {
				$errors[] = "Вы можете загружать только картинки в формате GIF либо JPEG.";
			} else if (count($errors)==0) {
				$filename = $_FILES['picture']['name'];
				$tmpPath = $_FILES['picture']['tmp_name'];
				$path = "data/thumbs/".time()."_".$filename;
					
				move_uploaded_file($tmpPath, "../".$path);
			}
		}
	} else if ($id>0) {
		$q = "SELECT `image` FROM `$table` WHERE id=$id";
		$res = mq($q);
		$data = mysql_fetch_array($res);
		$path = $data['image'];
	}

	if (count($errors)>0) {
		if ($id>0) {
			$edit = true;
		}
		$data['id'] = $_POST['id'];
		$data['details_ru'] = $_POST['details_ru'];
        $data['text_ru'] = $_POST['text_ru'];
        $data['name_ru'] = str_replace("\\'", "'", $_POST['name_ru']);
        $data['details_en'] = $_POST['details_en'];
        $data['text_en'] = $_POST['text_en'];
        $data['name_en'] = str_replace("\\'", "'", $_POST['name_en']);
        $data['file'] = $path;
		$smarty->assign("data", $data);

		$smarty->assign("errors", $errors);
	} else {
		// database modifications
		if ($id>0) {
			$q = "UPDATE `$table` SET
        	    `name_ru`='$name_ru',
        	    `name_en`='$name_en',
              `image`='$path',
              `details_ru`='$details_ru',
              `details_en`='$details_en',
              `text_ru`='$text_ru',
              `text_en`='$text_en'
	            WHERE `id`='$id'";
			
			mq($q);
		} else {
			$q = "INSERT INTO `$table` SET
	            `id`='0',
              `name_ru`='$name_ru',
              `name_en`='$name_en',
              `image`='$path',
              `details_ru`='$details_ru',
              `details_en`='$details_en',
              `text_ru`='$text_ru',
              `text_en`='$text_en'";
			mq($q);
			$id = mysql_insert_id();			
		}
		$_GET['id'] = $id;
		$smarty->assign("message", "Сохранено!");
	}
}

if (isset($_GET['id'])&&count($errors)==0) {
	$id = addslashes($_GET['id']);

	$q = "SELECT * FROM `$table` WHERE id=$id ORDER BY name_ru";
	$res = mq($q);
	$data = mysql_fetch_array($res);

	if (isset($_GET['delimage'])) {
		$q = "UPDATE `$table` SET `image`='' WHERE `id`='$id'";
		mq($q);
		if (is_file("../".$data['image'])) {
			unlink("../".$data['image']);
		}
		unset($data['image']);
		
		$smarty->assign("message", "Изображение проекта было успешно удалено!");
	}
  
	$smarty->assign("data", $data);

	$edit = true;
}

if ($edit) {
	$smarty->assign("page_title", "Редактировать проект");
} else {
	$smarty->assign("page_title", "Новый проект");
}

$smarty->display("adm_group_edit.tpl");
?>