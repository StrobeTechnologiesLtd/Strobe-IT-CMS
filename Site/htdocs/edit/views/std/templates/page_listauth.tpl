{**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: page_listauth.tpl
 * Version: 1.0
 *}

{* Load / Extend the main template *}
{extends file="master.tpl"}

{* Set / Populate the HTML page properties *}
{block name=title}{$title}{/block}

{* Populate the site with content *}
{block name=rightbody}
<p>{$msg}</p>
<table>
	<tr>
		<th>Page Title</th>
		<th>Page ID</th>
		<th>Actions</th>
	</tr>
	{foreach $pagelist as $pageitem}
	{strip}
		<tr>
			<td>{$pageitem.title}</td>
			<td>{$pageitem.pageid}</td>
			<td>
				<a href="page_edit.php?id={$pageitem.id}&pageid={$pageitem.pageid}">Edit</a><br />
				<a href="page_deleteauth.php?id={$pageitem.id}">Delete</a>
			</td>
		</tr>
	{/strip}
	{/foreach}
</table>
{/block}