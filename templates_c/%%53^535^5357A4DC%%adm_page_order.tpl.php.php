<?php /* Smarty version 2.6.14, created on 2011-08-17 20:31:48
         compiled from adm_page_order.tpl.php */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
	function reflow() {
		document.forms[\'grouporder\'].submit();
	} 
</script>
'; ?>


<span class="head2">Порядок материалов в проекте '<?php echo $this->_tpl_vars['project_name']; ?>
'</span><br /><br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "messagebar.tpl", 'smarty_include_vars' => array('errors' => $this->_tpl_vars['errors'],'message' => $this->_tpl_vars['message'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if (count ( $this->_tpl_vars['errors'] ) == 0): ?>
<form id="grouporder" action="?gid=<?php echo $this->_tpl_vars['gid']; ?>
" method="post">
<input type='hidden' value='sent' name='save' />

Выберите тип материалов: 

<select name="page_type" onchange='reflow()'>
	<?php $_from = $this->_tpl_vars['page_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type']):
?> 
		<option value="<?php echo $this->_tpl_vars['type']['id']; ?>
" <?php if ($this->_tpl_vars['type']['id'] == $this->_tpl_vars['selected_page_type']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['type']['name']; ?>
</option>
	<?php endforeach; endif; unset($_from); ?>
</select>
<br />

<?php if ($this->_tpl_vars['selected_page_type'] != ''): ?>
<br />
<table cellspacing="1" cellpadding="2" bgcolor="#D0D0D0">
	<tr>
		<th>Вес</th>
		<th>ID</th>
		<th>Заголовок материала</th>
		<th>Тип материала</th>
	</tr>
	<?php if ($this->_tpl_vars['nodata'] == true): ?>
		<tr>
			<td class="tbl" colspan="3" height="40" align="center"><b>Нет данных!</b></td>
		</tr>
	<?php else: ?>
		<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		<tr>
			<td class="tbl">
				<select name="w_<?php echo $this->_tpl_vars['item']['id']; ?>
" onchange='reflow();'>
					<?php $_from = $this->_tpl_vars['page_weights']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['w_value']):
?>	
						<option value="<?php echo $this->_tpl_vars['w_value']; ?>
" <?php if ($this->_tpl_vars['item']['weight'] == $this->_tpl_vars['w_value']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['w_value']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</td>
			<td class="tbl"><?php echo $this->_tpl_vars['item']['page_id']; ?>
</td>
			<td class="tbl"><?php echo $this->_tpl_vars['item']['title']; ?>
</td>
			<td class="tbl"><?php echo $this->_tpl_vars['item']['page_type']; ?>
</td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
</table>
<?php endif; ?>
</form>

<input type="button" value="Назад" onclick="location.href='group_list.php'" />
<?php endif; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>