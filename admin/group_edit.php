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
	$name = prep($_POST['name']);
	$details = prep($_POST['details']);
	$text = prep($_POST['text']);

	// validation
	if (empty($name)) {
		$errors[] = "Название не может быть пустым!";
	}
	// validation
	if (empty($details)) {
		$errors[] = "Краткое описание не может быть пустым!";
	}
	
	if (empty($text)) {
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
		$data['details'] = $_POST['details'];
		$data['file'] = $path;		
		$data['text'] = $_POST['text'];
		$data['name'] = str_replace("\\'", "'", $_POST['name']);
		$smarty->assign("data", $data);

		$smarty->assign("errors", $errors);
	} else {
		// database modifications
		if ($id>0) {
			$q = "UPDATE `$table` SET
        	    `name`='$name',
              `image`='$path',
              `details`='$details',
              `text`='$text'
	            WHERE `id`='$id'";
			
			mq($q);
		} else {
			$q = "INSERT INTO `$table` SET
	            `id`='0',
              `details`='$details',
              `text`='$text',
              `image`='$path',
	            `name`='$name'";
			mq($q);
			$id = mysql_insert_id();			
		}
		$_GET['id'] = $id;
		$smarty->assign("message", "Сохранено!");
	}
}

if (isset($_GET['id'])&&count($errors)==0) {
	$id = addslashes($_GET['id']);

	$q = "SELECT * FROM `$table` WHERE id=$id ORDER BY name";
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