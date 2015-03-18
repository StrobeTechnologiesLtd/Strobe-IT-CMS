<?php # changepass.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: changepass.php
 * Version: 1.0
 */
// This page displays the change password screen & changes the password if necessary

	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);

	
	try {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
			// Set New Password:
			$newpass = $user->setPassword($_POST['oldpassword'], $_POST['password'], $_POST['repassword'], $user_minpasslen);
			
			// Check New Password Excepted:
			if ($newpass == 'SUCCESS') {
				// SQL to update record:
				$q = 'UPDATE SIT_users SET pass=:password WHERE id=:id';
				$stmt = $pdo->prepare($q);
				$r = $stmt->execute(array(':password' => $user->getPassword(), ':id' => $user->getId()));
						
				if ($r) {
					// Update session with new data:
					$_SESSION['user'] = $user;
							
					// Set Smarty details:
					$smarty->assign('title', 'CMS Control Panel - Change Password');
					$smarty->assign('msg', '<h1>Success!</h1><p>Your password has been changed successfully.</p>');
				} else {
					throw new Exception('There has been an error updating your password.');
				} //End of $r check IF
			} else {
				// display error:
				$smarty->assign('title', 'Error');
				$smarty->assign('msg', '<h1>Error</h1><p>There has been an error which has prevented you from changing your password: -</p><p>' . $newpass . '</p>');
			} //End of $newpass check IF
		} else {
			$smarty->assign('title', 'CMS Control Panel - Change Password');
		} //End of POST check IF
	} catch (Excpton $e) {
		$smarty->assign('title', 'Error - Changing Password');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error which has prevented you from changing your password: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
		exit();
	}
	$smarty->assign('username', $user->getUsername());
	$smarty->display('changepass.tpl');
?>