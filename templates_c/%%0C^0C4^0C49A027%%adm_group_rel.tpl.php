<?php /* Smarty version 2.6.14, created on 2010-08-31 16:12:16
         compiled from adm_group_rel.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<span class="head2"><?php echo $this->_tpl_vars['page_title']; ?>
</span><br /><br />

<form name="rel" action="?" method="POST">

	<span class="head3">Выберите одну или несколько тематик для данного проекта:</span><br />
  <?php $_from = $this->_tpl_vars['cat_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['it']):
?>
  	<input name="catlist[]" type="checkbox" value="<?php echo $this->_tpl_vars['it']['id']; ?>
" <?php if ($this->_tpl_vars['it']['checked']): ?>checked<?php endif; ?>> <?php echo $this->_tpl_vars['it']['name']; ?>
 <br />
  <?php endforeach; endif; unset($_from); ?>  <br />


  <input name="id" type="hidden" value="<?php echo $this->_tpl_vars['id']; ?>
">
	<input type="submit" name="sent" value="Сохранить">
  <input type="button" onclick='location.href="group_list.php"' value="Назад">
</form>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>