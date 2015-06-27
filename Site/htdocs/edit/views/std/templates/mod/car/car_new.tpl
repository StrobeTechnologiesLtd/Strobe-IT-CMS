 {**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: car_new.tpl
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
	<h2>Car Details</h2>
    <table width="600" border="0" cellspacing="0" cellpadding="4">
		<tr><td colspan="5"><div align="center"><h3>Vehicle Overview</h3></div></td></tr>
		<tr>
			<td align="right" valign="top">Mini Description / Type</td>
			<td colspan="4"><input name="minidescription" type="text" size="80" value="{$minidescription}" /></td>
		</tr>
		<tr>
			<td align="right" valign="top">Vehicle Type</td>
			<td colspan="4">{html_radios name='vehicle' options=$vehtype_radios selected=$vehtype_id separator='&nbsp;&nbsp;'}</td>
		</tr>
		<tr>
			<td align="right" valign="top">Special Options</td>
			<td colspan="4">{html_radios name='special' options=$special_radios selected=$special_id separator='&nbsp;&nbsp;'}</td>
		</tr>
		<tr>
			<td align="right" valign="top">Inventory number</td>
			<td align="left" valign="top"><input name="inven_num" type="text" size="20" maxlength="20" value="{$inven_num}"/></td>
			<td>&nbsp;</td>
			<td align="right" valign="top">Reg Number?</td>
			<td>TO BE ADDED</td>
		</tr>
		<tr>
			<td align="right" valign="top">Year</td>
			<td align="left" valign="top">
				<select name="year">
					{html_options values=$year_drop__values output=$year_drop__output selected=$year_drop__selected}
				</select>
			</td>
			<td>&nbsp;</td>
			<td align="right" valign="top">Miles</td>
			<td align="left" valign="top"><input name="miles" type="text" id="miles" size="20" value="{$miles}"/></td>
		</tr>
		<tr>
			<td align="right" valign="top">Model</td>
			<td align="left" valign="top"><input name="model" type="text" size="20" maxlength="20" value="{$model}" /></td>
			<td>&nbsp;</td>
			<td align="right" valign="top">Make</td>
			<td align="left" valign="top">
				<select name="make">
					{html_options values=$make_drop__values output=$make_drop__output selected=$make_drop__selected}
				</select>
			</td>
		</tr>
		<tr>
			<td align="right" valign="top">Price</td>
			<td align="left" valign="top"><input name="price" type="text" size="20" value="{$price}"/></td>
			<td>&nbsp;</td>
			<td align="right" valign="top">VAT</td>
			<td>
				<label><input type="radio" name="VAT" value="INC" {if $vat != 'EX'} checked="checked" {/if}/>Inc</label>&nbsp;&nbsp;
				<label><input type="radio" name="VAT" value="EX" {if $vat == 'EX'} checked="checked" {/if}/>Ex</label>
			</td>
		</tr>
		<tr><td colspan="5">&nbsp;</td></tr>
		<tr><td colspan="5"><div align="center"><h3>Vehicle Details</h3></div></td></tr>
		<tr>
			<td align="right" valign="top">Fuel</td>
			<td><input name="fuel" type="text" size="20" value="{$fuel}" /></td>
			<td>&nbsp;</td>
			<td align="right" valign="top">Transmission</td>
			<td><input name="transmission" type="text" size="20" value="{$transmission}" /></td>
		</tr>
		<tr>
			<td align="right" valign="top">Colour</td>
			<td><input name="colour" type="text" size="20" value="{$colour}" /></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="right" valign="top">Feature List</td>
			<td>
				{html_checkboxes name='features' values=$feature_check__values output=$feature_check__output selected=$feature_check__selected  separator='<br />'}
			</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="right"  valign="top">Description</td>
			<td colspan="4" align="left" valign="top">
				<textarea name="txt_description" cols="50" rows="10" id="txt_description">{$txt_description}</textarea>
			</td>
		</tr>
	</table>
			
	<p>
		<input type="submit" value="Publish" />
	</p>
</form>
{/block}