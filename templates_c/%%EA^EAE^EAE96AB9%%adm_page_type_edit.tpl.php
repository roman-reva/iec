<?php /* Smarty version 2.6.14, created on 2012-03-24 12:08:37
         compiled from adm_page_type_edit.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> <?php echo '

<!-- TinyMCE -->
<script type="text/javascript"
	src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,images,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,undo,redo,|,link,unlink,anchor,images,cleanup,help,code,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,fullscreen",

		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "tinymce/lists/template_list.js",
		external_link_list_url : "tinymce/lists/link_list.js",
		external_image_list_url : "tinymce/lists/image_list.js",
		media_external_list_url : "tinymce/lists/media_list.js",
	});
</script>
<!-- /TinyMCE -->

'; ?>


<span class="head2"><?php echo $this->_tpl_vars['page_title']; ?>
</span>
<br />
<br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "messagebar.tpl", 'smarty_include_vars' => array('errors' => $this->_tpl_vars['errors'],'message' => $this->_tpl_vars['message'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<form name="edit" action="?" method="POST">
	<span class="head3">Название типа материала:</span><br />
	<input type="text" name="name" class="short" value="<?php echo $this->_tpl_vars['data']['name']; ?>
"><br /><br />

	<span class="head3">Вес типа:</span><br />
	<select name="weight" value="<?php echo $this->_tpl_vars['data']['name']; ?>
">
		<?php $_from = $this->_tpl_vars['weights']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['it']):
?>
		<option value='<?php echo $this->_tpl_vars['it']; ?>
' <?php if ($this->_tpl_vars['data']['weight'] == $this->_tpl_vars['it']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['it']; ?>
</option>
		<?php endforeach; endif; unset($_from); ?>
	</select><br /><br />	
	
	<input name="id" type="hidden" value="<?php echo $this->_tpl_vars['data']['id']; ?>
"> 
	<input type="submit" name="sent" value="Сохранить"> 
	<input type="button" onclick='location.href="page_type_list.php"' value="Назад">

</form><br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>