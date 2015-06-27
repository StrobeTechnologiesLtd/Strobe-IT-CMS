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
	require($_SERVER['DOCUMENT_ROOT'] . '/edit/includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	//checkSecurity($pdo, $user, "Settings");
		
	$smarty->assign('title', 'CMS Control Panel - Car Module');
	$smarty->assign('content', '
	<h1>Car Module</h1>
	<p>Please section the required function from the below list.</p>
	<ul>
		<li><a href="car_new.php">New Car</a></li>
		<li><a href="car_list.php">View / Edit Car</a></li>
		<li><a href="car_year.php">Registration Year</a></li>
		<li><a href="car_manufacture.php">Car Manufacture</a></li>
		<li><a href="car_feature.php">Car Feature</a></li>
		<li><a href="car_pictypes.php">Car Picture Types</a></li>
	</ul>
	');
		

	$smarty->display('index.tpl');
?>