{**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: car_list.tpl
 * Version: 1.0
 *}

{* Load / Extend the main template *}
{extends file="master.tpl"}

{* Set / Populate the HTML page properties *}
{block name=title}{$title}{/block}

{* Populate the site with content *}
{block name=rightbody}
<form action="{$formaction}" method="get">
	Vehicle Inv#: <input type="text" name="carinv" /> <input type="submit" value="Search" />
</form>
<form action="{$formaction}" method="get">
	Vehicle Make: <input type="text" name="carmake" /> <input type="submit" value="Search" />
	<p class="small">The "%" sign is used to define wildcards (missing letters) both before and after the pattern.<br />
	Example: %s, farm% or %land%</p>
</form>
<form action="{$formaction}" method="get">
	<input type="submit" value="View All / Clear Search" />
</form>
<p>{$msg}</p>
<table>
	<tr>
		<th>Inv #</th>
		<th>No. Plate</th>
		<th>Make</th>
		<th>Model</th>
		<th>Year</th>
		<th>Price</th>
		<th>Actions</th>
	</tr>
	{foreach $carlist as $caritem}
	{strip}
	{if $caritem@iteration is even by 1}
		<tr>
	{else}
		<tr style="background-color: #eee">
	{/if}
			<td>{$caritem.inven_num}</td>
			<td>CAR REG</td>
			<td>{$caritem.make}</td>
			<td>{$caritem.model}</td>
			<td>{$caritem.year}</td>
			<td>&pound;{$caritem.price|number_format:0:".":","}</td> {* {$myvar|number_format:2:".":","} *}
			<td>
				<a href="car_edit.php?id={$caritem.id}">Edit</a><br />
				<a href="car_delete.php?id={$caritem.id}&inv={$caritem.inven_num}">Delete</a><br />
				<a href="car_pics.php?id={$caritem.id}&inv={$caritem.inven_num}">Pics</a><br />
				<!--<a href="car_plan.php?id={$caritem.id}&inv={$caritem.inven_num}">Floor Plan</a><br />
				<a href="car_pdf.php?id={$caritem.id}&inv={$caritem.inven_num}">PDF&amp;EPC</a>-->
			</td>
		</tr>
	{/strip}
	{/foreach}
</table>
{/block}