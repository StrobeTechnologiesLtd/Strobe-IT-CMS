{**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: property_list.tpl
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
		<th>REF</th>
		<th>Name</th>
		<th>Status</th>
		<th>Price</th>
		<th>Actions</th>
	</tr>
	{foreach $propertylist as $propertyitem}
	{strip}
		<tr>
			<td>{$propertyitem.PROP_REF}</td>
			<td>{$propertyitem.PROP_NAME}</td>
			<td>{$propertyitem.PROP_STATUS}</td>
			<td>&pound;{$propertyitem.PROP_PRICE|number_format:0:".":","}</td> {* {$myvar|number_format:2:".":","} *}
			<td>
				<a href="property_edit.php?id={$propertyitem.PROP_KEY}">Edit</a><br />
				<a href="property_delete.php?id={$propertyitem.PROP_KEY}&name={$propertyitem.PROP_NAME}">Delete</a><br />
				<a href="">Pictures &amp; Plans</a>
			</td>
		</tr>
	{/strip}
	{/foreach}
</table>
{/block}