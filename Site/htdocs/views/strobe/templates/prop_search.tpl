 {**
 * Project: Strobe IT Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: prop_search.tpl
 * Version: 2.0
 *}

{* Load / Extend the main template *}
{extends file="master_property.tpl"}

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
			<li><a href="/{$nav.url}/"><span>{$nav.title}</span></a></li>
			{* <li><a href="index.php?id={$nav.id}"><span>{$nav.title}</span></a></li> *}
		{/strip}
		{/foreach}
		{if $searchtype == "Sale"}
			<li id="current">
		{else}
			<li>
		{/if}
		<a href="/search/Sale/"><span>For Sale</span></a></li>
		{if $searchtype == "Rental"}
			<li id="current">
		{else}
			<li>
		{/if}
		<a href="/search/Rental/"><span>Letting</span></a></li>
		{if $searchtype == "Commercial"}
			<li id="current">
		{else}
			<li>
		{/if}
		<a href="/search/Commercial/"><span>Commercial</span></a></li>
		<!--<li><a href="/lists/"><span>Mailing Lists</span></a></li>-->
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
	<img src="{$__imgDir}underline.png" width="900px" />
	{$pagenav}
	<img src="{$__imgDir}underline.png" width="900px" />
	{foreach $proplist as $prop}
	{strip}
	<div class="clearing-big"></div>
	<div class="property">
		<div class="property-col1">
			{assign var="pic1" value="$fullpath/propimages/house{$prop.PROP_KEY}.jpg"}
			{if file_exists($pic1)}
				<div><a href="/propimages/house{$prop.PROP_KEY}.jpg" rel="lightbox[{$prop.PROP_KEY}]" title="Enlarge Main Picture of Property REF {$prop.PROP_KEY}"><img src="/thumb.php?pic=house{$prop.PROP_KEY}.jpg&amp;path=propimages&amp;width=200&amp;height=133" alt="Main Property Picture" width="200px" height="133" /></a></div>
				{if $prop.PROP_STATUS == "Sold"}
					<div class="propstatus"><img src="{$__imgDir}sold.png" alt="Sold Banner" width="200px" height="133" /></div>
				{/if}
				{if $prop.PROP_STATUS == "Sale Agreed"}
					<div class="propstatus"><img src="{$__imgDir}saleagreed.png" alt="Sale Agreed Banner" width="200px" height="133" /></div>
				{/if}
				{if $prop.PROP_STATUS == "Under offer"}
					<div class="propstatus"><img src="{$__imgDir}underoffer.png" alt="Under Offer Banner" width="200px" height="133" /></div>
				{/if}
				{if $prop.PROP_STATUS == "Let"}
					<div class="propstatus"><img src="{$__imgDir}let.png" alt="Let Banner" width="200px" height="133" /></div>
				{/if}
			{else}
				<img src="/thumb.php?pic=no-pic.png&amp;path=views/tc-new/images/&amp;width=200" alt="No Picture" width="200px" />
			{/if}
		</div>
		<div class="property-col2">
			<div class="property-banner">
				<div class="property-bannertitle"><h2>{$prop.PROP_ADDRESS}</h2></div>
				<div class="property-bannerdetail">
					{if $searchtype != "Commercial"}
						{$prop.PROP_BED} Bed <br />
					{else}
						&nbsp;
					{/if}
					&nbsp;&pound; {$prop.PROP_Price|number_format:0:".":","}
					{if {$prop.PROP_PRICE_TEXT} != ""}
						&nbsp;{$prop.PROP_PRICE_TEXT}
					{/if}
				</div>
			</div>
			{$prop.PROP_SUMMARY}
		</div>
		<div class="property-menu">
			<ul>
				{* <li><a href="prop_detail.php?ref={$prop.PROP_REF}"><span>View Full Details</span></a></li> *}
				<li><a href="/details/{$prop.PROP_REF}/"><span>View Full Details</span></a></li>
				{assign var="floorplan" value="$fullpath/propimages/house{$prop.PROP_KEY}x.jpg"}
				{if file_exists($floorplan)}
					<li><a href="/propimages/house{$prop.PROP_KEY}x.jpg" rel="lightbox"><span>View Floor Plan</span></a></li>
				{/if}
				{assign var="brouchure" value="$fullpath/pdf/{$prop.PROP_KEY}.pdf"}
				{if file_exists($brouchure)}
					<li><a href="/pdf/{$prop.PROP_KEY}.pdf"><span>Download Brochure</span></a></li>
				{/if}
			</ul>
		</div>
	</div>
	<img src="{$__imgDir}underline.png" width="900px" />
	<div class="clearing-big"></div>
	<div class="clearing-big"></div> 
	{/strip}
	{/foreach}
{$pagenav}
{/block} 