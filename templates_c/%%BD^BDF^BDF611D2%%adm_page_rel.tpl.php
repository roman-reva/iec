<?php /* Smarty version 2.6.14, created on 2011-08-19 16:05:07
         compiled from adm_page_rel.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
	var cat_ids = [];
	<?php $this->assign('numb', '0'); ?>
	<?php $_from = $this->_tpl_vars['cat_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cid'] => $this->_tpl_vars['it']):
?>
	cat_ids[<?php echo $this->_tpl_vars['numb']; ?>
] = <?php echo $this->_tpl_vars['cid']; ?>
;
	<?php $this->assign('numb', $this->_tpl_vars['numb']+1); ?>
	<?php endforeach; endif; unset($_from); ?>
<?php echo '
	function gg(catid, grid) {
		var val = false;
		if (document.getElementById(\'box_\' + catid + \'_\' + grid).checked) {
			val = true;
		}

		for (var i=0; i<cat_ids.length; i++) {
			var el = document.getElementById(\'box_\' + cat_ids[i] + \'_\' + grid);
			if (el != null) {
				el.checked = val;
			}
		}
	}
	'; ?>

</script>


<span class="head2"><?php echo $this->_tpl_vars['page_title']; ?>
</span><br /><br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "messagebar.tpl", 'smarty_include_vars' => array('errors' => $this->_tpl_vars['errors'],'message' => $this->_tpl_vars['message'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

Выберите, в каких проектах будет отображаться данный материал:<br /><br />

<form name="rel" action="?" method="POST">

	<?php $_from = $this->_tpl_vars['cat_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['it']):
?>
  	<div class="groupbox">
  		<span class="head3"><?php echo $this->_tpl_vars['it']['name']; ?>
</span><br />
    	<?php $_from = $this->_tpl_vars['it']['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gr']):
?>
    	<div class="groupitem">
	    	<input name="groups[]" onclick="gg(<?php echo $this->_tpl_vars['it']['id']; ?>
, <?php echo $this->_tpl_vars['gr']['id']; ?>
)" id="box_<?php echo $this->_tpl_vars['it']['id']; ?>
_<?php echo $this->_tpl_vars['gr']['id']; ?>
" type="checkbox" value="<?php echo $this->_tpl_vars['gr']['id']; ?>
" <?php if ($this->_tpl_vars['gr']['checked']): ?>checked<?php endif; ?>> <?php echo $this->_tpl_vars['gr']['name']; ?>
 <br />
    	</div>
    	<?php endforeach; endif; unset($_from); ?>
 	</div>
  	<?php endforeach; endif; unset($_from); ?>



  <div class="buttons">
  	<input name="id" type="hidden" value="<?php echo $this->_tpl_vars['id']; ?>
">
		<input type="submit" name="sent" value="Сохранить">
  	<input type="button" onclick='location.href="page_list.php"' value="Назад">
  </div>
</form>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>