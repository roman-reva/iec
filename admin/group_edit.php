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

	$path['en'] = $path['ru'] = "";
    $pics = [];
    foreach ($_FILES['picture'] as $field => $values) {
        foreach ($values as $lang => $val) {
            $pics[$lang][$field] = $val;
        }
    }

	if (!empty($pics['en']['size']) || !empty($pics['ru']['size'])) {
	    foreach ($pics as $lang => $pic) {
            if ($pic['size']>0) {
                if (!($pic['type']=='image/gif'||$pic['type']=='image/jpeg')) {
                    $errors[] = "Вы можете загружать только картинки в формате GIF либо JPEG.";
                } else if (count($errors)==0) {
                    $filename = $pic['name'];
                    $tmpPath = $pic['tmp_name'];
                    $path[$lang] = "data/thumbs/".time()."_".$filename;

                    move_uploaded_file($tmpPath, "../".$path[$lang]);
                }
            }
        }
	}
    if ($id>0) {
		$q = "SELECT `image_en`, `image_ru` FROM `$table` WHERE id=$id";
		$res = mq($q);
		$data = mysqli_fetch_array($res);
		$path['en'] = $path['en'] ? $path['en'] : $data['image_en'];
		$path['ru'] = $path['ru'] ? $path['ru'] : $data['image_ru'];
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
              `image_ru`='{$path['ru']}',
              `image_en`='{$path['en']}',
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
              `image_ru`='{$path['ru']}',
              `image_en`='{$path['en']}',
              `details_ru`='$details_ru',
              `details_en`='$details_en',
              `text_ru`='$text_ru',
              `text_en`='$text_en'";
			mq($q);
			$id = mysqli_insert_id();
		}
		$_GET['id'] = $id;
		$smarty->assign("message", "Сохранено!");
	}
}

if (isset($_GET['id'])&&count($errors)==0) {
	$id = addslashes($_GET['id']);

	$q = "SELECT * FROM `$table` WHERE id=$id ORDER BY name_ru";
	$res = mq($q);
	$data = mysqli_fetch_array($res);

	if (isset($_GET['delimage'])) {
		$q = "UPDATE `$table` SET `image_".$_GET['delimage']."`='' WHERE `id`='$id'";
		mq($q);
		if (is_file("../".$data['image_'.$_GET['delimage']])) {
			unlink("../".$data['image_'.$_GET['delimage']]);
		}
		unset($data['image_'.$_GET['delimage']]);
		
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