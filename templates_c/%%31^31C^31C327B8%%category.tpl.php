<?php /* Smarty version 2.6.14, created on 2011-08-17 20:29:56
         compiled from category.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['category']['name'] != ""): ?>
<div class="categorytitle"><?php echo $this->_tpl_vars['category']['name']; ?>
</div>
<?php endif; ?>

<?php if (count ( $this->_tpl_vars['groups'] ) == 0): ?>
	<br /><br /><br /><br /><br /><br />
	<center><b>Материалы отсутствуют!</b></center>
<?php else: ?>
	<?php $_from = $this->_tpl_vars['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
		<table width="95%">
		  <tr>
		    <td valign="top"><a class="groupheader" href="group.php?id=<?php echo $this->_tpl_vars['group']['id']; ?>
&cid=<?php echo $this->_tpl_vars['category']['id']; ?>
"><?php echo $this->_tpl_vars['group']['name']; ?>
</a><br /><?php echo $this->_tpl_vars['group']['details']; ?>
</td>
		    <td valign="top" width="10%" style="padding: 5px;"><div style="width: 160px;"><img src="<?php echo $this->_tpl_vars['group']['image']; ?>
" border="0"></td>
		  </tr>
		  <tr>
		    <td colspan="2" height="1" width="100%" background="images/line.gif"></td>
		  </tr>
		</table>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>	
<br /><br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>