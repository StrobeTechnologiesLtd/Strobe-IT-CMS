 {**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: page_edit.tpl
 * Version: 1.0
 *}

{* Load / Extend the main template *}
{extends file="page_new.tpl"}

{* Populate the site with content *}
{block name=authchange}
<?php if ($_SESSION['securelevel']==10) { ?>
   <p>
		<label for="date">Change the date?</label>
		<input type="checkbox" name="date" value="1" />
    </p>
    
    <p>
		<label for="auth">Authorise Changes?</label>
		<input type="checkbox" name="auth" value="1" />
    </p>
	<?php } ?>
{/block}