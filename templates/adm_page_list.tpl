{include file="adm_header.tpl"}

<span class="head2">Материалы</span><br /><br />

{include file="messagebar.tpl" errors=$errors message=$message}

<form name="filter" action="?" method="post">
	<table cellspacing="1" cellpadding="2" bgcolor="#D0D0D0">
		<tr>
			<th colspan="4">Фильтр поиска</th>
		</tr>
		<tr>
			<td bgcolor="#F8F8F8" align="right">Проект: </td>
			<td bgcolor="#F8F8F8">
				<select name="f_proj">
					{foreach from=$projects item=proj}
						<option value="{$proj.id}" {if $proj.id==$selected_project}selected{/if}>{$proj.name}</option>
					{/foreach}
				</select>
			</td>
			<td bgcolor="#F8F8F8" align="right">Тип: </td>
			<td bgcolor="#F8F8F8">
				<select name="f_type">
					{foreach from=$page_types item=type}
						<option value="{$type.id}" {if $type.id==$selected_page_type}selected{/if}>{$type.name}</option>
					{/foreach}
				</select>
			</td>
		</tr>
		<tr>
			<td bgcolor="#F8F8F8" align="right">Заголовок: </td>
			<td bgcolor="#F8F8F8" colspan="3"><input type="text" class="short" name="f_name" value="{$selected_page_name}" /></td>
		</tr>
		<tr>
			<td colspan="4" align="right" bgcolor="#F8F8F8">
				<input type="submit" value="Поиск" name="search_button" />
				<input type="submit" value="Очистить" name="clear_button" />
			</td>
		</tr>
	</table><br />
</form>

<div style="padding-bottom: 5px;"><a href="page_edit.php">[ Добавить ]</a></div>

<table cellspacing="1" cellpadding="2" bgcolor="#D0D0D0">
	<tr>
		<th>ID</th>
		<th>Заголовок материала (RU)</th>
		<th>Заголовок материала (EN)</th>
		<th>Тип материала</th>
		<th width="60"></th>
	</tr>
	{if $nodata==true}
		<tr>
			<td class="tbl" colspan="4" height="40" align="center"><b>Нет данных!</b></td>
		</tr>
	{else}
		{if count($undef_data)>0}
			{foreach from=$undef_data item=item}
				<tr>
					<td class="tbl">{$item.id}</td>
					<td class="tbl">
						<img src="/images/attention.png" width="13" height="13" title="Данный материал не привязан ни к одному проекту" />
						{$item.title_ru}
					</td>
					<td class="tbl">
						<img src="/images/attention.png" width="13" height="13" title="Данный материал не привязан ни к одному проекту" />
						{$item.title_en}
					</td>
					<td class="tbl">{$item.page_type}</td>
					<td class="tbl" align="center">
						<a href="page_rel.php?id={$item.id}"><img src='../images/b_rel.png' title="Связи" border="0"></a>
						<a href="page_edit.php?id={$item.id}"><img src='../images/b_edit.png' title="Править" border="0"></a>
						<a href="?del={$item.id}" onclick="return confirm('Удалить?')"><img src='../images/b_del.png' title="Удалить" border="0"></a>
					</td>
				</tr>
			{/foreach}
		{/if}

		{if count($data)>0 && count($undef_data) > 0}
			<tr>
				<td colspan="4" class="tbl_delimeter" align="center"></td>
			</tr>
		{/if}
		{foreach from=$data item=item}
			<tr>
				<td class="tbl">{$item.id}</td>
				<td class="tbl">{$item.title_ru}</td>
				<td class="tbl">{$item.title_en}</td>
				<td class="tbl">{$item.page_type}</td>
				<td class="tbl" align="center">
					<a href="page_rel.php?id={$item.id}"><img src='../images/b_rel.png' title="Связи" border="0"></a>
					<a href="page_edit.php?id={$item.id}"><img src='../images/b_edit.png' title="Править" border="0"></a>
					<a href="?del={$item.id}" onclick="return confirm('Удалить?')"><img src='../images/b_del.png' title="Удалить" border="0"></a>
				</td>
			</tr>
		{/foreach}
	{/if}
</table>

<div style="padding-top: 5px;"><a href="page_edit.php">[ Добавить ]</a></div>

{include file="adm_footer.tpl"}