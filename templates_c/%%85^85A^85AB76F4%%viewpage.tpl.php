<?php /* Smarty version 2.6.14, created on 2011-08-18 15:17:19
         compiled from viewpage.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['page']['title'] != ""): ?>
	<?php if ($this->_tpl_vars['page']['type'] != 'infopage'): ?>
		Тип материала: <span style="color:#<?php echo $this->_tpl_vars['page']['color']; ?>
"><?php echo $this->_tpl_vars['page']['type']; ?>
</span><br />
      	Обновлен: <?php echo $this->_tpl_vars['page']['updated']; ?>
<br /><br />
	<?php endif; ?>
   <div class="pagetitle"><?php echo $this->_tpl_vars['page']['title']; ?>
</div>
<?php endif; ?>

<?php echo $this->_tpl_vars['page']['text']; ?>
<br />

<?php if ($this->_tpl_vars['page']['file'] != ""): ?>
	<table width="100%" align="center" cellspacing="0" cellpadding="0">
    	<tr><td width="100%" height="1" background="images/line.gif"></td></tr>
    </table><br />
    <b>Скачать приклепленный файл:</b> <a href="<?php echo $this->_tpl_vars['page']['file']; ?>
"><?php echo $this->_tpl_vars['page']['filename']; ?>
</a> (<?php echo $this->_tpl_vars['page']['filesize']; ?>
 Кб)<br /><br />
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>