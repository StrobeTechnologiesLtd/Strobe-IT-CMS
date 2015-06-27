<?php # car_list.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: car_list.php
 * Version: 1.0
 */
// This page displays the list of car screen

	// Need the utilities file:
	require($_SERVER['DOCUMENT_ROOT'] . '/edit/includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	//checkSecurity($pdo, $user, "Page - List Properties");
	
	try {
		// SQL to retrieve vehicle list:
		$q = 'SELECT id, inven_num, make, model, year, price FROM SIT_car_cars';
		if ($_GET['carinv'] <> "") { $q .= ' WHERE (inven_num = "'. $_GET['carinv'] .'")'; }
		if ($_GET['carmake'] <> "") { $q .= ' WHERE (make LIKE "'. $_GET['carmake'] .'")'; }
		$q .= ' ORDER BY price ASC';
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute();
		
		// Set Page Title:
		$smarty->assign('title', 'CMS Control Panel - Car List');
		
		// If the query ran okay, fetch the records into an array
		if ($r) {
			$carlist = $stmt->fetchall();
			$smarty->assign('carlist', $carlist);
		} else {
			$smarty->assign('msg', '<h1>No Vehicles</h1><p>There are no vehicles to display.</p>');
		} //End of $r check IF
	} catch (Exception $e) {
		$smarty->assign('title', 'Error - Displaying Page');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error which has prevented us from displaying the vehicles: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
		exit();
	} //End of Try Catch
	
	$smarty->assign('formaction', $_SERVER['PHP_SELF']);
	$smarty->display('mod/car/car_list.tpl');
?>