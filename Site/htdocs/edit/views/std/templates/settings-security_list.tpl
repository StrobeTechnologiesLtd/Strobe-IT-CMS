{**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: settings-security_list.tpl
 * Version: 1.0
 *}

{* Load / Extend the main template *}
{extends file="master.tpl"}

{* Set / Populate the HTML page properties *}
{block name=title}{$title}{/block}

{* Populate the site with content *}
{block name=rightbody}
<p>{$msg}</p>
<p>&nbsp;</p>
<p><a href="settings-security_new.php">Create New Security Group</a></p>
<table>
	<tr>
		<th>Security<br />Number / Level</th>
		<th>Description</th>
		<th>Actions</th>
	</tr>
	{foreach $securitylist as $securityitem}
	{strip}
		<tr>
			<td>{$securityitem.securityno}</td>
			<td>{$securityitem.description}</td>
			<td>
				<a href="settings-security_edit.php?id={$securityitem.id}">Edit</a><br />
				<a href="settings-security_delete.php?id={$securityitem.id}&groupname={$securityitem.securityno}-{$securityitem.description}">Delete</a>
			</td>
		</tr>
	{/strip}
	{/foreach}
</table>
{/block}