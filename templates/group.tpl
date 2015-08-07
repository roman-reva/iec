{include file="header.tpl"}

{include file="tabbar.tpl" tabs=$tabs selected_tab=$selected_tab gid=$group.id cid=$category.id}

{if count($pagelist)==0}
	<div style="padding: 10px;">
		{if $group.text!=""}
			{$group.text}
		{else}
			<br /><br /><br /><br /><br /><br /><br /><br />
			<center><b>Материалы отсутствуют!</b></center>
		{/if}
	</div>
{else}
	<div style="padding: 10px;">
		
		{foreach from=$pagelist item=page}
    	<table width="95%">
	      <tr>
	        <td valign="top" class="grouptext">
	          <a class="groupheader" href="viewpage.php?id={$page.id}&gid={$group.id}&cid={$category.id}">{$page.title}</a><br />
	          {if $page.details!=""}{$page.details}{else}<br />{/if}
            <!-- Тип материала: <span style="color:#{$page.color}">{$page.type}</span> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
            Обновлен: {$page.updated}<br /><br />
	        </td>
	      </tr>
	      <tr>
	        <td height="1" width="100%" background="images/line.gif"></td>
	      </tr>
	    </table>
    {/foreach}
		
	</div>
{/if}

{include file="footer.tpl"}
