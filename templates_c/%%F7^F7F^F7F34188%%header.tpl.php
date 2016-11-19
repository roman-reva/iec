<?php /* Smarty version 2.6.14, created on 2016-11-19 18:02:54
         compiled from header.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=cp1251">
		<title>IEC - Лаборатория Интеллектуальных Электронных Систем</title>
		<link rel="stylesheet" type="text/css" href="styles/styles.css" />
		<script src="analitic.js" type="text/javascript"></script>
		 </head>
	<body>
		<div class="content">
			<div class="headtopgrad">
                <div class="lang_switcher">
                    <form action="/lang.php" method="POST">
                        <button type="submit" name="ru" value="Русский">
                            <img src="images/ru.png" alt="Русский"/>
                        </button>
                        <button type="submit" name="en" value="English">
                            <img src="images/en.png" alt="English"/>
                        </button>
                    </form>
                </div>
            </div>
			<div class="header"><img src="images/header.jpg" border="0" /></div>
			<div class="headbotgrad"></div>
			<div class="greyline"></div>
			<table class="main" cellspacing="0" cellpadding="0">
				<tr>
					<td class="menu" height="100">
						<?php $_from = $this->_tpl_vars['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['it']):
?>
							<?php if ($this->_tpl_vars['it']['type'] == 'infopage'): ?>
							<div class="menuitem">
								<a class="menulink" href="index.php?id=<?php echo $this->_tpl_vars['it']['id']; ?>
"><?php echo $this->_tpl_vars['it']['name']; ?>
</a>
							</div>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['it']['type'] == 'category'): ?>
								<?php if ($this->_tpl_vars['it']['id'] == $this->_tpl_vars['category']['id']): ?>
								<div class="menuitem">
									<a class="menulink_sel" href="category.php?id=<?php echo $this->_tpl_vars['it']['id']; ?>
"><?php echo $this->_tpl_vars['it']['menuname']; ?>
</a>
								</div>
								<div class="openmenuitem">
									<?php $_from = $this->_tpl_vars['it']['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gr']):
?>
										<a href="group.php?id=<?php echo $this->_tpl_vars['gr']['id']; ?>
&cid=<?php echo $this->_tpl_vars['category']['id']; ?>
" class="submenulink<?php if ($this->_tpl_vars['gr']['id'] == $this->_tpl_vars['group']['id']): ?>_sel<?php endif; ?>"><?php echo $this->_tpl_vars['gr']['name']; ?>
</a><br />
									<?php endforeach; endif; unset($_from); ?>
								</div>
								<?php else: ?>
								<div class="menuitem">
									<a class="menulink" href="category.php?id=<?php echo $this->_tpl_vars['it']['id']; ?>
"><?php echo $this->_tpl_vars['it']['menuname']; ?>
</a>
								</div>
								<?php endif; ?>
							<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
						<div class="undermenubg"></div>
					</td>
					<td width="2" bgcolor="#C0C0C0"></td>
					<td <?php if ($this->_tpl_vars['page']['background'] != ""): ?>background="../<?php echo $this->_tpl_vars['page']['background']; ?>
"<?php endif; ?> class="<?php if (count ( $this->_tpl_vars['tabs'] ) > 0): ?>tabs<?php endif; ?>text">