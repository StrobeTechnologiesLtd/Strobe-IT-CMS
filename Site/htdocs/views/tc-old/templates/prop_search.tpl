 {**
 * Project: Thorne + Carter Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: prop_search.tpl
 * Version: 1.0
 *}

{* Load / Extend the main template *}
{extends file="master.tpl"}

{* Set / Populate the HTML page properties *}
{block name=keywords}{$keywords}{/block}
{block name=description}{$description}{/block}
{block name=title}{$title}{/block}

{block name=add_head}
	<!-- LightBox 2 -->
	<link rel="stylesheet" href="{$__imgDir}lightbox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="{$__jsDir}lightbox/prototype.js"></script>
	<script type="text/javascript" src="{$__jsDir}lightbox/scriptaculous.js?load=effects,builder"></script>
	<script type="text/javascript" src="{$__jsDir}lightbox/lightbox.js"></script>
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
		<a href="index.php?id={$nav.id}"><span>{$nav.title}</span></a></li>
		{/strip}
		{/foreach}
		<li><a href="prop_search.php?type=Sale"><span>For Sale</span></a></li>
		<li><a href="prop_search.php?type=Rental"><span>Rental</span></a></li>
		<li><a href="prop_search.php?type=Commercial"><span>Commercial</span></a></li>
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
	{foreach $proplist as $prop}
	{strip}
	<div class="clearing-big"></div>
	<div id="property">
		<div id="property-banner">
			<div id="property-bannertitle"><h2>{$prop.PROP_NAME}</h2></div>
			<div id="property-bannerdetail">
				{$prop.PROP_BED} <img src="{$__imgDir}bed.png" alt="Number of bed picture" width="27" height="26" /><br />
				&pound; {$prop.PROP_Price|number_format:0:".":","}
				{if {$prop.PROP_PRICE_TEXT} != ""}
					<br />{$prop.PROP_PRICE_TEXT}
				{/if}
			</div>
		</div>
		<div id="property-col1">
			{assign var="pic1" value="$fullpath/propimages/house{$prop.PROP_KEY}.jpg"}
			{if file_exists($pic1)}
				<a href="/propimages/house{$prop.PROP_KEY}.jpg" rel="lightbox[{$prop.PROP_KEY}]"><img src="thumb.php?pic=house{$prop.PROP_KEY}.jpg&amp;path=propimages&amp;width=400&amp;height=267" alt="" width="400px" height="267" /></a> <br />
			{else}
				<img src="thumb.php?pic=no-pic.png&path=new/htdocs/views/tc/images/&width=400" alt="No Picture" width="400px" /> <br />
			{/if}
			{assign var="pic2" value="$fullpath/propimages/house{$prop.PROP_KEY}a.jpg"}
			{if file_exists($pic2)}
				<a href="/propimages/house{$prop.PROP_KEY}a.jpg" rel="lightbox[{$prop.PROP_KEY}]"><img src="thumb.php?pic=house{$prop.PROP_KEY}a.jpg&amp;path=propimages&amp;width=114&amp;height=71" alt="" width="114px" height="71px" /></a>
			{else}
				<img src="thumb.php?pic=no-pic.png&path=new/htdocs/views/tc/images/&width=114" alt="No Picture" width="114px" height="71px" />
			{/if}
			{assign var="pic3" value="$fullpath/propimages/house{$prop.PROP_KEY}b.jpg"}
			{if file_exists($pic3)}
				<a href="/propimages/house{$prop.PROP_KEY}b.jpg" rel="lightbox[{$prop.PROP_KEY}]"><img src="thumb.php?pic=house{$prop.PROP_KEY}b.jpg&amp;path=propimages&amp;width=114&amp;height=71" alt="" width="114px" height="71px" /></a>
			{else}
				<img src="thumb.php?pic=no-pic.png&path=new/htdocs/views/tc/images/&width=114" alt="No Picture" width="114px" height="71px" />
			{/if}
			{assign var="pic4" value="$fullpath/propimages/house{$prop.PROP_KEY}c.jpg"}
			{if file_exists($pic4)}
				<a href="/propimages/house{$prop.PROP_KEY}c.jpg" rel="lightbox[{$prop.PROP_KEY}]"><img src="thumb.php?pic=house{$prop.PROP_KEY}c.jpg&amp;path=propimages&amp;width=114&amp;height=71" alt="" width="114px" height="71px" /></a>
			{else}
				<img src="thumb.php?pic=no-pic.png&path=new/htdocs/views/tc/images/&width=114" alt="No Picture" width="114px" height="71px" />
			{/if}
		</div>
		<div id="property-col2">{$prop.PROP_SUMMARY}</div>
		<div id="property-menu">
			<ul>
				<li><a href="prop_detail.php?ref={$prop.PROP_REF}"><span>View Full Details</span></a></li>
				{assign var="floorplan" value="$fullpath/propimages/house{$prop.PROP_KEY}x.jpg"}
				{if file_exists($floorplan)}
					<li><a href="/propimages/house{$prop.PROP_KEY}x.jpg" rel="lightbox"><span>View Floor Plan</span></a></li>
				{/if}
				{assign var="ecp" value="$fullpath/pdf/EPC_{$prop.PROP_KEY}.pdf"}
				{if file_exists($ecp)}
					<li><a href="/pdf/EPC_{$prop.PROP_KEY}.pdf"><span>View EPC</span></a></li>
				{/if}
				<li><a href="https://maps.google.co.uk/maps?hl=en&amp;q={$prop.PROP_POSTCODE}" target="multimap"><span>View On Map</span></a></li>
				{assign var="brouchure" value="$fullpath/pdf/{$prop.PROP_KEY}.pdf"}
				{if file_exists($brouchure)}
					<li><a href="/pdf/{$prop.PROP_KEY}.pdf"><span>Download Brouchure</span></a></li>
				{/if}
			</ul>
		</div>
	</div>
	<div class="clearing-big"></div>
	<div class="clearing-big"></div> 
	{/strip}
	{/foreach}
{/block} 