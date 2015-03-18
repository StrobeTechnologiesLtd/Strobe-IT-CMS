{**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: settings-style_mod.tpl
 * Version: 1.0
 *}

{* Load / Extend the main template *}
{extends file="master.tpl"}

{* Set / Populate the HTML page properties *}
{block name=title}{$title}{/block}

{* Populate the site with content *}
{block name=rightbody}
<p>{$msg}</p>
<form action="{$form_action}" method="post">
	<p>
        <label for="style">Select Style:</label>
        <select name="style">
            <!--<option value="blank">blank</option>-->
            {html_options values=$style_value options=$style_option selected=$style_selected}
        </select>
    </p>
			
	<p>
		<input type="submit" name="submit" value="{$form_submitbtn}" />
	</p>
</form>
{/block}