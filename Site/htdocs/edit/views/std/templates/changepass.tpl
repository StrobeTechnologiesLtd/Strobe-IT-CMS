 {**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: changepass.tpl
 * Version: 1.0
 *}

{* Load / Extend the main template *}
{extends file="master.tpl"}

{* Set / Populate the HTML page properties *}
{block name=title}{$title}{/block}

{* Populate the site with content *}
{block name=rightbody}
<p>Change Password for {$username}</p>
<form method="post" action="">
    {$msg}
    <p>Please fillout the following form: -</p>
    <p><label for="oldpassword">Old Password: </label>
        <input type="password" name="oldpassword" />
        <br />
        <label for="password">Password: </label>
        <input type="password" name="password" />
        <br />
        <label for="repassword">Re-type Password: </label>
        <input type="password" name="repassword" />
        <br /><br />
        <input type="submit" id="submit" value="Change Password" name="submit" />
    </p>
</form>
{/block}