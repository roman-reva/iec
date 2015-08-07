<?php /* Smarty version 2.6.14, created on 2011-08-17 20:28:55
         compiled from viewinfopage.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['page']['title'] != ""): ?>
	<div class="pagetitle"><?php echo $this->_tpl_vars['page']['title']; ?>
</div>
<?php endif; ?>
<?php echo $this->_tpl_vars['page']['text']; ?>
<br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>