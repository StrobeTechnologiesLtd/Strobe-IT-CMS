<?php # filemanager.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: filemanager.php
 * Version: 1.0
 */
// This page displays the filemanager screen


	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	checkSecurity($pdo, $user, "File Manager");
		
	$smarty->assign('title', 'CMS Control Panel - File Manager');
	$smarty->assign('content', '<iframe frameborder="0" width="100%" src="plugins/kcfinder/browse.php" name="kcfinder_alone" style="height: 450px;"></iframe>');
		

	$smarty->display('index.tpl');
?>