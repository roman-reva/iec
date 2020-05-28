{if $message!=""}
	<li class="message">{$message}</li> <br />
{/if}

{if !empty($errors)}
  {foreach from=$errors item=error}
  	<li class="error"> {$error}</li>
  {/foreach}<br />
{/if}
