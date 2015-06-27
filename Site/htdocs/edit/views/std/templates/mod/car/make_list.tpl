{**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: make_list.tpl
 * Version: 1.0
 *}

{* Load / Extend the main template *}
{extends file="master.tpl"}

{* Set / Populate the HTML page properties *}
{block name=title}{$title}{/block}

{* Populate the site with content *}
{block name=rightbody}
<h1>Car Manufacture</h1>
<p>{$msg}</p>
<h2>Add new Manufacture</h2>
<form action="{$formaction}" method="post">
	<label>Enter manufacture: <input type="text" id="newmake" name="newmake" size="30" /></label>
	<input type="submit" value="Add Manufacture" />
</form>
<h2>Existing Manufactures</h2>
<table>
	<tr>
		<th>ID</th>
		<th>Manufacture</th>
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
			<td>{$item.make}</td>
			<td><a href="car_manufacture.php?id={$item.id}&make={$item.make}&act=DEL">Delete</a></td>
		</tr>
	{/strip}
	{/foreach}
</table>
{/block}