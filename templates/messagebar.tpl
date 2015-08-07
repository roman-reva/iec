{if $message!=""}
	<li class="message">{$message}</li> <br />
{/if}

{if count($errors)>0}
  {foreach from=$errors item=error}
  	<li class="error"> {$error}</li>
  {/foreach}<br />
{/if}
