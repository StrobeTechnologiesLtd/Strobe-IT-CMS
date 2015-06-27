{**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: year_list.tpl
 * Version: 1.0
 *}

{* Load / Extend the main template *}
{extends file="master.tpl"}

{* Set / Populate the HTML page properties *}
{block name=title}{$title}{/block}

{* Populate the site with content *}
{block name=rightbody}
<h1>Registration Year</h1>
<p>{$msg}</p>
<h2>Add new year</h2>
<form action="{$formaction}" method="post">
	<label>Enter year: <input type="text" id="newyear" name="newyear" size="30" /></label>
	<input type="submit" value="Add Year" />
</form>
<h2>Existing Years</h2>
<table>
	<tr>
		<th>ID</th>
		<th>Year</th>
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
			<td>{$item.year}</td>
			<td><a href="car_year.php?id={$item.id}&year={$item.year}&act=DEL">Delete</a></td>
		</tr>
	{/strip}
	{/foreach}
</table>
{/block}