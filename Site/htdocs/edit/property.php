<?php # vehicle.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: vehicle.php
 * Version: 1.0
 */
// This page displays the Vehicle Modules


	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	//checkSecurity($pdo, $user, "Settings");
		
	$smarty->assign('title', 'CMS Control Panel - Vehicle Module');
	$smarty->assign('content', '
	<h1>Property Module</h1>
	<p>Please section the required function from the below list.</p>
	<ul>
		<li><a href="property_new.php">New Property</a></li>
		<li><a href="property_list.php">View / Edit Properties</a></li>
	</ul>
	');
		

	$smarty->display('index.tpl');
?>