{**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: user_mod.tpl
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
		<label for="fname">Firstname</label>
		<input name="fname" id="fname" type="text" maxlength="150" value="{$form_fname}" />
	</p>
	
		<p>
		<label for="fname">Surname</label>
		<input name="sname" id="sname" type="text" maxlength="150" value="{$form_sname}" />
	</p>
			
	<p>
		<label for="username">Username:</label>
		<input name="username" id="username" type="text" maxlength="150" value="{$form_uname}" />
	</p>
	
		<p>
		<label for="mail">Email:</label>
		<input name="mail" id="mail" type="text" maxlength="150" value="{$form_mail}" />
	</p>
        
	<p>
		<label for="password">Password:</label>
		<input name="password" id="password" type="password" maxlength="20" />
	</p>
        
	<p>
		<label for="security">Security Level:</label><br />
		{html_radios name='security' values=$form_security__values output=$form_security__output selected=$form_security__selected separator='<br />'}
	</p>
			
	<p>
		<input type="submit" name="submit" value="{$form_submitbtn}" />
	</p>
</form>
{/block}