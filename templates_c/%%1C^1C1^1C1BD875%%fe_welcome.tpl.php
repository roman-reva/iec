<?php /* Smarty version 2.6.14, created on 2010-09-01 15:31:11
         compiled from fe_welcome.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "fe_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if (count ( $this->_tpl_vars['groups'] ) > 0): ?>
  <div class="header0"><?php echo $this->_tpl_vars['selected_category_name']; ?>
</div> <br />
	<?php $_from = $this->_tpl_vars['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
	<table width="95%">
	  <tr>
	    <td valign="top" width="10%" style="padding: 5px;"><div style="width: 160px;"><img src="<?php echo $this->_tpl_vars['group']['image']; ?>
" border="0"></td>
	    <td valign="top" class="grouptext"><a class="group_header" href="?c_id=<?php echo $this->_tpl_vars['selected_category']; ?>
&g_id=<?php echo $this->_tpl_vars['group']['id']; ?>
"><?php echo $this->_tpl_vars['group']['name']; ?>
</a><br /><br /><?php echo $this->_tpl_vars['group']['details']; ?>
</td>
	  </tr>
	  <tr>
	    <td colspan="2" height="1" width="100%" background="images/line.gif"></td>
	  </td>
	</table>
	<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
	<?php if (count ( $this->_tpl_vars['pages'] ) > 0): ?>
  	<?php $_from = $this->_tpl_vars['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
    	<table width="95%">
	      <tr>
	        <td valign="top" class="grouptext">
	          <a class="group_header" href="?p_id=<?php echo $this->_tpl_vars['page']['id']; ?>
"><?php echo $this->_tpl_vars['page']['title']; ?>
</a><br />
	          <?php echo $this->_tpl_vars['page']['details']; ?>

            Тип материала: <span style="color:#<?php echo $this->_tpl_vars['page']['color']; ?>
"><?php echo $this->_tpl_vars['page']['type']; ?>
</span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Обновлен: <?php echo $this->_tpl_vars['page']['updated']; ?>
<br /><br />
	        </td>
	      </tr>
	      <tr>
	        <td height="1" width="100%" background="images/line.gif"></td>
	      </td>
	    </table>
    <?php endforeach; endif; unset($_from); ?>
  <?php else: ?>
  	<?php if ($this->_tpl_vars['page']['id']): ?>
    	<div class="grouptext">
      		<?php if ($this->_tpl_vars['page']['title'] != ""): ?>
	    		<?php if ($this->_tpl_vars['page']['type'] != 'infopage'): ?>
					Тип материала: <span style="color:#<?php echo $this->_tpl_vars['page']['color']; ?>
"><?php echo $this->_tpl_vars['page']['type']; ?>
</span><br />
	      			Обновлен: <?php echo $this->_tpl_vars['page']['updated']; ?>
<br /><br />
	      		<?php endif; ?>
    			<span class="header"><?php echo $this->_tpl_vars['page']['title']; ?>
</span><br />
    		<?php endif; ?>
      		<?php echo $this->_tpl_vars['page']['text']; ?>

      		<br />
      		<br />
      		
      		<?php if ($this->_tpl_vars['page']['file'] != ""): ?>
      			<table width="100%" align="center" cellspacing="0" cellpadding="0">
      				<tr><td width="100%" height="1" background="images/line.gif"></td></tr>
      			</table><br />
      			<b>Скачать приклепленный файл:</b> <a href="<?php echo $this->_tpl_vars['page']['file']; ?>
"><?php echo $this->_tpl_vars['page']['filename']; ?>
</a> (<?php echo $this->_tpl_vars['page']['filesize']; ?>
 Кб)<br /><br />
      		<?php endif; ?>
      	</div>
    <?php else: ?>
    	<br /><br />
	    <div align="center" style="color:#808080;"><b>Материалы отстуствуют!</b></div>
    <?php endif; ?>
  <?php endif; ?>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "fe_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>