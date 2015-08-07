<?php
require("../system/incl.php");

$errors = array();

$weights = array();
for($i=1; $i<21; $weights[]=$i++);
$smarty->assign("weights", $weights);

if (isset($_GET['delproj'])) {
	$pid = addslashes($_GET['delproj']);
	$q = "DELETE FROM `group2category` WHERE `id`='$pid'";
	mq($q);
}

$q = "SELECT id, name FROM `group` ORDER BY name";
$fullgrouplist = array();
$res = mq($q);
while ($info = mysql_fetch_array($res)) {
	$fullgrouplist[] = $info;
}
$smarty->assign("fullgrouplist", $fullgrouplist);

if (isset($_GET['id'])) {
	$id = addslashes($_GET['id']);

	$q = "SELECT * FROM `category` WHERE id=$id";
	$res = mq($q);
	$data = mysql_fetch_array($res);		
	$smarty->assign("data", $data);
	
	
	if (isset($_POST['add'])) {
		$newprojid = addslashes($_POST['newprojid']);
		$q = "SELECT * FROM `group2category` WHERE `id_category`='$id' AND `id_group`='$newprojid'";
		if (mysql_num_rows(mq($q))) {
			$errors[] = "Данная тематика уже привязана к выбранному проекту";
		} else {
			$q = "INSERT INTO `group2category` SET `id_category`=$id, `id_group`=$newprojid";
			mq($q);
			$smarty->assign("message", "Добавлено!");
		}
	}
	
	if (isset($_POST['save'])) {
		$q = "SELECT
				g2c.id as id,
				g2c.weight as weight
			  FROM 
		  		`group2category` AS g2c
		  	  WHERE
		  	  	`id_category`='$id'";
		
		$res = mq($q);
		$grouplist = array();
		while ($info = mysql_fetch_array($res)) {
			$newweight = $_POST['weight_'.$info['id']];
			$q = "UPDATE `group2category` SET `weight`='$newweight' WHERE `id`='".$info['id']."'";
			mq($q);
		}
		$smarty->assign("message", "Сохранено!");
	}
	
	
	$q = "SELECT
			g2c.id as id,
			g2c.weight as weight,
			g.name as name
		  FROM 
		  	`group2category` AS g2c, 
		  	`group` AS g 
		  WHERE
		  	g2c.id_group = g.id AND 
		  	`id_category`='$id'
		  ORDER BY
		  	weight";

	$res = mq($q);
	$grouplist = array();
	while ($info = mysql_fetch_array($res)) {
		$grouplist[] = $info;
	}
	
	$smarty->assign("errors", $errors);
	$smarty->assign("grouplist", $grouplist);
}

$smarty->assign("page_title", "Связи тематики '".$data['name']."'");

$smarty->display("adm_category_rel.tpl");
?>