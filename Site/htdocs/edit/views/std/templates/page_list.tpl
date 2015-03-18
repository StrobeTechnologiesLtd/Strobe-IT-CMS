{**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: page_list.tpl
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
		<th>Date Updated</th>
		<th>Actions</th>
	</tr>
	{foreach $pagelist as $pageitem}
	{strip}
		<tr>
			<td>{$pageitem.title}</td>
			<td>{$pageitem.dateUpdated|date_format}</td>
			<td>
				<a href="page_edit.php?id={$pageitem.id}">Edit</a><br />
				<a href="page_delete.php?id={$pageitem.id}&title={$pageitem.title}">Delete</a>
			</td>
		</tr>
	{/strip}
	{/foreach}
</table>
{/block}