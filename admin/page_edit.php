<?php
	require("../system/incl.php");

	$table = "page";
	$errors = array();
	$edit = false;

	// if submit button was pressed
	if (isset($_POST['sent'])) {
		$id = prep($_POST['id']);
		$title_ru = prep($_POST['title_ru']);
		$title_en = prep($_POST['title_en']);
		$text_ru = prep($_POST['text_ru']);
		$text_en = prep($_POST['text_en']);
		$details_ru = prep($_POST['details_ru']);
		$details_en = prep($_POST['details_en']);
		$page_type = $_POST['page_type'];
		$upd_date = time();

		// validation
		if (empty($title_ru) || empty($title_en)) {
			$errors[] = "Заголовок материала не может быть пустым!";
		}
		if (empty($text_ru) || empty($text_en) ) {
			$errors[] = "Текст материала не может быть пустым!";
		}
		
		$path = "";
		$filename = "";
		if (isset($_FILES['file'])) {
			if ($_FILES['file']['size']>0) {
				if (count($errors)==0) {
					$filename = $_FILES['file']['name'];
					$tmpPath = $_FILES['file']['tmp_name'];
					$path = "data/files/".time()."_".$filename;
						
					move_uploaded_file($tmpPath, "../".$path) or die ("Can't move file!");
				}
			}
		} else if ($id>0) {
			$q = "SELECT `file`, `filename` FROM `$table` WHERE id=$id";
			$res = mq($q);
			$data = mysql_fetch_array($res);
			$path = $data['file'];
			$filename = $data['filename'];
			$data['filesize'] = (int)(filesize("../".$data['file']) / 1024 + 0.5);
		}
							
		if (count($errors)>0) {
			if ($id>0) {
				$edit = true;
			}
			$data['id'] = $_POST['id'];
			$data['title_ru'] = str_replace("\\'", "'", $_POST['title_ru']);
			$data['title_en'] = str_replace("\\'", "'", $_POST['title_en']);
			$data['text_ru'] = str_replace("\\'", "'", $_POST['text_ru']);
			$data['text_en'] = str_replace("\\'", "'", $_POST['text_en']);
			$data['details_ru'] = str_replace("\\'", "'", $_POST['details_ru']);
			$data['details_en'] = str_replace("\\'", "'", $_POST['details_en']);
			$data['file'] = $path;
			$data['filename'] = $filename;
			$data['page_type'] = $_POST['page_type'];
			$smarty->assign("data", $data);

			$smarty->assign("errors", $errors);
		} else {
			// database modifications
			if ($id>0) {
				$q = "UPDATE `$table` SET
	        	    	`title_ru`='$title_ru',
	          	    	`text_ru`='$text_ru',
	          	    	`details_ru`='$details_ru',
	        	    	`title_en`='$title_en',
	          	    	`text_en`='$text_en',
	          	    	`details_en`='$details_en',
	          	    	`file`='$path',
	          	    	`filename`='$filename',
	          	    	`id_page_type`='$page_type',
	            		`update_date`='$upd_date'
  		              WHERE `id`='$id'";
				mq($q);
			} else {
				$q = "INSERT INTO `$table` SET
		            `id`='0',
		            `title_ru`='$title_ru',
                    `text_ru`='$text_ru',
                    `details_ru`='$details_ru',
                    `title_en`='$title_en',
                    `text_en`='$text_en',
                    `details_en`='$details_en',
		            `file`='$path',
		            `filename`='$filename',
		            `id_page_type`='$page_type',
		            `update_date`='$upd_date'";
				$res = mq($q);
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
		$data['filesize'] = (int)(filesize("../".$data['file']) / 1024 + 0.5);
		
		if (isset($_GET['delfile'])) {
			$q = "UPDATE `$table` SET `file`='', `filename`='' WHERE `id`='$id'";
			mq($q);
			if (is_file("../".$data['file'])) {
				unlink("../".$data['file']);
			}
			unset($data['file']);
			$smarty->assign("message", "Файловое вложение удалено!");	
		}

		$smarty->assign("data", $data);

		$edit = true;
	}

	$res = mq("SELECT * FROM `page_type` ORDER BY `name_ru`");
	$page_type = array();
	while ($info = mysql_fetch_array($res)) {
		$page_type[] = $info;
	}

	$smarty->assign("page_type", $page_type);
	if ($edit) {
		$smarty->assign("page_title", "Редактировать материал");
	} else {
		$smarty->assign("page_title", "Новый материал");
	}

	$smarty->display("adm_page_edit.tpl");
?>