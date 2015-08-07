<?php /* Smarty version 2.6.14, created on 2011-10-12 00:46:55
         compiled from adm_header.tpl */ ?>
<html>
<head>
<title>Панель управления</title>
<meta http-equiv="Content-Type" content="text/html; charset=cp1251" />
<?php echo '
<style>
BODY {
	font-family: verdana;
	font-size: 12px;
	color: #202020;
	background-color: #202020;
}

a {
	font-family: verdana;
	font-size: 12px;
	color: #4499CB;
	font-weight: bold;
	text-decoration: none;
}

a:hover {
	font-family: verdana;
	font-size: 12px;
	color: #4499CB;
	font-weight: bold;
	text-decoration: underline;
}

a.menu {
	font-family: verdana;
	font-size: 11px;
	color: #185BA9;
	font-weight: bold;
	text-decoration: none;
	line-height: 25px;
}

a.menu:hover {
	font-family: verdana;
	font-size: 11px;
	color: #4499CB;
	font-weight: bold;
	text-decoration: underline;
	line-height: 25px;
}

.head {
	font-family: verdana;
	font-size: 26pt;
	color: #FFFFFF;
	font-weight: bold;
	text-decoration: none;
	padding-left: 20px;
}

.head2 {
	font-family: verdana;
	font-size: 18pt;
	color: #4499CB;
	font-weight: bold;
	text-decoration: none;
	padding-left: 0px;
	padding-bottom: 10px;
}

.head3 {
	font-family: verdana;
	font-size: 10pt;
	color: #808080;
	font-weight: bold;
	text-decoration: none;
	padding-left: 0px;
}

th {
	text-align:center;
	font-family: verdana;
	font-size: 12px;
	color: #F8F8F8;
	background-color: #226892;
	padding-left: 10px;
	padding-right: 10px;
	background-image: url(\'../images/admbghead.jpg\');
}

td.tbl, td, td.tbl_subcat {
	font-family: verdana;
	font-size: 12px;
	padding-left: 3px;
	padding-right: 3px;
	color: #202020;

}

td.tbl_delimeter {
	height: 2px;
	padding: 0px;
	background-color: #E0E0E0;
	color: #505050;
	font-weight: bold;
}

td.tbl {
	background-color: #F8F8F8;
}

input.long {
	width: 600px;
	font-family: verdana;
	font-size: 12px;
}

input.short {
	width: 250px;
	font-family: verdana;
	font-size: 12px;
}

div.errorlist {
	color: #DD0000;
	width: 770px;
	font-family: verdana;
	font-size: 12px;
	background-color: #F0F0F0;
	padding: 10px;
}

div.groupbox {
	padding: 5px;
	width: 615px;
	font-family: verdana;
	font-size: 10px;
	float: left;
	background-color: #FFFFFF;
}

div.groupitem {
	padding: 2px;
	width: 200px;
	font-family: verdana;
	font-size: 10px;
	float: left;
	background-color: #FFFFFF;
}

div.buttons {
	padding: 20px;
	width: 610px;
	font-family: verdana;
	font-size: 10px;
	float: left;
	background-color: #FFFFFF;
}

input {
	font-family: verdana;
	font-size: 11px;
}

li.error {
	font-family: verdana;
	font-size: 11px;
	color: #aa0000;
}

li.message {
	font-family: verdana;
	font-size: 11px;
	color: #00aa00;
	font-weight: bold;
}

</style>
'; ?>

</head>
<body bgcolor="#FFFFFF" marginwidth="0" marginheight="0" topmargin="0"
	bottommargin="0" leftmargin="0" rightmargin="0">
<table width="1000" align="center" height="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td height="70" width="100%" bgcolor="#61A0DA" background="../images/admbghead.jpg" colspan="2"
			class="head"><b>IEC: Administration</b></td>
	</tr>
	<tr>
		<td width="130" bgcolor=F0F0F0 valign="top" background="../images/admmenubg.gif"
			style="padding-top: 30px; padding-left: 20px; padding-right: 10px;">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
		<td width="840" bgcolor="#FFFFFF" valign="top"
			style="padding-top: 20px; padding-left: 30px;">