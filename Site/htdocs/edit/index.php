<?php # index.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: index.php
 * Version: 1.0
 */
// This page displays the main menu / functions of the edit application

	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Send data to the template:
	$smarty->assign('title', 'CMS Control Panel');
	$smarty->assign('content', '<p>Welcome ' . $user->getFirstname() . '</p><p>Please choose from the side menu</p>');

	// Display the welcome page:
	$smarty->display('index.tpl');
?>