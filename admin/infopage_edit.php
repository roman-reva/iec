<?php
	require("../system/incl.php");

	$table = "infopage";
	$errors = array();
	$edit = false;
	
	$weights = array();
  	for($i=1; $i<21; $weights[]=$i++);
  	$smarty->assign("weights", $weights);

	// if submit button was pressed
	if (isset($_POST['sent'])) {
		$id = prep($_POST['id']);
		$title = $_POST['title'];
		$menutitle = $_POST['menutitle'];
		$text = $_POST['text'];
		$weight = $_POST['weight'];
		
		// validation
		if (empty($menutitle)) {
			$errors[] = "Заголовок страницы в меню не может быть пустым!";
		}
//		if (empty($text)) {
//			$errors[] = "Текст страницы не может быть пустым!";
//		}
		
		// 811x406
		$path = "";
		if (isset($_FILES['background'])&&$_FILES['background']['size']>0) {
			if (!($_FILES['background']['type']=='image/gif'||$_FILES['background']['type']=='image/jpeg')) {
				$errors[] = "Вы можете загружать только картинки в формате GIF либо JPEG.";
			} else if (count($errors)==0) {
				$filename = $_FILES['background']['name'];
				$tmpPath = $_FILES['background']['tmp_name'];
				$path = "data/backgrounds/".time()."_".$filename;
					
				move_uploaded_file($tmpPath, "../".$path);
			}
		} else if ($id > 0) {
			$q = "SELECT `background` FROM `$table` WHERE id=$id";
			$res = mq($q);
			$data = mysql_fetch_array($res);
			$path = $data['background'];
		}

		if (count($errors)>0) {
			if ($id>0) {
				$edit = true;
			}
			$data['id'] = $_POST['id'];
			$data['title'] = str_replace("\\'", "'", $_POST['title']);
			$data['menutitle'] = str_replace("\\'", "'", $_POST['menutitle']);
			$data['text'] = str_replace("\\'", "'", $_POST['text']);
			$data['background'] = $path;
			$data['weight'] = $_POST['weight'];
			$smarty->assign("data", $data);

			$smarty->assign("errors", $errors);
		} else {
			// database modifications
			if ($id>0) {
				$q = "UPDATE `$table` SET
	        	    	`title`='$title',
	          	    	`text`='$text',
	          	    	`menutitle`='$menutitle',
	          	    	`background`='$path',
	            		`weight`='$weight'
  		              WHERE `id`='$id'";
				
				mq($q);
				$_GET['id']=$id;
			} else {
				$q = "INSERT INTO `$table` SET
		            	`id`='0',
	        	    	`title`='$title',
	          	    	`text`='$text',
	          	    	`menutitle`='$menutitle',
	            		`background`='$path',
	          	    	`weight`='$weight'";
				
				mq($q);
				$id = mysql_insert_id();
				$_GET['id']=$id;
			}
			$smarty->assign("message", "Сохранено!");
		}
	} 
	
	if (isset($_GET['id'])) {
		$id = addslashes($_GET['id']);

		$q = "SELECT * FROM `$table` WHERE id=$id";
		$res = mq($q);
		$data = mysql_fetch_array($res);

		if (isset($_GET['delimage'])) {
			$q = "UPDATE `$table` SET `background`='' WHERE `id`='$id'";
			mq($q);
			if (is_file("../".$data['background'])) {
				unlink("../".$data['background']);
			}
			unset($data['background']);
			$smarty->assign("message", "Фоновое изображение страницы удалено!");
		}
		
		$smarty->assign("data", $data);

		$edit = true;
	}

	if ($edit) {
		$smarty->assign("page_title", "Редактировать страницу");
	} else {
		$smarty->assign("page_title", "Новая страница");
	}

	$smarty->display("adm_infopage_edit.tpl");
?>