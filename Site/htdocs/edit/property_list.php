<?php # property_list.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: property_list.php
 * Version: 1.0
 */
// This page displays the list of properties screen

	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	//checkSecurity($pdo, $user, "Page - List Properties");
	
	try {
		// SQL to retrieve property list:
		//$q = 'SELECT PROP_REF, PROP_NAME, PROP_STATUS, PROP_PRICE, PROP_KEY FROM PROPERTY ORDER BY PROP_Price ASC';
		$q = 'SELECT PROP_REF, PROP_NAME, PROP_STATUS, PROP_PRICE, PROP_KEY FROM PROPERTY';
		if ($_GET['propertyref'] <> "") {$q .= ' WHERE (PROP_REF = '. $_GET['propertyref'] .')';}
		if ($_GET['propertyname'] <> "") { $q .= ' WHERE (PROP_NAME LIKE '. $_GET['propertyname'] .')';}
		$q .= ' ORDER BY PROP_Price ASC';
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute();
		
		// Set Page Title:
		$smarty->assign('title', 'CMS Control Panel - Property List');
		
		// If the query ran okay, fetch the records into an array
		if ($r) {
			$propertylist = $stmt->fetchall();
			$smarty->assign('propertylist', $propertylist);
		} else {
			$smarty->assign('msg', '<h1>No Properties</h1><p>There are no properties to display.</p>');
		} //End of $r check IF
	} catch (Exception $e) {
		$smarty->assign('title', 'Error - Displaying Page');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error which has prevented us from displaying the properties: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
		exit();
	} //End of Try Catch
	
	$smarty->assign('formaction', $_SERVER['PHP_SELF']);
	$smarty->display('property_list.tpl');
?>