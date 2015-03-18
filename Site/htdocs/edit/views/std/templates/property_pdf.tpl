{**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: property_pics.tpl
 * Version: 1.0
 *}

{* Load / Extend the main template *}
{extends file="master.tpl"}

{* Set / Populate the HTML page properties *}
{block name=title}{$title}{/block}

{* Populate the site with content *}
{block name=rightbody}
<p>{$msg}</p>
<h1>Property Name: </h1><h2>{$prop_name}</h2>
<h2>PDF Brochure</h2>
<table>
<form enctype="multipart/form-data" action="{$form_action}" method="post">
	<input type="hidden" name="max_file_size" value="5242880" />
	{assign var="allowup" value="1"}
	{assign var="pdfbro" value="$fullpath/pdf/{$prop_key}.pdf"}
	{if file_exists($pdfbro)}
		<tr>
			<td>File Exists!</td>
			<td><a href="/pdf/{$prop_key}.pdf">View File</td>
			<td><input name="Deletebro" type="checkbox" value="delete" />Delete</td>
		</tr>
		{assign var="allowup" value="0"}
	{/if}
	{if $allowup==1}
		<tr>
			<td>No File Yet</td>
			<td>&nbsp;</td>
			<td><input type="file" name="pdfbro" /></td>
		</tr>
	{/if}
	<tr>
		<td><input name="" type="submit" value="Submit" /></td>
	</tr>
</form>
</table>

<h2>PDF EPC</h2>
<table>
<form enctype="multipart/form-data" action="{$form_action}" method="post">
	<input type="hidden" name="max_file_size" value="5242880" />
	{assign var="allowup2" value="1"}
	{assign var="pdfepc" value="$fullpath/pdf/EPC_{$prop_key}.pdf"}
	{if file_exists($pdfepc)}
		<tr>
			<td>File Exists!</td>
			<td><a href="/pdf/EPC_{$prop_key}.pdf">View File</td>
			<td><input name="Deleteepc" type="checkbox" value="delete" />Delete</td>
		</tr>
		{assign var="allowup2" value="0"}
	{/if}
	{if $allowup2==1}
		<tr>
			<td>No File Yet</td>
			<td>&nbsp;</td>
			<td><input type="file" name="pdfepc" /></td>
		</tr>
	{/if}
	<tr>
		<td><input name="" type="submit" value="Submit" /></td>
	</tr>
</form>
</table>
{/block}