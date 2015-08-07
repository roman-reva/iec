<?php /* Smarty version 2.6.14, created on 2011-08-19 16:00:02
         compiled from adm_infopage_list.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<span class="head2">Страницы</span><br /><br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "messagebar.tpl", 'smarty_include_vars' => array('errors' => $this->_tpl_vars['errors'],'message' => $this->_tpl_vars['message'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div style="padding-bottom: 5px;"><a href="infopage_edit.php">[ Добавить ]</a></div>

<table cellspacing="1" cellpadding="2" bgcolor="#D0D0D0">
	<tr>
		<th>ID</th>
		<th>Заголовок страницы</th>
		<th>Заголовок в меню</th>
		<th>Вес в меню</th>
		<th width="30"></th>
	</tr>
	<?php if (count ( $this->_tpl_vars['data'] ) == 0): ?>
		<tr>
			<td class="tbl" colspan="5" height="40" align="center"><b>Нет данных!</b></td>
		</tr>
	<?php else: ?>
		<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		<tr>
			<td class="tbl"><?php echo $this->_tpl_vars['item']['id']; ?>
</td>
			<td class="tbl"><?php if ($this->_tpl_vars['item']['title'] != ""):  echo $this->_tpl_vars['item']['title'];  else: ?><i>Нет заголовка</i><?php endif; ?></td>
			<td class="tbl"><?php echo $this->_tpl_vars['item']['menutitle']; ?>
</td>
			<td class="tbl"><?php echo $this->_tpl_vars['item']['weight']; ?>
</td>
			<td class="tbl" align="center">
	      <a href="infopage_edit.php?id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src='../images/b_edit.png' title="Править" border="0"></a>
	      <a href="?del=<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="return confirm('Удалить?')"><img src='../images/b_del.png' title="Удалить" border="0"></a>
      </td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
</table>

<div style="padding-top: 5px;"><a href="infopage_edit.php">[ Добавить ]</a></div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>