 {**
 * Project: Thorne + Carter Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: prop_detail.tpl
 * Version: 2.0
 *}

{* Load / Extend the main template *}
{extends file="master_property.tpl"}

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
		{foreach $sitenav as $nav}
		{strip}
		{if $pid == $nav.id}
			<li id="current">
		{else}
			<li>
		{/if}
		<a href="/{$nav.url}/"><span>{$nav.title}</span></a></li>
		{* <a href="index.php?id={$nav.id}"><span>{$nav.title}</span></a></li> *}
		{/strip}
		{/foreach}
		<li><a href="/search/Sale/"><span>For Sale</span></a></li>
		<li><a href="/search/Rental/"><span>Letting</span></a></li>
		<li><a href="/search/Commercial/"><span>Commercial</span></a></li>
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
	<div class="property">
		<div class="property-banner">
			<div class="property-bannertitle"><h2>{$prop_name}</h2></div>
			<div class="property-bannerdetail">
				{if {$prop_type} != "Commercial"}
					{$prop_bed} <img src="{$__imgDir}bed.png" alt="Number of bed picture" width="27" height="26" />
				{/if}
				<img src="{$__imgDir}spacer.png" alt="" width="50" height="5" />
				&pound; {$prop_price|number_format:0:".":","}
				{if {$price_text} != ""}
					&nbsp;{$price_text}
				{/if}
			</div>
		</div>
		<div id="galleria">
			{assign var="pic" value="$fullpath/propimages/house{$prop_key}.jpg"}
			{if file_exists($pic)}
				<img src="/propimages/house{$prop_key}.jpg" />
			{else}
				<img src="{$__imgDir}no-pic.png" alt="No Picture" />
			{/if}
			{foreach from=$imagelist item=img_letter}
				{assign var="pic" value="$fullpath/propimages/house{$prop_key}{$img_letter}.jpg"}
				{if file_exists($pic)}
					<img src="/propimages/house{$prop_key}{$img_letter}.jpg" />
				{/if}
			{/foreach}

			<!--<img src="/propimages/house{$prop_key}a.jpg" />-->
		</div>
		<script>
			Galleria.loadTheme('{$__jsDir}galleria/themes/classic/galleria.classic.min.js');
            Galleria.run('#galleria');
		</script>
		<div class="property-menu">
			<ul>
				{assign var="floorplan" value="$fullpath/propimages/house{$prop_key}x.jpg"}
				{if file_exists($floorplan)}
					<li><a href="/propimages/house{$prop_key}x.jpg" rel="lightbox"><span>View Floor Plan</span></a></li>
				{/if}
				{assign var="ecp" value="$fullpath/pdf/EPC_{$prop_key}.pdf"}
				{if file_exists($ecp)}
					<li><a href="/pdf/EPC_{$prop_key}.pdf"><span>View EPC</span></a></li>
				{/if}
				<li><a href="https://maps.google.co.uk/maps?hl=en&q={$prop_postcode}" target="multimap"><span>View On Map</span></a></li>
				{assign var="brouchure" value="$fullpath/pdf/{$prop_key}.pdf"}
				{if file_exists($brouchure)}
					<li><a href="/pdf/{$prop_key}.pdf"><span>Download Brochure</span></a></li>
				{/if}
				<li><a href="#" onclick="history.go(-1);return false;"><span>Back to Search</span></a></li>
			</ul>
		</div>
		<div class="clearing-big"></div>
		<div id="descriptionarea">
			{$detaildescription}
		</div>
	</div>
	<div class="clearing-big"></div>
{/block}