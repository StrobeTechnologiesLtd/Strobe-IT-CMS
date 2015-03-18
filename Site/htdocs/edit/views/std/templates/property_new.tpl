 {**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: property_new.tpl
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

<table border='0' width='600' align='center' cellpadding="1" cellspacing="0">
  <tr>
	<td colspan='4'><br><b><u>Property Details:</u></b></td>
  </tr>	
  <tr bgcolor='#CCCCCC'>
    <td align='left' colspan='2'>
      Property Name:<br>
      <input type='text' name='PROP_NAME' size='50' value='{$form_PROP_NAME}'><br>
    </td>
	<td align='right'>
      Show Name:
    </td>
	<td align='left'>
		{html_checkboxes name='PROP_SHOW_NAME' options=$prop_show_name_checkboxes selected=$prop_show_name_checked separator='<br />'}
	</td>

   </tr>
   <tr bgcolor='#CCCCCC'>
     <td align='left' colspan='2'>
       Property Address:</b><br>
       <input type='text' name='PROP_ADDRESS' size='50' value='{$form_PROP_ADDRESS}'><br>
     </td>
	 <td align='right'>
      Ref:
     </td>
	 <td align='left'>
       <input type='text' name='PROP_REF' size='5' value='{$form_PROP_REF}'>
     </td>
  </tr>

  <tr bgcolor='#CCCCCC'>
    <td colspan='2'>
      Price: <br>

<!-- PRICE PREFIX -->

{html_options name=PROP_PRICE_PREFIX options=$prop_price_prefix_options selected=$prop_price_prefix_selected}

<!-- PRICE -->

<input type='number' name='PROP_PRICE' size='10' value='{$form_PROP_PRICE}'>&nbsp;&nbsp;

<!-- PROPERTY TENURE --> 

		{html_options name=PROP_TENURE options=$prop_tenure_options selected=$prop_tenure_selected}
		<br>
      </td>
	  <td align='right'>
		PostCode:
	  </td>
	  <td align='left'>
		<input type='text' name='PROP_POSTCODE' size='10' value='{$form_PROP_POSTCODE}'><br>
	  </td>
	</tr>
	<tr bgcolor='#CCCCCC'>
	  <td colspan="2">
		Price Text:<br>
		<input type='text' name='PROP_PRICE_TEXT' size='50' value='{$form_PROP_PRICE_TEXT}'><br>
	  </td>
	  <td align='right'>
		&nbsp;
	  </td>
	  <td>
		&nbsp;
	  </td>
	</tr>
    <tr bgcolor='#CCCCCC'>
	  <td align='left'>Property Type:<br>

        {html_options name=PROP_HOUSE_TYPE options=$prop_house_type_options selected=$prop_house_type_selected}
      </td>
      <td>Property Status:<br>
	    {html_options name=PROP_STATUS options=$prop_status_options selected=$prop_status_selected}
	  </td>
      <td align='right'>No. of Bedrooms: </td>
	  <td align='left' >
	    <input type='text' name='PROP_BED' size='2' value='{$form_PROP_BED}'>
	  </td>
	</tr>	
    <tr bgcolor='#CCCCCC'>
	  <td align='left'>
	    Condition of Property:<br>
	      {html_options name=PROP_CONDITION options=$prop_condition_options selected=$prop_condition_selected}
	  </td>	
	  <td align='left'>Copyright:<br>
	      {html_options name=PROP_COPYRIGHT options=$prop_copyright_options selected=$prop_copyright_selected}
	  </td>
	  <td align='right'>
	    Added&nbsp;<br><font size='1'>(DD/MM/YY) needed??</font>:<br>
	  </td>
	  <td align='left'>
	    <input type='text' name='add' value='06' size='1' ><input type='text' name='adm' value='09' size='1' ><input type='text' name='ady' value='2013' size='4' >
	  </td>
	</tr>	
	<tr>
	  <td colspan='4'><br><b><u>Website Portals:</u></b></td>
	</tr>	
    <tr bgcolor='#CCCCCC'><td align='left'>Fish 4: 
      {html_options name=PROP_FISH options=$prop_fish_options selected=$prop_fish_selected}
	</td>
	<td>RightMove: 
	  {html_options name=PROP_RIGHTMOVE options=$prop_rightmove_options selected=$prop_rightmove_selected}
	</td>
	<td colspan='2'>Coming Soon: 
	  {html_options name=PROP_COMING_SOON options=$prop_coming_soon_options selected=$prop_coming_soon_selected}
	</td>
  </tr>
	<tr>
	  <td colspan="4"><br><b><u>Energy Performance Cert (EPC):</u></b></td>
    </tr>	
	<tr bgcolor="#CCCCCC">
	  <td align='left' colspan="2">
	  Energy Efficiency Rating<br>
	  Cur:<input type='text' name='PROP_EER_CUR' size='3' maxlength='3' value='{$form_PROP_EER_CUR}'> | 
	  Pot:<input type='text' name='PROP_EER_POT' size='3' maxlength='3' value='{$form_PROP_EER_POT}'><br>
	  Environmental Impact Rating<br> 
	  Cur:<input type='text' name='PROP_EIR_CUR' size='3' maxlength='3' value='{$form_PROP_EIR_CUR}'> | 
	  Pot:<input type='text' name='PROP_EIR_POT' size='3' maxlength='3' value='{$form_PROP_EIR_POT}'>
	  </td>
	  <td colspan="2" align="right">
	  
	  
	  </td>
	</tr>
    <tr  bgcolor="#CCCCCC">
	  <td colspan="4">
	  	  
	  </td>
    </tr>	
    <tr>
	  <td colspan='4'><br>
	     Summary Details:<br>
		<textarea name="PROP_SUMMARY" id="PROP_SUMMARY">{$form_PROP_SUMMARY}</textarea>
	<br>
	Detailed Description:<BR>
	<textarea name="PROP_DETAILED" id="PROP_DETAILED">{$form_PROP_DETAILED}</textarea>
	
	</table>
  </table>

			
	<p>
		<input type="submit" value="Publish" />
	</p>
</form>
{/block}