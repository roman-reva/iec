{include file="adm_header.tpl"}

{literal}
<script>
	function reflow() {
		document.forms['grouporder'].submit();
	} 
</script>
{/literal}

<span class="head2">Порядок материалов в проекте '{$project_name}'</span><br /><br />

{include file="messagebar.tpl" errors=$errors message=$message}

{if count($errors) == 0}
<form id="grouporder" action="?gid={$gid}" method="post">
<input type='hidden' value='sent' name='save' />

Выберите тип материалов: 

<select name="page_type" onchange='reflow()'>
	{foreach from=$page_types item=type} 
		<option value="{$type.id}" {if $type.id==$selected_page_type}selected{/if}>{$type.name}</option>
	{/foreach}
</select>
<br />

{if $selected_page_type!=''}
<br />
<table cellspacing="1" cellpadding="2" bgcolor="#D0D0D0">
	<tr>
		<th>Вес</th>
		<th>ID</th>
		<th>Заголовок материала (RU)</th>
		<th>Заголовок материала (EN)</th>
		<th>Тип материала</th>
	</tr>
	{if $nodata==true}
		<tr>
			<td class="tbl" colspan="3" height="40" align="center"><b>Нет данных!</b></td>
		</tr>
	{else}
		{foreach from=$data item=item}
		<tr>
			<td class="tbl">
				<select name="w_{$item.id}" onchange='reflow();'>
					{foreach from=$page_weights item=w_value}	
						<option value="{$w_value}" {if $item.weight==$w_value}selected{/if}>{$w_value}</option>
					{/foreach}
				</select>
			</td>
			<td class="tbl">{$item.page_id}</td>
			<td class="tbl">{$item.title_ru}</td>
			<td class="tbl">{$item.title_en}</td>
			<td class="tbl">{$item.page_type}</td>
		</tr>
		{/foreach}
	{/if}
</table>
{/if}
</form>

<input type="button" value="Назад" onclick="location.href='group_list.php'" />
{/if}


{include file="adm_footer.tpl"}