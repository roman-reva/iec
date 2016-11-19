{include file="adm_header.tpl"}

<span class="head2">Проекты</span><br /><br />

{include file="messagebar.tpl" errors=$errors message=$message}

<div style="padding-bottom: 5px;"><a href="group_edit.php">[ Добавить ]</a></div>

<table cellspacing="1" cellpadding="2" bgcolor="#D0D0D0">
	<tr>
		<th>ID</th>
		<th>Название проекта (RU)</th>
		<th>Название проекта (EN)</th>
		<!--  th>Вес</th -->
		<th width="60"></th>
	</tr>
	{if $nodata==true}
		<tr>
			<td class="tbl" colspan="4" height="40" align="center"><b>Нет данных!</b></td>
		</tr>
	{else}
		{foreach from=$data item=item}
		<tr>
			<td class="tbl">{$item.id}</td>
			<td class="tbl">{$item.name_ru}</td>
			<td class="tbl">{$item.name_en}</td>
			<!--td class="tbl">{$item.weight}</td-->
			<td class="tbl" align="center">
	      <a href="page_order.php?gid={$item.id}"><img src='../images/b_order.png' title="Порядок" border="0"></a>
	      <a href="group_edit.php?id={$item.id}"><img src='../images/b_edit.png' title="Править" border="0"></a>
	      <a href="?del={$item.id}" onclick="return confirm('Удалить?')"><img src='../images/b_del.png' title="Удалить" border="0"></a>
      </td>
		</tr>
		{/foreach}
	{/if}
</table>

<div style="padding-top: 5px;"><a href="group_edit.php">[ Добавить ]</a></div>

{include file="adm_footer.tpl"}