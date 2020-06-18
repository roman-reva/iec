{include file="adm_header.tpl"}

<span class="head2">Настройки</span><br /><br />

{include file="messagebar.tpl" errors=$errors message=$message}



<br />







<table cellspacing="1" cellpadding="2" bgcolor="#D0D0D0">
	{if $nodata==true}
		<tr>
			<td class="tbl" colspan="4" height="40" align="center"><b>Нет данных!</b></td>
		</tr>
	{else}
		<form name="edit" action="?" method="POST" enctype="multipart/form-data">

			<div>
				{if $data.value_ru==""}
					<input type="file" name="header[ru]" class="short" value="{$data.value_ru}">
				{else}
					<img src="../{$data.value_ru}?{$time}" border="0" style="max-height: 200px; max-width: 100%; "><br />
				{/if}
				<div class="head3">Картинка проекта (RU)</div><br />
			</div>

			<div style="margin-top: 20px;">
				{if $data.value_en==""}
					<input type="file" name="header[en]" class="short" value="{$data.value_en}">
				{else}
					<img src="../{$data.value_en}?{$time}" border="0" style="max-height: 200px; max-width: 100%; "><br />
				{/if}
				<div class="head3">Картинка проекта (EN)</div><br />
			</div>

			<div style="margin-top: 20px;">
				<input name="id" type="hidden" value="{$data.id}">
			{if $data.value_en !==""}
				<input type="submit" name="delimage" onclick="return confirm('Вы действительно хотите удалить изображения?')" value="Удалить изображения">
			{else}
				<input type="submit" name="sent" value="Сохранить">
			{/if}
			</div>

		</form>

		<br /><br />
	{/if}
</table>

{include file="adm_footer.tpl"}