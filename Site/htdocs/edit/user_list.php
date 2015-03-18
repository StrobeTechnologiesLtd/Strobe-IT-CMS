<?php # user_list.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: user_list.php
 * Version: 1.0
 */
// This page displays the list of users screen

	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	checkSecurity($pdo, $user, "User - List Users");
	
	try {
		// SQL to retrieve user list:
		$q = 'SELECT id, username, firstname, surname, logontime FROM SIT_users';
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute();
		
		// Set Page Title:
		$smarty->assign('title', 'CMS Control Panel - User List');
		
		// If the query ran okay, fetch the records into an array
		if ($r) {
			$userlist = $stmt->fetchall();
			$smarty->assign('userlist', $userlist);
		} else {
			$smarty->assign('msg', '<h1>No Users</h1><p>There are no users to display.</p>');
		} //End of $r check IF
	} catch (Exception $e) {
		$smarty->assign('title', 'Error - Displaying Page');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error which has prevented us from displaying the users: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
		exit();
	} //End of Try Catch
	
	$smarty->display('user_list.tpl');
?>