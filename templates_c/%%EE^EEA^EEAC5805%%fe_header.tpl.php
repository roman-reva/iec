<?php /* Smarty version 2.6.14, created on 2010-09-10 13:59:40
         compiled from fe_header.tpl */ ?>
<html>
<head>
	<title>Лаборатория Интеллектуальных Электронных Систем - официальный сайт</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=cp1251" />
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" background="images/bg.jpg">
	<table width="100%" height="100%" cellspacing="0" cellpadding="0">
		<tr>
			<td width="63" height="367" background="images/bgtop.jpg" style="background-repeat: no-repeat;"></td>
			<td width="3" bgcolor="#656565"></td>
			<td bgcolor="#656565">
				<table width="100%" height="100%" cellspacing="0" cellpadding="0">
					<tr>
						<td width="100%" height="29" background="images/headtopgrad.gif"></td>
					</tr>
					<tr>
						<td width="100%" height="1"></td>
					</tr>
					<tr>
						<td width="100%" height="90" bgcolor="3D68C1" background="images/header_grad.gif"><img src="images/header.jpg" border="0" alt="IEC" title="IEC"></td>
					</tr>
					<tr>
						<td width="100%" height="25" background="images/headbotgrad.gif"></td>
					</tr>
					<tr>
						<td width="100%" height="1"></td>
					</tr>
					<tr>
						<td width="100%">
							<table width="100%" height="100%" cellspacing="0" cellpadding="0">
								<tr>
									<td width="220" valign="top" bgcolor="#F7F7F7">
										<?php $_from = $this->_tpl_vars['topmenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['it']):
?>
											<div class="menubutton">
												<a href="?ip_id=<?php echo $this->_tpl_vars['it']['id']; ?>
&clear_menu" class="menulink"><?php echo $this->_tpl_vars['it']['menutitle']; ?>
</a>
											</div>
										<?php endforeach; endif; unset($_from); ?>
										<?php $_from = $this->_tpl_vars['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
											<div class="menubutton">
												<a href="?c_id=<?php echo $this->_tpl_vars['item']['id']; ?>
" class="menulink"><?php echo $this->_tpl_vars['item']['name']; ?>
</a>
											</div>
											<?php if ($this->_tpl_vars['selected_category'] == $this->_tpl_vars['item']['id']): ?>
												<div class="submenu">
													<?php $_from = $this->_tpl_vars['item']['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
														<a class="submenulink<?php if ($this->_tpl_vars['group']['id'] == $this->_tpl_vars['selected_group']): ?>_sel<?php endif; ?>" href="?c_id=<?php echo $this->_tpl_vars['selected_category']; ?>
&g_id=<?php echo $this->_tpl_vars['group']['id']; ?>
"><?php echo $this->_tpl_vars['group']['name']; ?>
</a><br />
													<?php endforeach; endif; unset($_from); ?>
												</div>
											<?php else: ?>
												<div class="menu_spacers"></div>
											<?php endif; ?>
										<?php endforeach; endif; unset($_from); ?>
										<?php $_from = $this->_tpl_vars['bottommenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['it']):
?>
											<div class="menubutton">
												<a href="?ip_id=<?php echo $this->_tpl_vars['it']['id']; ?>
&clear_menu" class="menulink"><?php echo $this->_tpl_vars['it']['menutitle']; ?>
</a>
											</div>
										<?php endforeach; endif; unset($_from); ?>
										<div class="undermenu"></div>

									</td>
									<td width="2" bgcolor="#D8D8D8"></td>

                  <?php if ($this->_tpl_vars['show_tabs']): ?>
										<td bgcolor="#FFFFFF" style="padding:0px;" valign="top">
                    <table width="100%" cellspacing="0" cellpadding="0">
                    	<tr><td bgcolor="#C0C0C0" height="10" width="100%" background="images/tabbggrad_top.gif"></td></tr>
                      <tr><td bgcolor="#C0C0C0" height="20" width="100%" background="images/tabbggrad.gif">
	                      <div style="float:left;width:20px;height:20px;"></div>
                        <div class="tab">
                       	 <table cellspacing="0" cellpadding="0">
	                          <tr>
	                            <td rowspan="2" height="20" width="1" bgcolor="#808080"></td>
	                            <td height="1" bgcolor="#808080"></td>
	                            <td rowspan="2" height="20" width="6" background="images/tabrightborder<?php if ($this->_tpl_vars['selected_tab'] != 0): ?>_g<?php endif; ?>.gif"></td>
	                          </tr>
	                          <tr>
	                            <td height="19" bgcolor="#<?php if ($this->_tpl_vars['selected_tab'] == 0): ?>FFFFFF<?php else: ?>D8D8D8<?php endif; ?>" class="tabtext">
                              	<a href='?t_id=0' style="text-decoration:none; color:#0000DD">Общая информация</a>
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
	                            <td rowspan="2" height="20" width="6" background="images/tabrightborder<?php if ($this->_tpl_vars['selected_tab'] != $this->_tpl_vars['tab']['id']): ?>_g<?php endif; ?>.gif"></td>
	                          </tr>
	                          <tr>
	                            <td height="19" bgcolor="#<?php if ($this->_tpl_vars['selected_tab'] == $this->_tpl_vars['tab']['id']): ?>FFFFFF<?php else: ?>D8D8D8<?php endif; ?>" class="tabtext">
                              	<a href='?t_id=<?php echo $this->_tpl_vars['tab']['id']; ?>
' style="text-decoration:none; color:#<?php echo $this->_tpl_vars['tab']['color']; ?>
"><?php echo $this->_tpl_vars['tab']['name']; ?>
</a>
                              </td>
	                          </tr>
	                        </table>
                        </div>
                        <?php endforeach; endif; unset($_from); ?>


                      </td></tr>
                    </table>
                    <div style="padding:20px;">
                  <?php else: ?>
										<td bgcolor="#FFFFFF" style="padding:20px;" valign="top">
                  <?php endif; ?>