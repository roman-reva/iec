<?php
	require("../system/incl.php");
	
	if (!isset($_GET['gid'])) {
		$smarty->assign("errors", array("Ќеверно переданы параметры страницы"));
		$smarty->display("adm_page_order.tpl.php");
		exit;
	}

	// performing changes
	$selected_page_type = 0;	
	if (isset($_POST['save'])) {
		if (isset($_POST['page_type'])) {
			$selected_page_type = addslashes($_POST['page_type']);
			$smarty->assign("selected_page_type", $selected_page_type); 
		}
		
		$new_weights = array();
		foreach ($_POST as $field => $value) {
			if (preg_match("~^w_([0-9]+)$~", $field, $matches)) {
				$new_weights[$matches[1]] = $value;
			}
		}
		foreach ($new_weights as $edge_id=>$weight_val) {
			$q = "UPDATE `page2group` SET `weight`=$weight_val WHERE `id`=$edge_id";
			mq($q);
		}
	}

	$gid = addslashes($_GET['gid']);
	$smarty->assign("gid", $gid);
	
	// project name
	$q = "SELECT * FROM `group` WHERE id=$gid";
	$info = mysql_fetch_array(mq($q));
	$smarty->assign("project_name", $info['name']);
	
	// page types
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
	
	// page weights
	$page_weights = array();
	for ($i=1; $i<=50; $page_weights[]=$i++);
	$smarty->assign("page_weights", $page_weights);
		
	// page list
	$q = "SELECT
			p2g.id AS id,
			p2g.id_page AS page_id,
			p2g.weight AS weight,
			p.title AS title,
			pt.name AS page_type
		  FROM
			`page2group` AS p2g,
			`page` AS p,
			`page_type` AS pt
		  WHERE 
		  	p.id_page_type = pt.id AND
		  	p.id = p2g.id_page AND
		  	p2g.id_group = $gid AND
		  	pt.id = $selected_page_type 
		  ORDER BY
		  	p2g.weight ASC";
	
	$res = mq($q);
	$data = array();
	while ($info = mysql_fetch_array($res)) {
		$data[] = array(
			"id" => $info['id'],
			"page_id" => $info['page_id'],
			"weight" => $info['weight'],
			"title" => $info['title'],
			"page_type" => $info['page_type']
		);
	}
	
	if (count($data) > 0) {
		$smarty->assign("data", $data);
	} else {
		$smarty->assign("nodata", true);
	}
	
	$smarty->display("adm_page_order.tpl.php");
?>