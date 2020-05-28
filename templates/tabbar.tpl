<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td bgcolor="#C0C0C0" height="10" width="100%"
			background="images/tabbggrad_top.gif"></td>
	</tr>
	<tr>
		<td bgcolor="#C0C0C0" height="20" width="100%"
			background="images/tabbggrad.gif">
			<div style="float: left; width: 20px; height: 20px;"></div>
			<div class="tab">
				<table cellspacing="0" cellpadding="0">
					<tr>
						<td rowspan="2" height="20" width="1" bgcolor="#808080"></td>
						<td height="1" bgcolor="#808080"></td>
						<td rowspan="2" height="20" width="6"
							background="images/tabrightborder{if $selected_tab!=0}_g{/if}.gif"></td>
					</tr>
					<tr>
						<td height="19"
							bgcolor="#{if $selected_tab==0}FFFFFF{else}D8D8D8{/if}"
							class="tabtext"><a href='?id={$gid}&cid={$cid}&tid=0'
											   style="text-decoration: none; color: #0000DD">{if $lang eq 'ru'}Общая информация{else}General info{/if}</a>
						</td>
					</tr>
				</table>
			</div>

			{foreach from=$tabs item=tab}
				<div class="tab">
					<table cellspacing="0" cellpadding="0">
						<tr>
							<td rowspan="2" height="20" width="1" bgcolor="#808080"></td>
							<td height="1" bgcolor="#808080"></td>
							<td rowspan="2" height="20" width="6"
								background="images/tabrightborder{if $selected_tab!=$tab.id}_g{/if}.gif"></td>
						</tr>
						<tr>
							{if $tab.disabled == true}
								<td height="19"
									bgcolor="#{if $selected_tab==$tab.id}FFFFFF{else}D8D8D8{/if}"
									class="tabtext">{$tab.name}
								</td>
							{else}
								<td height="19"
									bgcolor="#{if $selected_tab==$tab.id}FFFFFF{else}D8D8D8{/if}"
									class="tabtext"><a href='?id={$gid}&cid={$cid}&tid={$tab.id}'
													   style="text-decoration: none; color: #0000dd">{$tab.name}</a>
								</td>
							{/if}
						</tr>
					</table>
				</div>
			{/foreach}</td>
	</tr>
</table>