{include file="header.tpl"}

{if $page.title!=""}
	{if $page.type!="infopage"}
		{if $lang eq 'ru'}Тип материала{else}Data type{/if}: <span style="color:#{$page.color}">{$page.type}</span><br />
		{if $lang eq 'ru'}Обновлен{else}Updated{/if}: {$page.updated}<br /><br />
	{/if}
	<div class="pagetitle">{$page.title}</div>
{/if}

{$page.text}<br />

{if $page.file!=""}
	<table width="100%" align="center" cellspacing="0" cellpadding="0">
		<tr><td width="100%" height="1" background="images/line.gif"></td></tr>
	</table><br />
	<b>{if $lang eq 'ru'}Скачать приклепленный файл{else}Download attached file{/if}:</b> <a href="{$page.file}">{$page.filename}</a> ({$page.filesize}  б)<br /><br />
{/if}

{include file="footer.tpl"}