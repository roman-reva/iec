<?php /* Smarty version 2.6.14, created on 2010-08-24 15:44:52
         compiled from adm_pages.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table width="90%" cellspacing="2" cellpadding="2">
	<tr>
		<th>ID</th>
		<th>Заголовок страницы</th>
		<th>Название в меню</th>
		<th></th>
	</tr>
	<?php if ($this->_tpl_vars['nodata'] == true): ?>
		<tr>
			<td class="tbl" colspan="4" height="40" align="center"><b>Нет данных!</b></td>
		</tr>
	<?php else: ?>
		<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		<tr>
			<td class="tbl">$item.id</td>
			<td class="tbl">$item.title</td>
			<td class="tbl"><a href="?edit=$item.id">[ edit ]</a> <a href="?del=$item.id">[ del ]</a></td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
</table>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>