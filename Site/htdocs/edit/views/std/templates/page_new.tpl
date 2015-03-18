 {**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: page_new.tpl
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
		<label for="title">Title:</label>
		<input name="title" id="title" type="text" maxlength="150" value="{$form_title}" />
	</p>
	
	<p>
		<label for="url">URL:</label>
		<input name="url" id="url" type="text" maxlength="150" value="{$form_url}" />
	</p>
	
   <p>
		<label for="description">Page Description:</label>
		<input name="description" id="description" type="text" maxlength="150" value="{$form_description}" />
	</p>
	
	<p>
		<label for="keywords">Keywords for Search:</label>
		<input name="keywords" id="keywords" type="text" maxlength="150" value="{$form_keywords}" />
	</p>
			
	<p>
		<label for="body">Body Text:</label>
		<textarea name="body" id="body">{$form_body}</textarea>
	</p>

    <p>
        <label for="subpage">Sub Page:</label>
		{html_options name=subpage options=$subpage_options selected=$subpage_select}
        <!--<select name="subpage">
            <option value="0" selected="selected">FALSE</option>
            <option value="1">TRUE</option>
        </select>-->
    </p>

    <p>
        <label for="subid">Sub Page Of:</label>
        <select name="subid">
            <!--<option value="0">Select Page</option>-->
            {html_options values=$subpages_value options=$subpages_option selected=$subpage_selected}
        </select>
    </p>
	
	{block name=authchange}{/block}
			
	<p>
		<input type="submit" value="Publish" />
	</p>
</form>
{/block}