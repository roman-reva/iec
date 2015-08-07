{include file="adm_header.tpl"}

{literal}
<script type="text/javascript">
function markSelect(id) {
	var boxId = "box_" + id;
	var selId = "weight_" + id;
	if (document.getElementById(boxId).checked) {
		document.getElementById(selId).style.visibility = "visible";
	} else {
		document.getElementById(selId).style.visibility = "hidden";
	}	
}
</script>
{/literal}

<span class="head2">{$page_title}</span><br /><br />

{include file="messagebar.tpl" errors=$errors message=$message}


<form name="rel" action="?id={$data.id}" method="POST">

	
	<span class="head3">Добавить проект:</span><br />
	<select name="newprojid" value="{$data.name}">
  	{foreach from=$fullgrouplist item=it}
   	  <option value='{$it.id}'>{$it.name}</option>
    {/foreach}
 	</select> <input type="submit" name="add" value="Добавить"><br /><br />

 	<span class="head3">Привязанные проекты:</span><br />
 	<table cellspacing="1" cellpadding="1" bgcolor="#D0D0D0">
		<tr>
			<th>Название проекта</th>
			<th>Вес</th>
			<th></th>
		</tr>
		{if count($grouplist)==0}
		<tr>
			<td class="tbl" colspan="3" height="40" align="center">Нет проектов!</td>
		</tr>
		{else}
			{foreach from=$grouplist item=item}
			<tr>
				<td class="tbl">{$item.name}</td>
				<td class="tbl">
				<select name="weight_{$item.id}">
			  		{foreach from=$weights item=it}
			   	  	<option value='{$it}'{if $item.weight==$it} selected{/if}>{$it}</option>
			    	{/foreach}
			 	</select>
				</td>
				<td class="tbl">
		     		<a href="?delproj={$item.id}&id={$data.id}" onclick="return confirm('Удалить?')"><img src='../images/b_del.png' title="Удалить" border="0"></a>
	      		</td>
			</tr>
			{/foreach}
		{/if}
	</table><br /> 
	
	
	<input type="submit" name="save" value="Сохранить">
 	<input type="button" onclick='location.href="category_list.php"' value="Назад"><br /><br />


</form>



{include file="adm_footer.tpl"}