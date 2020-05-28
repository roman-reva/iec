{include file="adm_header.tpl"}

<script type="text/javascript">
	var cat_ids = [];
	{assign var=numb value="0"}
	{foreach from=$cat_list key=cid item=it}
	cat_ids[{$numb}] = {$cid};
	{assign var=numb value=$numb+1}
	{/foreach}
	{literal}
	function gg(catid, grid) {
		var val = false;
		if (document.getElementById('box_' + catid + '_' + grid).checked) {
			val = true;
		}

		for (var i=0; i<cat_ids.length; i++) {
			var el = document.getElementById('box_' + cat_ids[i] + '_' + grid);
			if (el != null) {
				el.checked = val;
			}
		}
	}
	{/literal}
</script>


<span class="head2">{$page_title}</span><br /><br />

{include file="messagebar.tpl" errors=$errors message=$message}

Выберите, в каких проектах будет отображаться данный материал:<br /><br />

<form name="rel" action="?" method="POST">

	{foreach from=$cat_list item=it}
		<div class="groupbox">
			<span class="head3">{$it.name}</span><br />
			{foreach from=$it.groups item=gr}
				<div class="groupitem">
					<input name="groups[]" onclick="gg({$it.id}, {$gr.id})" id="box_{$it.id}_{$gr.id}" type="checkbox" value="{$gr.id}" {if $gr.checked}checked{/if}> {$gr.name} <br />
				</div>
			{/foreach}
		</div>
	{/foreach}



	<div class="buttons">
		<input name="id" type="hidden" value="{$id}">
		<input type="submit" name="sent" value="Сохранить">
		<input type="button" onclick='location.href="page_list.php"' value="Назад">
	</div>
</form>



{include file="adm_footer.tpl"}