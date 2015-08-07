<?php /* Smarty version 2.6.14, created on 2011-08-17 20:29:59
         compiled from group.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "tabbar.tpl", 'smarty_include_vars' => array('tabs' => $this->_tpl_vars['tabs'],'selected_tab' => $this->_tpl_vars['selected_tab'],'gid' => $this->_tpl_vars['group']['id'],'cid' => $this->_tpl_vars['category']['id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if (count ( $this->_tpl_vars['pagelist'] ) == 0): ?>
	<div style="padding: 10px;">
		<?php if ($this->_tpl_vars['group']['text'] != ""): ?>
			<?php echo $this->_tpl_vars['group']['text']; ?>

		<?php else: ?>
			<br /><br /><br /><br /><br /><br /><br /><br />
			<center><b>Материалы отсутствуют!</b></center>
		<?php endif; ?>
	</div>
<?php else: ?>
	<div style="padding: 10px;">
		
		<?php $_from = $this->_tpl_vars['pagelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
    	<table width="95%">
	      <tr>
	        <td valign="top" class="grouptext">
	          <a class="groupheader" href="viewpage.php?id=<?php echo $this->_tpl_vars['page']['id']; ?>
&gid=<?php echo $this->_tpl_vars['group']['id']; ?>
&cid=<?php echo $this->_tpl_vars['category']['id']; ?>
"><?php echo $this->_tpl_vars['page']['title']; ?>
</a><br />
	          <?php if ($this->_tpl_vars['page']['details'] != ""):  echo $this->_tpl_vars['page']['details'];  else: ?><br /><?php endif; ?>
            <!-- Тип материала: <span style="color:#<?php echo $this->_tpl_vars['page']['color']; ?>
"><?php echo $this->_tpl_vars['page']['type']; ?>
</span> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
            Обновлен: <?php echo $this->_tpl_vars['page']['updated']; ?>
<br /><br />
	        </td>
	      </tr>
	      <tr>
	        <td height="1" width="100%" background="images/line.gif"></td>
	      </tr>
	    </table>
    <?php endforeach; endif; unset($_from); ?>
		
	</div>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>