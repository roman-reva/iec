{include file="adm_header.tpl"}

<span class="head2">��������</span><br /><br />

{include file="messagebar.tpl" errors=$errors message=$message}

<div style="padding-bottom: 5px;"><a href="infopage_edit.php">[ �������� ]</a></div>

<table cellspacing="1" cellpadding="2" bgcolor="#D0D0D0">
	<tr>
		<th>ID</th>
		<th>��������� �������� (RU)</th>
		<th>��������� � ���� (RU)</th>
		<th>��������� �������� (EN)</th>
		<th>��������� � ���� (EN)</th>
		<th>��� � ����</th>
		<th width="30"></th>
	</tr>
	{if count($data)==0}
		<tr>
			<td class="tbl" colspan="5" height="40" align="center"><b>��� ������!</b></td>
		</tr>
	{else}
		{foreach from=$data item=item}
		<tr>
			<td class="tbl">{$item.id}</td>
			<td class="tbl">{if $item.title_ru!=""}{$item.title_ru}{else}<i>��� ���������</i>{/if}</td>
			<td class="tbl">{$item.menutitle_ru}</td>
			<td class="tbl">{if $item.title_en!=""}{$item.title_en}{else}<i>��� ���������</i>{/if}</td>
			<td class="tbl">{$item.menutitle_en}</td>
			<td class="tbl">{$item.weight}</td>
			<td class="tbl" align="center">
	      <a href="infopage_edit.php?id={$item.id}"><img src='../images/b_edit.png' title="�������" border="0"></a>
	      <a href="?del={$item.id}" onclick="return confirm('�������?')"><img src='../images/b_del.png' title="�������" border="0"></a>
      </td>
		</tr>
		{/foreach}
	{/if}
</table>

<div style="padding-top: 5px;"><a href="infopage_edit.php">[ �������� ]</a></div>

{include file="adm_footer.tpl"}