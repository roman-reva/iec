{include file="header.tpl"}

{if $page.title!=""}
	{if $page.type!="infopage"}
		��� ���������: <span style="color:#{$page.color}">{$page.type}</span><br />
      	��������: {$page.updated}<br /><br />
	{/if}
   <div class="pagetitle">{$page.title}</div>
{/if}

{$page.text}<br />

{if $page.file!=""}
	<table width="100%" align="center" cellspacing="0" cellpadding="0">
    	<tr><td width="100%" height="1" background="images/line.gif"></td></tr>
    </table><br />
    <b>������� ������������� ����:</b> <a href="{$page.file}">{$page.filename}</a> ({$page.filesize} ��)<br /><br />
{/if}

{include file="footer.tpl"}