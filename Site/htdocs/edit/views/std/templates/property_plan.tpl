{**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: property_pics.tpl
 * Version: 1.0
 *}

{* Load / Extend the main template *}
{extends file="master.tpl"}

{* Set / Populate the HTML page properties *}
{block name=title}{$title}{/block}

{* Populate the site with content *}
{block name=rightbody}
<p>{$msg}</p>
<h1>Property Name: </h1><h2>{$prop_name}</h2>
<h2>Plan(s)</h2>
<table>
<form enctype="multipart/form-data" action="{$form_action}" method="post">
	<input type="hidden" name="max_file_size" value="5242880" />
	{assign var="allowup" value="1"}
	{assign var="pic" value="$fullpath/propimages/house{$prop_key}x.jpg"}
	{if file_exists($pic)}
		<tr>
			<td><img src="/thumb.php?pic=house{$prop_key}x.jpg&amp;path=propimages&amp;width=200" alt="" width="200px" /> <input name="Deletep" type="checkbox" value="delete" />Delete</td>
		</tr>
		{assign var="allowup" value="0"}
	{/if}
	{if $allowup==1}
		<tr>
			<td><input type="file" name="pic" /></td>
		</tr>
	{/if}
	<tr>
		<td><input name="" type="submit" value="Submit" /></td>
	</tr>
</form>
</table>
{/block}