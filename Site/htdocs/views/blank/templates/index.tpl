 {**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: index.tpl
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
	</ul>
{/block}
{block name=sitesubnav}
	<ul>
		{foreach $sitesubnav as $subnav}
		{strip}
		<li><a href="index.php?id={$subnav.id}"><span>{$subnav.title}</span></a></li>
		{/strip}
		{/foreach}
	</ul>
{/block}
{block name=body}{$content}{/block}