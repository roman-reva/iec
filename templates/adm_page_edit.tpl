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

<form name="edit" action="?" method="POST" enctype="multipart/form-data">
	<span class="head3">Заголовок материала</span><br />
	<input type="text" name="title" class="long" value="{$data.title}"><br /><br />

	<span class="head3">Краткое описание материала</span><br />
	<textarea name="details" rows="8" cols="97">{$data.details}</textarea><br /><br />

	<span class="head3">Текст материала</span><br />
	<textarea id="elm1" name="text" rows="15" cols="97">{$data.text}</textarea><br /><br />
	
	<span class="head3">Тип материала</span><br />
	<select name="page_type">
		{foreach from=$page_type item=it}
			<option value="{$it.id}" {if $it.id==$data.id_page_type}selected{/if}>{$it.name}</option>
		{/foreach}
	</select><br /><br />
	{if $data.id>0}
	<span class="head3">Приложение файла</span><br />
	{if $data.file==""}
		<input type="file" name="file" class="short" value="">
	{else}
		<a href="../{$data.file}"> {$data.filename}</a> ({$data.filesize} Кб)
		<a href="?id={$data.id}&delfile" onclick="return confirm('Вы действительно хотите удалить файл?')"><img src="../images/b_del.png" border="0" /></a>
	{/if}
	<br /><br />
	{/if}

  	<!-- input type="checkbox" name="hidden" {if $data.hidden==true}checked{/if}>
  	<span class="head3">Скрыть страницу</span><br /><br / -->

  	<input name="id" type="hidden" value="{$data.id}">
	<input type="submit" name="sent" value="Сохранить">
  	<input type="button" onclick='location.href="page_list.php"' value="Назад">
</form><br />



{include file="adm_footer.tpl"}