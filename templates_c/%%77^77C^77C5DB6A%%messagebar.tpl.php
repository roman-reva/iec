<?php /* Smarty version 2.6.14, created on 2011-08-17 20:31:26
         compiled from messagebar.tpl */ ?>
<?php if ($this->_tpl_vars['message'] != ""): ?>
	<li class="message"><?php echo $this->_tpl_vars['message']; ?>
</li> <br />
<?php endif; ?>

<?php if (count ( $this->_tpl_vars['errors'] ) > 0): ?>
  <?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
  	<li class="error"> <?php echo $this->_tpl_vars['error']; ?>
</li>
  <?php endforeach; endif; unset($_from); ?><br />
<?php endif; ?>