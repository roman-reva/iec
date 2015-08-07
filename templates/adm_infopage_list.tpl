{include file="adm_header.tpl"}

<span class="head2">Страницы</span><br /><br />

{include file="messagebar.tpl" errors=$errors message=$message}

<div style="padding-bottom: 5px;"><a href="infopage_edit.php">[ Добавить ]</a></div>

<table cellspacing="1" cellpadding="2" bgcolor="#D0D0D0">
	<tr>
		<th>ID</th>
		<th>Заголовок страницы</th>
		<th>Заголовок в меню</th>
		<th>Вес в меню</th>
		<th width="30"></th>
	</tr>
	{if count($data)==0}
		<tr>
			<td class="tbl" colspan="5" height="40" align="center"><b>Нет данных!</b></td>
		</tr>
	{else}
		{foreach from=$data item=item}
		<tr>
			<td class="tbl">{$item.id}</td>
			<td class="tbl">{if $item.title!=""}{$item.title}{else}<i>Нет заголовка</i>{/if}</td>
			<td class="tbl">{$item.menutitle}</td>
			<td class="tbl">{$item.weight}</td>
			<td class="tbl" align="center">
	      <a href="infopage_edit.php?id={$item.id}"><img src='../images/b_edit.png' title="Править" border="0"></a>
	      <a href="?del={$item.id}" onclick="return confirm('Удалить?')"><img src='../images/b_del.png' title="Удалить" border="0"></a>
      </td>
		</tr>
		{/foreach}
	{/if}
</table>

<div style="padding-top: 5px;"><a href="infopage_edit.php">[ Добавить ]</a></div>

{include file="adm_footer.tpl"}