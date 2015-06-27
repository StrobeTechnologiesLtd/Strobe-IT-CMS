 {**
 * Project: Strobe IT CMS Devco Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: master.tpl
 * Version: 1.0
 *}
 
 
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta name="author" content="Strobe IT - www.strobe-it.co.uk" />
	<meta name="copyright" content="2012&copy; www.strobe-it.co.uk" />
	<meta name="owner" content="Mr Drew - Devco Mobile Vehicles Services Ltd" />

	<meta name="distribution" content="web" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="robots" content="INDEX,FOLLOW" />
	<meta name="Keywords" content="{block name=keywords}Default Keywords{/block}" />
	<meta name="Description" content="{block name=description}Default Description{/block}" />

	<link rel="stylesheet" href="{$__cssDir}main.css" type="text/css" />
	<link rel="stylesheet" href="{$__cssDir}print.css" type="text/css" media="print" />
	<link rel="icon" href="{$__imgDir}favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="{$__imgDir}favicon.ico" type="image/x-icon" />
	<title>{block name=title}Default Title{/block}</title>
	
	<!--<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" /> -->
	<!--<script type="text/javascript" src="JAVA/csspopup.js"></script>-->
	<!--<script type="text/javascript" src="js/prototype.js"></script>-->
	<!--<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>-->
	<!--<script type="text/javascript" src="js/lightbox.js"></script>-->
</head>

<body>
<div id="blanket" style="display:none;">
</div>
<div id="testdrive" class="emailform" style="display:none;">
	<h2>Request a Test Drive</h2>
    <form action="<?php echo $template; ?>enquiry_process.php" method="post">
		<input type="hidden" name="subject" value="Test Drive - Web Form" />
		<table>
			<tr>
				<td>Name:</td><td><input name="name" type="text" size="20" maxlength="40" value="" /></td><td>&nbsp;</td>
			</tr>
			<tr>
				<td>e-mail Address:</td><td><input name="email" type="text" size="20" maxlength="40" value="" /></td><td>&nbsp;</td>
			</tr>
			<tr>
				<td>Telephone No.:</td><td><input name="telno" type="text" size="20" maxlength="20" value="" /></td><td>&nbsp;</td>
			</tr>
			<tr>
				<td><select name="day"><option>Day</option>
					<?php
						$day=1;
						while ($day <= 31) {
							echo '<option value="'.$day.'">'.$day.'</option>';
							$day++;
						}
					?>
				</select></td>
				<td><select name="month"><option>Month</option>
					<option value="January">January</option>
					<option value="Febuary">Febuary</option>
					<option value="March">March</option>
					<option value="April">April</option>
					<option value="May">May</option>
					<option value="June">June</option>
					<option value="July">July</option>
					<option value="August">August</option>
					<option value="September">September</option>
					<option value="October">October</option>
					<option value="November">November</option>
					<option value="December">December</option>
				</select></td>
				<td><select name="year"><option>Year</option>
					<?php
						$EndYear=$Year+3;
						while ($Year <= $EndYear) {
							echo '<option value="'.$Year.'">'.$Year.'</option>';
							$Year++;
						}
					?>
				</select></td>
			</tr>
		</table>
		<textarea name="details" rows="3" cols="80" style="width: 90%">
Please let us know the details of your request.
		</textarea>
		<input type="text" name="captcha_code" size="10" maxlength="6" /> &nbsp;
		<img id="captcha" src="<?php echo $template; ?>securimage/securimage_show.php" alt="CAPTCHA Image" height="55px" />
		<br /><br />
		&nbsp; <input type="submit" value="Submit Request" />
	</form>
	&nbsp; <button onclick="popup('testdrive', '0', '0')">Cancel</button>
</div>
<div id="bookservice" class="emailform" style="display:none;">
	<h2>Book a Service</h2>
    <form action="<?php echo $template; ?>enquiry_process.php" method="post">
		<input type="hidden" name="subject" value="Service Booking - Web Form" />
		<table>
			<tr>
				<td>Name:</td><td><input name="name" type="text" size="20" maxlength="40" value="" /></td><td>&nbsp;</td>
			</tr>
			<tr>
				<td>e-mail Address:</td><td><input name="email" type="text" size="20" maxlength="40" value="" /></td><td>&nbsp;</td>
			</tr>
			<tr>
				<td>Telephone No.:</td><td><input name="telno" type="text" size="20" maxlength="20" value="" /></td><td>&nbsp;</td>
			</tr>
			<tr>
				<td><select name="day"><option>Day</option>
					<?php
						$day=1;
						while ($day <= 31) {
							echo '<option value="'.$day.'">'.$day.'</option>';
							$day++;
						}
					?>
				</select></td>
				<td><select name="month"><option>Month</option>
					<option value="January">January</option>
					<option value="Febuary">Febuary</option>
					<option value="March">March</option>
					<option value="April">April</option>
					<option value="May">May</option>
					<option value="June">June</option>
					<option value="July">July</option>
					<option value="August">August</option>
					<option value="September">September</option>
					<option value="October">October</option>
					<option value="November">November</option>
					<option value="December">December</option>
				</select></td>
				<td><select name="year"><option>Year</option>
					<?php
						$EndYear=$Year+3;
						while ($Year <= $EndYear) {
							echo '<option value="'.$Year.'">'.$Year.'</option>';
							$Year++;
						}
					?>
				</select></td>
			</tr>
		</table>
		<textarea name="details" rows="3" cols="80" style="width: 90%">
Please let us know the details of your request.
		</textarea>
		<input type="text" name="captcha_code" size="10" maxlength="6" /> &nbsp;
		<img id="captcha" src="<?php echo $template; ?>securimage/securimage_show.php" alt="CAPTCHA Image" height="55px" />
		<br /><br />
		&nbsp; <input type="submit" value="Submit Request" />
	</form>
	&nbsp; <button onclick="popup('bookservice', '0', '0')">Cancel</button>
</div>
<div id="wrapper">
	<div id="page-header">
		<div id="menu-logo">
			<a href="/">Home</a> &nbsp; | &nbsp; <a href="#" onclick="popup('testdrive', '520', '570')">Request a Test Drive</a> &nbsp; | &nbsp; <a href="contact.php">Contact Us</a> &nbsp; | &nbsp; <a href="#" onclick="popup('bookservice', '520', '570')">Book a Service</a>
		</div>
		<div id="logo"><img src="{$__imgDir}D_Logo.png" alt="Devco M.V.S. Ltd" /></div>
		<div id="ren-logo"><img src="{$__imgDir}R_Logo.gif" alt="Renault Logo" /></div>
		<div id="con-logo">
			<p>Telephone: 01884 254318<br />
				Kennedy Way, Tiverton. Devon. EX16 6RZ</p>
		</div>
		<p>&nbsp;</p>
		<div id="webmenu">
		{block name=sitenav}
			<ul>
				<li><a href="inventory.php?vehicle=CAR">Cars</a></li>
				<li><a href="inventory.php?vehicle=VAN">Vans</a></li>
				<li><a href="aftersales.php">Aftersales</a></li>
				<li><a href="specials.php">Latest Offers</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="finance.php">Finance</a></li>
				<li><a href="opportunities.php">Opportunities</a></li>
			</ul>
		{/block}
		</div>
		<div id="webmenu2"><img src="{$__imgDir}bg_header-full.png" alt="Devco / Renault Colours banner" /></div>
	</div> 
 
	<div id="page-body">
		<div id="sidemenu">
			<p>&nbsp;</p>
			<div id="carsearch">
				<img src="{$__imgDir}vehiclesearch.gif" alt="Vehicle Search" />
				<form action="/search/vehicle/" method="post">
					<p>&nbsp;&nbsp;Car<input type="radio" name="vtype" value="car" />&nbsp;
					&nbsp;Van<input type="radio" name="vtype" value="van" /></p>
					<p>&nbsp; Make: 
						<select name="vmake">
							<option value="All">All</option>
							{html_options values=$make_values output=$make_names}
						</select>
					<br />
					&nbsp; Minimum Price: 
						<select name="minprice">
							{html_options values=$price_min_values output=$price_min_names}
						</select>
					<br />
					&nbsp; Maximum Price: 
						<select name="maxprice">
							{html_options values=$price_max_values output=$price_max_names}
						</select>
					</p>
					<p><input type="image" src="{$__imgDir}vehiclesearchbut.gif" alt="Search" /></p>
				</form>
			</div>
			<div id="carsearch-bot"></div>
		</div>
		<div id="main-body">
			{block name=body}Default Content{/block}
		</div>
	</div>
<!-- END: Main Body / Pages --> 
 
<!-- Below was in footer.php -->
	<div id="page-footer">
		<p>&nbsp;</p><p>&nbsp;</p>
		<p>&copy; 2015 <strong>Strobe IT</strong> |
		Design by <a href="http://www.strobe-it.co.uk/">Strobe IT</a> |
		Valid <a href="http://validator.w3.org/check/referer">XHTML</a> |
		<a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
		</p>
	</div>
</div>
</body>

</html>