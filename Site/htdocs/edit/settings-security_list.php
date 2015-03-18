<?php # settings-security_list.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: settings-security_list.php
 * Version: 1.0
 */
// This page displays the list of security settings screen

	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	//Code / function to check user security level
	
	try {
		// SQL to retrieve security list:
		$q = 'SELECT id, securityno, description, settings FROM SIT_security';
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute();
		
		// Set Page Title:
		$smarty->assign('title', 'CMS Control Panel - Security List');
		
		// If the query ran okay, fetch the records into an array
		if ($r) {
			$securitylist = $stmt->fetchall();
			$smarty->assign('securitylist', $securitylist);
		} else {
			$smarty->assign('msg', '<h1>No Security Groups</h1><p>There are no security groups to display.</p>');
		} //End of $r check IF
	} catch (Exception $e) {
		$smarty->assign('title', 'Error - Displaying Page');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error which has prevented us from displaying the security groups: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
		exit();
	} //End of Try Catch
	
	$smarty->display('settings-security_list.tpl');
?>