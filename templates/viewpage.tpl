{include file="header.tpl"}

{if $page.title!=""}
	{if $page.type!="infopage"}
		Тип материала: <span style="color:#{$page.color}">{$page.type}</span><br />
      	Обновлен: {$page.updated}<br /><br />
	{/if}
   <div class="pagetitle">{$page.title}</div>
{/if}

{$page.text}<br />

{if $page.file!=""}
	<table width="100%" align="center" cellspacing="0" cellpadding="0">
    	<tr><td width="100%" height="1" background="images/line.gif"></td></tr>
    </table><br />
    <b>Скачать приклепленный файл:</b> <a href="{$page.file}">{$page.filename}</a> ({$page.filesize} Кб)<br /><br />
{/if}

{include file="footer.tpl"}