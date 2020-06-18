<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
	<div class="header">
		<img src="images/header_{$lang}.jpg" border="0" onerror="this.style.display='none'" style="max-width: 100%; max-height: 90px;"/>
	</div>
	<div class="headbotgrad"></div>
	<div class="greyline"></div>
	<table class="main" cellspacing="0" cellpadding="0">
		<tr>
			<td class="menu" height="100">
				{foreach from=$menu item=it}
					{if $it.type=='infopage'}
						<div class="menuitem">
							<a class="menulink" href="index.php?id={$it.id}">{$it.name}</a>
						</div>
					{/if}
					{if $it.type=='category'}
						{if $it.id==$category.id}
							<div class="menuitem">
								<a class="menulink_sel" href="category.php?id={$it.id}">{$it.menuname}</a>
							</div>
							<div class="openmenuitem">
								{foreach from=$it.groups item=gr}
									<a href="group.php?id={$gr.id}&cid={$category.id}" class="submenulink{if $gr.id==$group.id}_sel{/if}">{$gr.name}</a><br />
								{/foreach}
							</div>
						{else}
							<div class="menuitem">
								<a class="menulink" href="category.php?id={$it.id}">{$it.menuname}</a>
							</div>
						{/if}
					{/if}
				{/foreach}
				<div class="undermenubg"></div>
			</td>
			<td width="2" bgcolor="#C0C0C0"></td>
			<td {if $page.background!=""}background="../{$page.background}"{/if} class="{if count($tabs)>0}tabs{/if}text">