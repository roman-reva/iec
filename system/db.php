<?php

	function mq($query) {
		$res = mysql_query($query) or die("MySQL error occures during execution of query: <br /><br /><pre>".$query."</pre><br /><br />MySQL says: <b>".mysql_error()."</b>");
		return $res;
	}

  function prep($data) {
   	return str_replace("'", "\'", $data);
  }

  function t($obj) {
  	print_r($obj);
    exit;
  }


	$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME, $conn);
	mq("SET NAMES `cp1251`");

?>