 {**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: login.tpl
 * Version: 1.0
 *}

{* Load / Extend the main template *}
{extends file="master.tpl"}

{* Set / Populate the HTML page properties *}
{block name=title}{$title}{/block}

{* Populate the site with content *}
{block name=leftbody}{$error}{/block}
{block name=rightbody}
<div id="loginscreen">
	<form method="post" action="">
		<p>
			<label for="username">Username: </label>
			<input type="text" name="username" />
		</p>
			
		<p>
			<label for="password">Password: </label>
			<input type="password" name="password" />
		</p>
			
		<p>
			<input type="submit" id="submit" value="Login" name="submit" />
		</p>
	</form>
</div>
{/block}