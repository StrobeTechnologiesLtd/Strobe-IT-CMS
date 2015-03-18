 {**
 * Project: Thorne + Carter Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: index.tpl
 * Version: 1.1
 *}

{* Load / Extend the main template *}
{extends file="master.tpl"}

{* Set / Populate the HTML page properties *}
{block name=keywords}{$keywords}{/block}
{block name=description}{$description}{/block}
{block name=title}{$title}{/block}

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
		{* <li><a href="prop_search.php?type=Sale"><span>For Sale</span></a></li> *}
		<li><a href="/search/Sale/"><span>For Sale</span></a></li>
		<li><a href="/search/Rental/"><span>Letting</span></a></li>
		<li><a href="/search/Commercial/"><span>Commercial</span></a></li>
		<li><a href="/lists/"><span>Mailing Lists</span></a></li>
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
	<section id="content-left">
		{$content}
	</section>
	<aside id="content-right">
		<div id="searchbox-header">Search Properties</div>
		<div id="searchbox-body">
			<form action="/prop_search.php" method="get">
				<table>
					<tr>
						<td><label>Property Type: </label></td>
						<td>
							<select name="proptype">
								<option value="Any">Any</option>
								<option value="Detached">Detached</option>
								<option value="Semi-Detached">Semi-Detached</option>
								<option value="Terrace">Terrace</option>
								<option value="Flat">Flat</option>
								<option value="Bungalow">Bungalow</option>
								<option value="Rental">Rental</option>
								<option value="Commercial">Commercial</option>
								<option value="Building Plot/Barns">Building Plot/Barn</option>
								<option value="Paddock">Land</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Bedrooms (Min): </label></td>
						<td>
							<select name="bedrooms">
								<option value="0">No Min</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7 or more</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Minimum Price: </label></td>
						<td>
							<select name="minprice">
								<option value="1">No Min</option>
								<option value="50000">&pound;50,000</option>
								<option value="60000">&pound;60,000</option>
								<option value="70000">&pound;70,000</option>
								<option value="80000">&pound;80,000</option>
								<option value="90000">&pound;90,000</option>
								<option value="100000">&pound;100,000</option>
								<option value="110000">&pound;110,000</option>
								<option value="120000">&pound;120,000</option>
								<option value="130000">&pound;130,000</option>
								<option value="140000">&pound;140,000</option>
								<option value="150000">&pound;150,000</option>
								<option value="160000">&pound;160,000</option>
								<option value="170000">&pound;170,000</option>
								<option value="180000">&pound;180,000</option>
								<option value="190000">&pound;190,000</option>
								<option value="200000">&pound;200,000</option>
								<option value="220000">&pound;225,000</option>
								<option value="250000">&pound;250,000</option>
								<option value="270000">&pound;275,000</option>
								<option value="300000">&pound;300,000</option>
								<option value="325000">&pound;325,000</option>
								<option value="350000">&pound;350,000</option>
								<option value="375000">&pound;375,000</option>
								<option value="400000">&pound;400,000</option>
								<option value="425000">&pound;425,000</option>
								<option value="450000">&pound;450,000</option>
								<option value="475000">&pound;475,000</option>
								<option value="500000">&pound;500,000</option>
								<option value="525000">&pound;525,000</option>
								<option value="550000">&pound;550,000</option>
								<option value="575000">&pound;575,000</option>
								<option value="600000">&pound;600,000</option>
								<option value="625000">&pound;625,000</option>
								<option value="650000">&pound;650,000</option>
								<option value="675000">&pound;675,000</option>
								<option value="700000">&pound;700,000</option>
								<option value="725000">&pound;725,000</option>
								<option value="750000">&pound;750,000</option>
								<option value="775000">&pound;775,000</option>
								<option value="800000">&pound;800,000</option>
								<option value="825000">&pound;825,000</option>
								<option value="850000">&pound;850,000</option>
								<option value="875000">&pound;875,000</option>
								<option value="900000">&pound;900,000</option>
								<option value="925000">&pound;925,000</option>
								<option value="950000">&pound;950,000</option>
								<option value="975000">&pound;975,000</option>
								<option value="1000000">&pound;1,000,000</option>
								<option value="1250000">&pound;1,250,000</option>
								<option value="1500000">&pound;1,500,000</option>
								<option value="1750000">&pound;1,750,000</option>
								<option value="2000000">&pound;2,000,000</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Maximum Price: </label></td>
						<td>
							<select name="maxprice">
								<option value="0">No Max</option>
								<option value="50000">&pound;50,000</option>
								<option value="60000">&pound;60,000</option>
								<option value="70000">&pound;70,000</option>
								<option value="80000">&pound;80,000</option>
								<option value="90000">&pound;90,000</option>
								<option value="100000">&pound;100,000</option>
								<option value="110000">&pound;110,000</option>
								<option value="120000">&pound;120,000</option>
								<option value="130000">&pound;130,000</option>
								<option value="140000">&pound;140,000</option>
								<option value="150000">&pound;150,000</option>
								<option value="160000">&pound;160,000</option>
								<option value="170000">&pound;170,000</option>
								<option value="180000">&pound;180,000</option>
								<option value="190000">&pound;190,000</option>
								<option value="200000">&pound;200,000</option>
								<option value="220000">&pound;225,000</option>
								<option value="250000">&pound;250,000</option>
								<option value="270000">&pound;275,000</option>
								<option value="300000">&pound;300,000</option>
								<option value="325000">&pound;325,000</option>
								<option value="350000">&pound;350,000</option>
								<option value="375000">&pound;375,000</option>
								<option value="400000">&pound;400,000</option>
								<option value="425000">&pound;425,000</option>
								<option value="450000">&pound;450,000</option>
								<option value="475000">&pound;475,000</option>
								<option value="500000">&pound;500,000</option>
								<option value="525000">&pound;525,000</option>
								<option value="550000">&pound;550,000</option>
								<option value="575000">&pound;575,000</option>
								<option value="600000">&pound;600,000</option>
								<option value="625000">&pound;625,000</option>
								<option value="650000">&pound;650,000</option>
								<option value="675000">&pound;675,000</option>
								<option value="700000">&pound;700,000</option>
								<option value="725000">&pound;725,000</option>
								<option value="750000">&pound;750,000</option>
								<option value="775000">&pound;775,000</option>
								<option value="800000">&pound;800,000</option>
								<option value="825000">&pound;825,000</option>
								<option value="850000">&pound;850,000</option>
								<option value="875000">&pound;875,000</option>
								<option value="900000">&pound;900,000</option>
								<option value="925000">&pound;925,000</option>
								<option value="950000">&pound;950,000</option>
								<option value="975000">&pound;975,000</option>
								<option value="1000000">&pound;1,000,000</option>
								<option value="1250000">&pound;1,250,000</option>
								<option value="1500000">&pound;1,500,000</option>
								<option value="1750000">&pound;1,750,000</option>
								<option value="2000000">&pound;2,000,000</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><input type="submit" value="Search" /></td><td>&nbsp;</td>
					</tr>
				</table>
			</form>
		</div>
	</aside>
{/block}