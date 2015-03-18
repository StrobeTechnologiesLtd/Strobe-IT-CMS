<?php # page_deleteauth.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: page_deleteauth.php
 * Version: 1.0
 */
// This page displays the list of pages screen

	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	checkSecurity($pdo, $user, "Page - Delete Page Approval");
	
		
	// SQL to delete page
	$q = 'DELETE FROM SIT_pages_auth WHERE id=:id';
	$stmt = $pdo->prepare($q);
	$r = $stmt->execute(array(':id' => $_GET['id']));
					
	header("Location:index.php");
	exit();			
?>