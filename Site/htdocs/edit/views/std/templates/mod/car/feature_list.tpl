{**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: feature_list.tpl
 * Version: 1.0
 *}

{* Load / Extend the main template *}
{extends file="master.tpl"}

{* Set / Populate the HTML page properties *}
{block name=title}{$title}{/block}

{* Populate the site with content *}
{block name=rightbody}
<h1>Car Feature</h1>
<p>{$msg}</p>
<h2>Add new Feature</h2>
<form action="{$formaction}" method="post">
	<label>Enter feature: <input type="text" id="newfeature" name="newfeature" size="30" /></label>
	<input type="submit" value="Add Feature" />
</form>
<h2>Existing Features</h2>
<table>
	<tr>
		<th>ID</th>
		<th>Feature</th>
		<th>Actions</th>
	</tr>
	{foreach $list as $item}
	{strip}
	{if $item@iteration is even by 1}
		<tr>
	{else}
		<tr style="background-color: #eee">
	{/if}
			<td>{$item.id}</td>
			<td>{$item.feature}</td>
			<td><a href="car_feature.php?id={$item.id}&feature={$item.feature}&act=DEL">Delete</a></td>
		</tr>
	{/strip}
	{/foreach}
</table>
{/block}