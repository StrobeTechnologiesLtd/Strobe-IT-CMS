{**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: user_list.tpl
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
<p><a href="user_new.php">Create New User</a></p>
<table>
	<tr>
		<th>Username</th>
		<th>Firstname</th>
		<th>Surname</th>
		<th>Logon Time</th>
		<th>Actions</th>
	</tr>
	{foreach $userlist as $useritem}
	{strip}
		<tr>
			<td>{$useritem.username}</td>
			<td>{$useritem.firstname}</td>
			<td>{$useritem.surname}</td>
			<td>{$useritem.logontime|date_format}</td>
			<td>
				<a href="user_edit.php?id={$useritem.id}">Edit</a><br />
				<a href="user_delete.php?id={$useritem.id}&username={$useritem.username}">Delete</a>
			</td>
		</tr>
	{/strip}
	{/foreach}
</table>
{/block}