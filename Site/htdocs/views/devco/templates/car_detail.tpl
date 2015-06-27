 {**
 * Project: Devco Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: car_detail.tpl
 * Version: 1.0
 *}

{* Load / Extend the main template *}
{extends file="master.tpl"}

{* Set / Populate the HTML page properties *}
{block name=keywords}{$keywords}{/block}
{block name=description}{$description}{/block}
{block name=title}{$title}{/block}

{block name=add_head}
	<!-- Galleria 1.3 -->
	<link rel="stylesheet" href="{$__jsDir}galleria/galleria.css" type="text/css" media="screen" />
	<script type="text/javascript" src="{$__jsDir}galleria/galleria-1.3.min.js"></script>
{/block}


{* Populate the site with content *}
{block name=sitenav}
	<ul>
		<li><a href="/search/vehicle/car/"><span>Cars</span></a></li>
		<li><a href="/search/vehicle/van/"><span>Vans</span></a></li>
		{foreach $sitenav as $nav}
		{strip}
			<li><a href="/{$nav.url}/"><span>{$nav.title}</span></a></li>
			{* <li><a href="index.php?id={$nav.id}"><span>{$nav.title}</span></a></li> *}
		{/strip}
		{/foreach}
	</ul>
{/block}
{**{block name=sitesubnav}
	<ul>
		{foreach $sitesubnav as $subnav}
		{strip}
		<li><a href="index.php?id={$subnav.id}"><span>{$subnav.title}</span></a></li>
		{/strip}
		{/foreach}
	</ul>
{/block}**}
{block name=body}

	<h1>{$minidescription}</h1>

	<table width="800" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="340" valign="top"><img src="#" alt="{$make} {$model}" /></td>
            <td valign="top"><p>
				<span class="car_label">Make :</span> {$make}<br />
				<span class="car_label">Model :</span> {$model}<br />
				<span class="car_label">Fuel :</span> {$fuel}<br />
				<span class="car_label">Transmission :</span> {$transmission}<br />
				<span class="car_label">Colour :</span> {$colour}<br/>
				<span class="car_label">Year  :</span> {$year}<br />
				<span class="car_label">Miles :</span> {$miles}<br />
				<span class="car_label">Price :</span> £{$price|number_format:0:".":","} {$price_VAT}<br />
			</p></td>
	
	<!--
	//*** Convert MySQL to PHP Array ***
	$dbfeatures = explode(",", $car->features);
	$output.='<td valign="top">
		<span class="car_label">Features</span>
		<ul>';
	foreach ($dbfeatures as $feature) {
		$output.='<li>' . $feature . '</li>';
	}
	$output.='</ul></td>';
	-->
		</tr>
	</table>
    <p>&nbsp;</p>
	<span class="car_label">Description:</span> {$fulldescription}<br /><br />
{/block}