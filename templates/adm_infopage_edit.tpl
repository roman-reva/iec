{include file="adm_header.tpl"}

{literal}

<!-- TinyMCE -->
<script type="text/javascript" src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,images,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,undo,redo,|,link,unlink,anchor,images,cleanup,help,code,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,fullscreen",

		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "tinymce/lists/template_list.js",
		external_link_list_url : "tinymce/lists/link_list.js",
		external_image_list_url : "tinymce/lists/image_list.js",
		media_external_list_url : "tinymce/lists/media_list.js",
	});
</script>
<!-- /TinyMCE -->

{/literal}

<span class="head2">{$page_title}</span><br /><br />

{include file="messagebar.tpl" errors=$errors message=$message}

<form name="edit" action="?" method="POST"  enctype="multipart/form-data">
	<span class="head3">��������� ��������</span><br />
	<input type="text" name="title" class="long" value="{$data.title}"><br /><br />
	
	<span class="head3">��������� �������� � ����</span><br />
	<input type="text" name="menutitle" class="long" value="{$data.menutitle}"><br /><br />

	<span class="head3">����� ��������</span><br />
	<textarea id="elm1" name="text" rows="15" cols="97">{$data.text}</textarea><br /><br />

	{if $data.id>0}
	<span class="head3">������� ����������� ��������</span><br />
	{if $data.background==""}
		<input type="file" name="background" class="short" value="{$data.name}"><br />
			<small>(��� ����, ����� ����������� �������� ��� ������� ��������, ��� ������ ���� �������� 811 x 406 ��������)</small>
	{else}
		<img src="../{$data.background}" border="0" width="200"><br />
		<a href="?id={$data.id}&delimage" onclick="return confirm('�� ������������� ������ ������� �����������?')">������� �����������</a>
	{/if}
	<br /><br />
	{/if}



  	<span class="head3">��� ������ ���� (�� 10 ������������ - ���� ����� �������, ����� 10 - ����)</span><br />
	<select name="weight" value="{$data.name}">
  		{foreach from=$weights item=it}
   	  		<option value='{$it}'{if $data.weight==$it} selected{/if}>{$it}</option>
    	{/foreach}
  	</select><br /><br />

  	<input name="id" type="hidden" value="{$data.id}">
	<input type="submit" name="sent" value="���������">
  	<input type="button" onclick='location.href="infopage_list.php"' value="�����">
</form>

{include file="adm_footer.tpl"}