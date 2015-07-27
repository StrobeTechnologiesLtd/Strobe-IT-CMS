 {**
 * Project: devco Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: car_search.tpl
 * Version: 1.0
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
	{$pagenav}
	{foreach $vehlist as $veh}
	{strip}
	<div class="carstrip-top"></div>
	<div class="carstrip">
		<table>
			<tr>
				<td colspan="2"><span class="car_label">{$veh.minidescription}</span></td>
				{**<td>&nbsp;</td>**}
				<td><span class="car_label">&pound;{$veh.price|number_format:0:".":","}</span></td>
			</tr>
			<tr>
				<td>
					{assign var="displayed" value="NO"}
				
					{if $veh.special == "SPECIAL" && $displayed == "NO"}
						<img src="{$__imgDir}car-box_special.png" alt="Special Box" class="CarBoxSpecial" />
						{foreach $fileext as $ext}
							{assign var="pic" value="$fullpath/modules/car/vehicles/c{$veh.id}p1.{$ext}"}
							{if file_exists($pic)}
								{assign var="displayed" value="YES"}
								<img src="/thumb.php?pic=c{$veh.id}p1.JPG&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" alt="{$veh.make} {$veh.model}" width="150px" height="113px" class="CarBox" />
							{/if}
						{/foreach}
					{/if}
					
					{if $veh.special == "SOLD" && $displayed == "NO"}
						<img src="{$__imgDir}car-box_sold.png" alt="Sold Box" class="CarBoxSpecial" />
						{foreach $fileext as $ext}
							{assign var="pic" value="$fullpath/modules/car/vehicles/c{$veh.id}p1.{$ext}"}
							{if file_exists($pic)}
								{assign var="displayed" value="YES"}
								<img src="/thumb.php?pic=c{$veh.id}p1.JPG&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" alt="{$veh.make} {$veh.model}" width="150px" height="113px" class="CarBox" />
							{/if}
						{/foreach}
					{/if}
					
					{if $veh.special == "NONE" && $displayed == "NO"}
						{foreach $fileext as $ext}
							{assign var="pic" value="$fullpath/modules/car/vehicles/c{$veh.id}p1.{$ext}"}
							{if file_exists($pic)}
								{assign var="displayed" value="YES"}
								<img src="/thumb.php?pic=c{$veh.id}p1.{$ext}&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" alt="{$veh.make} {$veh.model}" width="150px" height="113px" />
							{/if}
						{/foreach}
					{else}
						{if $displayed == "NO"}
							{foreach $fileext as $ext}
								{assign var="pic" value="$fullpath/modules/car/vehicles/c{$veh.id}p1.{$ext}"}
								{if file_exists($pic)}
									{assign var="displayed" value="YES"}
									<img src="/thumb.php?pic=c{$veh.id}p1.{$ext}&amp;path=modules/car/vehicles&amp;width=150&amp;height=113" alt="{$veh.make} {$veh.model}" width="150px" height="113px" />
								{/if}
							{/foreach}
						{/if}
					{/if}
				</td>
				<td>
					<table>
						<tr>
							<td><span class="car_label">Make:</span></td>
							<td>{$veh.make}</td>
							<td>&nbsp;</td>
							<td><span class="car_label">Model:</span></td>
							<td>{$veh.model}</td>
						</tr>
						<tr>
							<td><span class="car_label">Year:</span></td>
							<td>{$veh.year}</td>
							<td>&nbsp;</td>
							<td><span class="car_label">Mileage:</span></td>
							<td>{$veh.miles}</td>
						</tr>
						<tr>
							<td><span class="car_label">Fuel:</span></td>
							<td>{$veh.fuel}</td>
							<td>&nbsp;</td>
							<td><span class="car_label">Transmission:</span></td>
							<td>{$veh.transmission}</td>
						</tr>
						<tr>
							<td><span class="car_label">Colour:</span></td>
							<td>{$veh.colour}</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><a href="/details/vehicle/{$veh.inven_num}/"><img src="{$__imgDir}details.gif" alt="Details" /></a></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
	<div class="carstrip-bottom"></div>
	{/strip}
	{/foreach}
	{$pagenav}
{/block} 