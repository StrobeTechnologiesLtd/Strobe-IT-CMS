<?php # page_listauth.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: page_listauth.php
 * Version: 1.0
 */
// This page displays the list of pages screen

	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	checkSecurity($pdo, $user, "Page - List Page Approval");
	
	try {
		// SQL to retrieve page list:
		$q = 'SELECT id, title, pageid FROM SIT_pages_auth';
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute();
		
		// Set Page Title:
		$smarty->assign('title', 'CMS Control Panel - Authorisation Page List');
		
		// If the query ran okay, fetch the records into an array
		if ($r) {
			$pagelist = $stmt->fetchall();
			$smarty->assign('pagelist', $pagelist);
		} else {
			$smarty->assign('msg', '<h1>No Pages</h1><p>There are no pages to display.</p>');
		} //End of $r check IF
	} catch (Exception $e) {
		$smarty->assign('title', 'Error - Displaying Page');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error which has prevented us from displaying the pages: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
		exit();
	} //End of Try Catch
	
	$smarty->display('page_listauth.tpl');
?>