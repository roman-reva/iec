<?php
	require("../system/incl.php");

	$errors = array();
	if (isset($_GET['del'])) {
		$q = "SELECT * FROM `infopage`";
		if (mysql_numrows(mq($q))==1) {
			$errors[] = "Невозможно удалить страницу! Как минимум одна страница должна присутствовать на сайте!";
		}
		
	  	$del = addslashes($_GET['del']);
	   	$q = "DELETE FROM `infopage` WHERE `id`='$del'";
	    mq($q);
	    $smarty->assign("message", "Удалено!");
	}

	$q = "SELECT 
			p.id AS id,
			p.title AS title,
			p.menutitle AS menutitle,
			p.weight AS weight
		  FROM 
		  	infopage AS p 
		  ORDER BY 
		  	weight";
	$res = mq($q);

	$data = array();
	while($info = mysql_fetch_array($res)) {
		$data[] = $info;
	}
	
	$smarty->assign("data", $data);

	$smarty->display("adm_infopage_list.tpl");
?>