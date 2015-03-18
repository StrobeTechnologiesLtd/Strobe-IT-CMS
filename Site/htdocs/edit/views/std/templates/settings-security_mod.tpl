{**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: settings-security_mod.tpl
 * Version: 1.0
 *}

{* Load / Extend the main template *}
{extends file="master.tpl"}

{* Set / Populate the HTML page properties *}
{block name=title}{$title}{/block}

{* Populate the site with content *}
{block name=rightbody}
<p>{$msg}</p>
<form action="{$form_action}" method="post">
	<p>
		<label for="securityno">Security No.</label>
		<input name="securityno" id="securityno" type="text" maxlength="2" value="{$form_securityno}" />
	</p>
	
	<p>
		<label for="description">Description</label>
		<input name="description" id="description" type="text" maxlength="150" value="{$form_description}" />
	</p>
	
	<p>
		{html_checkboxes name='settings' values=$form_settings__values output=$form_settings__options selected=$form_settings__selected  separator='<br />'}
	</p>
			
	<p>
		<input type="submit" name="submit" value="{$form_submitbtn}" />
	</p>
</form>
{/block}