{**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: pictype_list.tpl
 * Version: 1.0
 *}

{* Load / Extend the main template *}
{extends file="master.tpl"}

{* Set / Populate the HTML page properties *}
{block name=title}{$title}{/block}

{* Populate the site with content *}
{block name=rightbody}
<h1>Car Picture Types</h1>
<p>{$msg}</p>
<h2>Add new Picture Type</h2>
<form action="{$formaction}" method="post">
	<label>Enter extension: <input type="text" id="newext" name="newext" size="5" /></label><br />
	<label>Enter description: <input type="text" id="newdescription" name="newdescription" size="50" /></label><br />
	Enabled: <label><input type="radio" name="newenabled" value="YES" />Yes</label>&nbsp;&nbsp;
				<label><input type="radio" name="newenabled" value="NO" />No</label>
	<input type="submit" value="Add File Type" />
</form>
<h2>Existing Picture Types</h2>
<table>
	<tr>
		<th>ID</th>
		<th>File Extension</th>
		<th>Description</th>
		<th>Enabled</th>
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
			<td>{$item.ext}</td>
			<td>{$item.description}</td>
			<td>{$item.enabled}</td>
			<td>
				<a href="car_pictypes.php?id={$item.id}&ext={$item.ext}&act=DEL">Delete</a><br />
				{if $item.enabled == 'YES'}
					<a href="car_pictypes.php?id={$item.id}&ext={$item.ext}&act=DIS">Disable</a><br />
				{/if}
				{if $item.enabled == 'NO'}
					<a href="car_pictypes.php?id={$item.id}&ext={$item.ext}&act=ENA">Enable</a><br />
				{/if}
			</td>
		</tr>
	{/strip}
	{/foreach}
</table>
{/block}