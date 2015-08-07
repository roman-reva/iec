<?php /* Smarty version 2.6.14, created on 2011-10-12 00:46:58
         compiled from adm_page_list.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<span class="head2">Материалы</span><br /><br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "messagebar.tpl", 'smarty_include_vars' => array('errors' => $this->_tpl_vars['errors'],'message' => $this->_tpl_vars['message'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<form name="filter" action="?" method="post">
	<table cellspacing="1" cellpadding="2" bgcolor="#D0D0D0">
		<tr>
			<th colspan="4">Фильтр поиска</th>
		</tr>
		<tr>
			<td bgcolor="#F8F8F8" align="right">Проект: </td>
			<td bgcolor="#F8F8F8">
				<select name="f_proj">
					<?php $_from = $this->_tpl_vars['projects']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['proj']):
?> 
						<option value="<?php echo $this->_tpl_vars['proj']['id']; ?>
" <?php if ($this->_tpl_vars['proj']['id'] == $this->_tpl_vars['selected_project']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['proj']['name']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</td>
			<td bgcolor="#F8F8F8" align="right">Тип: </td>
			<td bgcolor="#F8F8F8">
				<select name="f_type">
					<?php $_from = $this->_tpl_vars['page_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type']):
?> 
						<option value="<?php echo $this->_tpl_vars['type']['id']; ?>
" <?php if ($this->_tpl_vars['type']['id'] == $this->_tpl_vars['selected_page_type']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['type']['name']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</td>
		</tr>
		<tr>
			<td bgcolor="#F8F8F8" align="right">Заголовок: </td>
			<td bgcolor="#F8F8F8" colspan="3"><input type="text" class="short" name="f_name" value="<?php echo $this->_tpl_vars['selected_page_name']; ?>
" /></td>
		</tr>
		<tr>
			<td colspan="4" align="right" bgcolor="#F8F8F8">
				<input type="submit" value="Поиск" name="search_button" />
				<input type="submit" value="Очистить" name="clear_button" />
			</td>
		</tr>
	</table><br />
</form>

<div style="padding-bottom: 5px;"><a href="page_edit.php">[ Добавить ]</a></div>

<table cellspacing="1" cellpadding="2" bgcolor="#D0D0D0">
	<tr>
		<th>ID</th>
		<th>Заголовок материала</th>
		<th>Тип материала</th>
		<th width="60"></th>
	</tr>
	<?php if ($this->_tpl_vars['nodata'] == true): ?>
		<tr>
			<td class="tbl" colspan="4" height="40" align="center"><b>Нет данных!</b></td>
		</tr>
	<?php else: ?>
		<?php if (count ( $this->_tpl_vars['undef_data'] ) > 0): ?>
		<?php $_from = $this->_tpl_vars['undef_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		<tr>
			<td class="tbl"><?php echo $this->_tpl_vars['item']['id']; ?>
</td>
			<td class="tbl">
				<img src="/images/attention.png" width="13" height="13" title="Данный материал не привязан ни к одному проекту" />
				<?php echo $this->_tpl_vars['item']['title']; ?>

			</td>
			<td class="tbl"><?php echo $this->_tpl_vars['item']['page_type']; ?>
</td>
			<td class="tbl" align="center">
	      	  <a href="page_rel.php?id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src='../images/b_rel.png' title="Связи" border="0"></a>
		      <a href="page_edit.php?id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src='../images/b_edit.png' title="Править" border="0"></a>
		      <a href="?del=<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="return confirm('Удалить?')"><img src='../images/b_del.png' title="Удалить" border="0"></a>
	        </td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
	
		<?php if (count ( $this->_tpl_vars['data'] ) > 0 && count ( $this->_tpl_vars['undef_data'] ) > 0): ?>
			<tr>
				<td colspan="4" class="tbl_delimeter" align="center"></td>
			</tr>
		<?php endif; ?>
		<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		<tr>
			<td class="tbl"><?php echo $this->_tpl_vars['item']['id']; ?>
</td>
			<td class="tbl"><?php echo $this->_tpl_vars['item']['title']; ?>
</td>
			<td class="tbl"><?php echo $this->_tpl_vars['item']['page_type']; ?>
</td>
			<td class="tbl" align="center">
	      	  <a href="page_rel.php?id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src='../images/b_rel.png' title="Связи" border="0"></a>
		      <a href="page_edit.php?id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src='../images/b_edit.png' title="Править" border="0"></a>
		      <a href="?del=<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="return confirm('Удалить?')"><img src='../images/b_del.png' title="Удалить" border="0"></a>
	        </td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
</table>

<div style="padding-top: 5px;"><a href="page_edit.php">[ Добавить ]</a></div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>