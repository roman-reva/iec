<?php /* Smarty version 2.6.14, created on 2012-03-28 14:06:48
         compiled from adm_category_rel.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script type="text/javascript">
function markSelect(id) {
	var boxId = "box_" + id;
	var selId = "weight_" + id;
	if (document.getElementById(boxId).checked) {
		document.getElementById(selId).style.visibility = "visible";
	} else {
		document.getElementById(selId).style.visibility = "hidden";
	}	
}
</script>
'; ?>


<span class="head2"><?php echo $this->_tpl_vars['page_title']; ?>
</span><br /><br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "messagebar.tpl", 'smarty_include_vars' => array('errors' => $this->_tpl_vars['errors'],'message' => $this->_tpl_vars['message'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<form name="rel" action="?id=<?php echo $this->_tpl_vars['data']['id']; ?>
" method="POST">

	
	<span class="head3">Добавить проект:</span><br />
	<select name="newprojid" value="<?php echo $this->_tpl_vars['data']['name']; ?>
">
  	<?php $_from = $this->_tpl_vars['fullgrouplist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['it']):
?>
   	  <option value='<?php echo $this->_tpl_vars['it']['id']; ?>
'><?php echo $this->_tpl_vars['it']['name']; ?>
</option>
    <?php endforeach; endif; unset($_from); ?>
 	</select> <input type="submit" name="add" value="Добавить"><br /><br />

 	<span class="head3">Привязанные проекты:</span><br />
 	<table cellspacing="1" cellpadding="1" bgcolor="#D0D0D0">
		<tr>
			<th>Название проекта</th>
			<th>Вес</th>
			<th></th>
		</tr>
		<?php if (count ( $this->_tpl_vars['grouplist'] ) == 0): ?>
		<tr>
			<td class="tbl" colspan="3" height="40" align="center">Нет проектов!</td>
		</tr>
		<?php else: ?>
			<?php $_from = $this->_tpl_vars['grouplist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			<tr>
				<td class="tbl"><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
				<td class="tbl">
				<select name="weight_<?php echo $this->_tpl_vars['item']['id']; ?>
">
			  		<?php $_from = $this->_tpl_vars['weights']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['it']):
?>
			   	  	<option value='<?php echo $this->_tpl_vars['it']; ?>
'<?php if ($this->_tpl_vars['item']['weight'] == $this->_tpl_vars['it']): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['it']; ?>
</option>
			    	<?php endforeach; endif; unset($_from); ?>
			 	</select>
				</td>
				<td class="tbl">
		     		<a href="?delproj=<?php echo $this->_tpl_vars['item']['id']; ?>
&id=<?php echo $this->_tpl_vars['data']['id']; ?>
" onclick="return confirm('Удалить?')"><img src='../images/b_del.png' title="Удалить" border="0"></a>
	      		</td>
			</tr>
			<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
	</table><br /> 
	
	
	<input type="submit" name="save" value="Сохранить">
 	<input type="button" onclick='location.href="category_list.php"' value="Назад"><br /><br />


</form>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>