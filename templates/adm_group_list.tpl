{include file="adm_header.tpl"}

<span class="head2">�������</span><br /><br />

{include file="messagebar.tpl" errors=$errors message=$message}

<div style="padding-bottom: 5px;"><a href="group_edit.php">[ �������� ]</a></div>

<table cellspacing="1" cellpadding="2" bgcolor="#D0D0D0">
	<tr>
		<th>ID</th>
		<th>�������� �������</th>
		<!--  th>���</th -->
		<th width="60"></th>
	</tr>
	{if $nodata==true}
		<tr>
			<td class="tbl" colspan="4" height="40" align="center"><b>��� ������!</b></td>
		</tr>
	{else}
		{foreach from=$data item=item}
		<tr>
			<td class="tbl">{$item.id}</td>
			<td class="tbl">{$item.name}</td>
			<!--td class="tbl">{$item.weight}</td-->
			<td class="tbl" align="center">
	      <a href="page_order.php?gid={$item.id}"><img src='../images/b_order.png' title="�������" border="0"></a>
	      <a href="group_edit.php?id={$item.id}"><img src='../images/b_edit.png' title="�������" border="0"></a>
	      <a href="?del={$item.id}" onclick="return confirm('�������?')"><img src='../images/b_del.png' title="�������" border="0"></a>
      </td>
		</tr>
		{/foreach}
	{/if}
</table>

<div style="padding-top: 5px;"><a href="group_edit.php">[ �������� ]</a></div>

{include file="adm_footer.tpl"}