<?php
	session_start();

	require("config.php");
	require("db.php");
	require("dao.php");	
	require(HOMEDIR."/smarty/Smarty.class.php");
	
	$smarty = new Smarty;
    $smarty->template_dir  = HOMEDIR.'/templates';
    $smarty->compile_dir   = HOMEDIR.'/templates_c';
    $smarty->config_dir    = HOMEDIR.'/configs';
    $smarty->cache_dir     = HOMEDIR.'/cache';
    $smarty->caching  	 = false; 	

?>