<?php /* Smarty version 2.6.14, created on 2011-08-17 20:49:23
         compiled from tabbar.tpl */ ?>
<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td bgcolor="#C0C0C0" height="10" width="100%"
			background="images/tabbggrad_top.gif"></td>
	</tr>
	<tr>
		<td bgcolor="#C0C0C0" height="20" width="100%"
			background="images/tabbggrad.gif">
		<div style="float: left; width: 20px; height: 20px;"></div>
		<div class="tab">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<td rowspan="2" height="20" width="1" bgcolor="#808080"></td>
				<td height="1" bgcolor="#808080"></td>
				<td rowspan="2" height="20" width="6"
					background="images/tabrightborder<?php if ($this->_tpl_vars['selected_tab'] != 0): ?>_g<?php endif; ?>.gif"></td>
			</tr>
			<tr>
				<td height="19"
					bgcolor="#<?php if ($this->_tpl_vars['selected_tab'] == 0): ?>FFFFFF<?php else: ?>D8D8D8<?php endif; ?>"
					class="tabtext"><a href='?id=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&tid=0'
					style="text-decoration: none; color: #0000DD">Общая информация</a>
				</td>
			</tr>
		</table>
		</div>

		<?php $_from = $this->_tpl_vars['tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tab']):
?>
		<div class="tab">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<td rowspan="2" height="20" width="1" bgcolor="#808080"></td>
				<td height="1" bgcolor="#808080"></td>
				<td rowspan="2" height="20" width="6"
					background="images/tabrightborder<?php if ($this->_tpl_vars['selected_tab'] != $this->_tpl_vars['tab']['id']): ?>_g<?php endif; ?>.gif"></td>
			</tr>
			<tr>	
				<?php if ($this->_tpl_vars['tab']['disabled'] == true): ?>
				<td height="19"
					bgcolor="#<?php if ($this->_tpl_vars['selected_tab'] == $this->_tpl_vars['tab']['id']): ?>FFFFFF<?php else: ?>D8D8D8<?php endif; ?>"
					class="tabtext"><?php echo $this->_tpl_vars['tab']['name']; ?>

				</td>
				<?php else: ?>
				<td height="19"
					bgcolor="#<?php if ($this->_tpl_vars['selected_tab'] == $this->_tpl_vars['tab']['id']): ?>FFFFFF<?php else: ?>D8D8D8<?php endif; ?>"
					class="tabtext"><a href='?id=<?php echo $this->_tpl_vars['gid']; ?>
&cid=<?php echo $this->_tpl_vars['cid']; ?>
&tid=<?php echo $this->_tpl_vars['tab']['id']; ?>
'
					style="text-decoration: none; color: #0000dd"><?php echo $this->_tpl_vars['tab']['name']; ?>
</a>
				</td>
				<?php endif; ?>
			</tr>
		</table>
		</div>
		<?php endforeach; endif; unset($_from); ?></td>
	</tr>
</table>