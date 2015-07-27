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
	
	<form action=""><input type="button" value="Back to list" onclick="history.go(-1);return true;" /></form>
	<br />

	<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="240" valign="top">
				{foreach $fileext as $ext}
					{assign var="pic" value="$fullpath/modules/car/vehicles/c{$id}p1.{$ext}"}
					{if file_exists($pic)}
						<img src="/thumb.php?pic=c{$id}p1.JPG&amp;path=modules/car/vehicles&amp;width=230&amp;height=173" alt="{$make} {$model}" width="230px" height="173px" />
					{/if}
				{/foreach}
			</td>
            <td valign="top">
				<p>
					<span class="car_label">Make :</span> {$make}<br />
					<span class="car_label">Model :</span> {$model}<br />
					<span class="car_label">Fuel :</span> {$fuel}<br />
					<span class="car_label">Transmission :</span> {$transmission}<br />
					<span class="car_label">Colour :</span> {$colour}<br/>
					<span class="car_label">Year  :</span> {$year}<br />
					<span class="car_label">Miles :</span> {$miles}<br />
					<span class="car_label">Price :</span> &pound;{$price|number_format:0:".":","} {$price_VAT}<br />
				</p>
			</td>
			<td>
				&nbsp;
			</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" valign="top">
				<span class="car_label">Description:</span> {$fulldescription}<br /><br />
				<span class="car_label">Pictures:</span><br /><br />
	
				<!-- Picture 1 -->
				{foreach $fileext as $ext}
					{assign var="pic" value="$fullpath/modules/car/vehicles/c{$id}p1.{$ext}"}
					{if file_exists($pic)}
						<a href="/thumb.php?pic=c{$id}p1.{$ext}&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" title=" " rel="lightbox[car]">
							<img src="/thumb.php?pic=c{$id}p1.{$ext}&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" alt="{$make} {$model}" width="150px" height="113px" />
						</a>
					{/if}
				{/foreach}
	
				<!-- Picture 2 -->
				{foreach $fileext as $ext}
					{assign var="pic" value="$fullpath/modules/car/vehicles/c{$id}p2.{$ext}"}
					{if file_exists($pic)}
						<a href="/thumb.php?pic=c{$id}p2.{$ext}&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" title=" " rel="lightbox[car]">
							<img src="/thumb.php?pic=c{$id}p2.{$ext}&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" alt="{$make} {$model}" width="150px" height="113px" />
						</a>
					{/if}
				{/foreach}
	
				<!-- Picture 3 -->
				{foreach $fileext as $ext}
					{assign var="pic" value="$fullpath/modules/car/vehicles/c{$id}p3.{$ext}"}
					{if file_exists($pic)}
						<a href="/thumb.php?pic=c{$id}p3.{$ext}&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" title=" " rel="lightbox[car]">
							<img src="/thumb.php?pic=c{$id}p3.{$ext}&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" alt="{$make} {$model}" width="150px" height="113px" />
						</a>
					{/if}
				{/foreach}
	
				<!-- Picture 4 -->
				{foreach $fileext as $ext}
					{assign var="pic" value="$fullpath/modules/car/vehicles/c{$id}p4.{$ext}"}
					{if file_exists($pic)}
						<a href="/thumb.php?pic=c{$id}p4.{$ext}&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" title=" " rel="lightbox[car]">
							<img src="/thumb.php?pic=c{$id}p4.{$ext}&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" alt="{$make} {$model}" width="150px" height="113px" />
						</a>
					{/if}
				{/foreach}
	
				<!-- Picture 5 -->
				{foreach $fileext as $ext}
					{assign var="pic" value="$fullpath/modules/car/vehicles/c{$id}p5.{$ext}"}
					{if file_exists($pic)}
						<a href="/thumb.php?pic=c{$id}p5.{$ext}&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" title=" " rel="lightbox[car]">
							<img src="/thumb.php?pic=c{$id}p5.{$ext}&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" alt="{$make} {$model}" width="150px" height="113px" />
						</a>
					{/if}
				{/foreach}
	
				<!-- Picture 6 -->
				{foreach $fileext as $ext}
					{assign var="pic" value="$fullpath/modules/car/vehicles/c{$id}p6.{$ext}"}
					{if file_exists($pic)}
						<a href="/thumb.php?pic=c{$id}p6.{$ext}&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" title=" " rel="lightbox[car]">
							<img src="/thumb.php?pic=c{$id}p6.{$ext}&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" alt="{$make} {$model}" width="150px" height="113px" />
						</a>
					{/if}
				{/foreach}
	
				<!-- Picture 7 -->
				{foreach $fileext as $ext}
					{assign var="pic" value="$fullpath/modules/car/vehicles/c{$id}p7.{$ext}"}
					{if file_exists($pic)}
						<a href="/thumb.php?pic=c{$id}p7.{$ext}&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" title=" " rel="lightbox[car]">
							<img src="/thumb.php?pic=c{$id}p7.{$ext}&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" alt="{$make} {$model}" width="150px" height="113px" />
						</a>
					{/if}
				{/foreach}
	
				<!-- Picture 8 -->
				{foreach $fileext as $ext}
					{assign var="pic" value="$fullpath/modules/car/vehicles/c{$id}p8.{$ext}"}
					{if file_exists($pic)}
						<a href="/thumb.php?pic=c{$id}p8.{$ext}&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" title=" " rel="lightbox[car]">
							<img src="/thumb.php?pic=c{$id}p8.{$ext}&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" alt="{$make} {$model}" width="150px" height="113px" />
						</a>
					{/if}
				{/foreach}
			</td>
			<td>
				<span class="car_label">Features</span>
				<ul>
				{foreach $features as $item}
				{strip}
					<li>{$item}</li>
				{/strip}
				{/foreach}
				</ul>
			</td>
		</tr>
	</table>
    <p>&nbsp;</p>	
{/block}