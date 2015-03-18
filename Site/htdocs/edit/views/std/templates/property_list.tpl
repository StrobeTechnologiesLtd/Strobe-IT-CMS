{**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: property_list.tpl
 * Version: 2.0
 *}

{* Load / Extend the main template *}
{extends file="master.tpl"}

{* Set / Populate the HTML page properties *}
{block name=title}{$title}{/block}

{* Populate the site with content *}
{block name=rightbody}
<form action="{$formaction}" method="get">
	Property REF: <input type="text" name="propertyref" /> <input type="submit" value="Search" />
</form>
<form action="{$formaction}" method="get">
	Property Name: <input type="text" name="propertyname" /> <input type="submit" value="Search" /> (Remember the " at start and end)
	<p class="small">The "%" sign is used to define wildcards (missing letters) both before and after the pattern.<br />
	Example: "%s", "farm%" or "%land%"</p>
</form>
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
	{if $propertyitem@iteration is even by 1}
		<tr>
	{else}
		<tr style="background-color: #eee">
	{/if}
			<td>{$propertyitem.PROP_REF}</td>
			<td>{$propertyitem.PROP_NAME}</td>
			<td>{$propertyitem.PROP_STATUS}</td>
			<td>&pound;{$propertyitem.PROP_PRICE|number_format:0:".":","}</td> {* {$myvar|number_format:2:".":","} *}
			<td>
				<a href="property_edit.php?id={$propertyitem.PROP_KEY}">Edit</a><br />
				<a href="property_delete.php?id={$propertyitem.PROP_KEY}&name={$propertyitem.PROP_NAME}">Delete</a><br />
				<a href="property_pics.php?id={$propertyitem.PROP_KEY}&name={$propertyitem.PROP_NAME}">Pics</a><br />
				<a href="property_plan.php?id={$propertyitem.PROP_KEY}&name={$propertyitem.PROP_NAME}">Floor Plan</a><br />
				<a href="property_pdf.php?id={$propertyitem.PROP_KEY}&name={$propertyitem.PROP_NAME}">PDF&amp;EPC</a>
			</td>
		</tr>
	{/strip}
	{/foreach}
</table>
{/block}