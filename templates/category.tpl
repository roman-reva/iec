{include file="header.tpl"}

{if $category.name!=""}
<div class="categorytitle">{$category.name}</div>
{/if}

{if count($groups)==0}
	<br /><br /><br /><br /><br /><br />
	<center><b>Материалы отсутствуют!</b></center>
{else}
	{foreach from=$groups item=group}
		<table width="95%">
		  <tr>
		    <td valign="top"><a class="groupheader" href="group.php?id={$group.id}&cid={$category.id}">{$group.name}</a><br />{$group.details}</td>
		    <td valign="top" width="10%" style="padding: 5px;"><div style="width: 160px;"><img src="{$group.image}" border="0"></td>
		  </tr>
		  <tr>
		    <td colspan="2" height="1" width="100%" background="images/line.gif"></td>
		  </tr>
		</table>
	{/foreach}
{/if}	
<br /><br />
{include file="footer.tpl"}