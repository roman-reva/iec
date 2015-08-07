<?php
	require("../system/incl.php");
	
	// performing changes
	if (isset($_GET['del'])) {
		$del = addslashes($_GET['del']);
		$q = "SELECT * FROM `page` WHERE `id`='$del'";
		$data = mysql_fetch_array(mq($q));
		if (!empty($data['file'])) {
			if (is_file($data['file'])) {
				unlink("../".$data['file']);
			}
		}		
		$q = "DELETE FROM `page` WHERE `id`='$del'";
		mq($q);
		$q = "DELETE FROM `page2group` WHERE `id_page`='$del'";
		mq($q);
		$smarty->assign("message", "Удалено!");
	}
	
	// fetching page types 
	$q = "SELECT * FROM page_type ORDER BY name";
	$res = mq($q);
	$page_types = array(array("id" => "0", "name" => "--"));
	while ($info = mysql_fetch_array($res)) {
		$page_types[] = array(
			"id" => $info['id'],
			"name" => $info['name']	
		);
	}
	$smarty->assign("page_types", $page_types);
	
	// fetching projects list 
	$q = "SELECT id, name FROM `group` ORDER BY name";
	$res = mq($q);
	$proj_list = array(array("id" => "0", "name" => "--"));
	while ($info = mysql_fetch_array($res)) {
		$proj_list[] = array(
			"id" => $info['id'],
			"name" => $info['name']	
		);
	}
	$smarty->assign("projects", $proj_list);
	
	// saving filter state
	if (isset($_POST['search_button'])) {
//		if (!empty($_POST['f_name'])) {
			$_SESSION['f_name'] = prep($_POST['f_name']);
//		}
//		if ($_POST['f_type'] != '0') {
			$_SESSION['f_type'] = prep($_POST['f_type']);
//		}
//		if ($_POST['f_proj'] != '0') {
			$_SESSION['f_proj'] = prep($_POST['f_proj']);
//		}
	} else if (isset($_POST['clear_button'])) {
		$_SESSION['f_name'] = '';
		$_SESSION['f_type'] = '0';
		$_SESSION['f_proj'] = '0';
	}

	$smarty->assign("selected_page_name", $_SESSION['f_name']);
	$smarty->assign("selected_page_type", $_SESSION['f_type']);
	$smarty->assign("selected_project", $_SESSION['f_proj']);
	
	// applying filter conditions
	$filter_conditions = "";
	$undef_filter_conditions = "";
	if (!empty($_SESSION['f_name'])) {
		$filter_conditions .= " AND p.title LIKE '%".$_SESSION['f_name']."%' ";
		$undef_filter_conditions = $filter_conditions;
	}
	if ($_SESSION['f_type'] > 0) {
		$filter_conditions .= " AND pt.id = ".$_SESSION['f_type']." ";
		$undef_filter_conditions = $filter_conditions;
	}
	if ($_SESSION['f_proj'] > 0) {
		$filter_conditions .= " AND p2g.id_group = ".$_SESSION['f_proj']." ";
		$undef_filter_conditions .= " AND 1=0 ";
	}

	// fetching list of pages, which are connected to any group
	$q = "SELECT DISTINCT
				p.id AS id,
				p.title AS title,
				pt.name AS page_type
			  FROM 
			  	page AS p, 
			  	page_type AS pt,
			  	page2group AS p2g
			  WHERE 
			  	p2g.id_page = p.id AND
			  	pt.id = p.id_page_type 
			  	$filter_conditions
			  ORDER BY `title`";
	$res = mq($q);
	
	$data = array();
	if (mysql_num_rows($res) > 0) {
		while($info = mysql_fetch_array($res)) {
			$data[] = $info;
		}
	}
	
	// fetching list of pages, which are not connected to any group
	$res1 = mq("SELECT DISTINCT p.id AS id FROM page AS p ORDER BY p.id");
	$undef_data_ids = array();
	while ($info = mysql_fetch_array($res1)) {
		$undef_data_ids[$info['id']] = $info['id'];
	}
	$res2 = mq("SELECT DISTINCT p.id AS id FROM page AS p, page2group AS p2g WHERE p2g.id_page = p.id ORDER BY p.id");
	while ($info = mysql_fetch_array($res2)) {
		unset($undef_data_ids[$info['id']]);
	}

	$undef_data = array();
	if (count($undef_data_ids) > 0) { 
		$ids = implode(", ", $undef_data_ids);
		$q = "SELECT DISTINCT
					p.id AS id,
					p.title AS title,
					pt.name AS page_type
				  FROM 
				  	page AS p, 
				  	page_type AS pt
				  WHERE 
				  	pt.id = p.id_page_type 
				  	$undef_filter_conditions AND
				  	p.id IN ($ids)
				  ORDER BY `title`";
	  	
		$res = mq($q);
		if (mysql_num_rows($res) > 0) {
			while($info = mysql_fetch_array($res)) {
				$undef_data[] = $info;
			}
		}
	}
	
	// saving data for displaying
	if (count($data) > 0 || count($undef_data) > 0) {
		$smarty->assign("data", $data);
		$smarty->assign("undef_data", $undef_data);
	} else {
		$smarty->assign("nodata", true);
	}
	
	$smarty->display("adm_page_list.tpl");
?>