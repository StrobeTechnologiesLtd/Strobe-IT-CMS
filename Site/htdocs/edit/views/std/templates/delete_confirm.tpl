{**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: delete_confirm.tpl
 * Version: 1.0
 *}

{* Load / Extend the main template *}
{extends file="master.tpl"}

{* Set / Populate the HTML page properties *}
{block name=title}{$title}{/block}

{* Populate the site with content *}
{block name=rightbody}
<form method="post" action="">
	<p>Are you sure you would like to delete the {$object_type} <em>{$object_description}</em> with ID <em>{$object_id}</em>?</p>
	<ul>
		<li><input type="submit" id="submit" value="Yes" name="submit" /></li>
		<li><input type="submit" id="submit" value="No" name="submit" /></li>
	</ul>
	<input type="hidden" id="id" name="id" value="{$object_id}" />
</form>
{/block}