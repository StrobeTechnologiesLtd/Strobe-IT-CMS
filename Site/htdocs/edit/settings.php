<?php # settings.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: settings.php
 * Version: 1.0
 */
// This page displays the settings screen


	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	checkSecurity($pdo, $user, "Settings");
		
	$smarty->assign('title', 'CMS Control Panel - Settings');
	$smarty->assign('content', '<p><a href="settings-security_list.php">Security Settings</a><br /><a href="settings-style_list.php">Style</a></p>');
		

	$smarty->display('index.tpl');
?>