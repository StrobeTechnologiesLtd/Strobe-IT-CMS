{**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: car_pics.tpl
 * Version: 1.0
 *}

{* Load / Extend the main template *}
{extends file="master.tpl"}

{* Set / Populate the HTML page properties *}
{block name=title}{$title}{/block}

{* Set Default VARS *}
{assign var="allowup" value="TRUE"}
{assign var="upnum" value="0"}

{* Populate the site with content *}
{block name=rightbody}
<p>{$msg}</p>
<h1>Car Inventory #: </h1><h2>{$inven_num}</h2>
<h2>Pictures</h2>
<table>
<form enctype="multipart/form-data" action="{$form_action}" method="post">
	<input type="hidden" name="max_file_size" value="2000000" />

	{foreach $filelist as $filename}
		<tr>
			<td>
				<img src="/thumb.php?pic={$filename}&amp;path=modules/car/vehicles&amp;width=200" alt="" width="200px" /> <input name="Deletep{$n}" type="checkbox" value="delete" />Delete
			</td>
		</tr>
	{/foreach}
	
	{if $picnum!=0}
		<tr>
			<td>
				<input type="file" name="pic" />
				<input type="hidden" name="picnum" value="{$picnum}" />
			</td>
		</tr>
	{/if}
	
	<tr>
		<td><input name="" type="submit" value="Submit" /></td>
	</tr>
</form>
</table>
{/block}