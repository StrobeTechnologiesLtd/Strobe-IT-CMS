<?php # user_new.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: user_new.php
 * Version: 1.0
 */
// This page displays the new user screen

	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	checkSecurity($pdo, $user, "User - New User");
	
	try {
	
		// SQL to retrieve access levels:
		$q = 'SELECT securityno FROM SIT_security ORDER BY securityno ASC';
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute();
		$access_values = $stmt->fetchall(PDO::FETCH_COLUMN, 0);
			
		$q = 'SELECT description FROM SIT_security ORDER BY securityno ASC';
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute();
		$access_output = $stmt->fetchall(PDO::FETCH_COLUMN, 0);
			
		$smarty->assign('form_security__values', $access_values);
		$smarty->assign('form_security__output', $access_output);
		
			
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			// SQL to retrieve user list:
			$q = 'SELECT username FROM SIT_users WHERE username=:username';
			$stmt = $pdo->prepare($q);
			$r = $stmt->execute(array(':username' => $_POST['username']));
			$count = $stmt->rowCount();
		
			// Set Page Title:
			$smarty->assign('title', 'CMS Control Panel - Create New User');
		
			// If the query ran okay, report username already exists
			if ($count == 1) { //($r) {
				$smarty->assign('msg', '<h1>Already Exists</h1><p>The specified username already exisits.</p>');
				$smarty->assign('form_fname', $_POST['fname']);
				$smarty->assign('form_sname', $_POST['sname']);
				$smarty->assign('form_uname', $_POST['username']);
				$smarty->assign('form_mail', $_POST['mail']);
				$smarty->assign('form_security__selected', $_POST['security']);
				$smarty->assign('form_submitbtn', 'Create User');
			} else {
				//username is different so check fields and add to database
				$newuser = new User;
			
				// Set User Username:
				$r = $newuser->setUsername($_POST['username']);
				if ($r != 1) {
					$msg = $r . '<br />';
				}
			
				// Set User Firstname:
				$r = $newuser->setFirstname($_POST['fname']);
				if ($r != 1) {
					$msg .= $r . '<br />';
				}
			
				// Set User Surname:
				$r = $newuser->setSurname($_POST['sname']);
				if ($r != 1) {
					$msg .= $r . '<br />';
				}
				
				// Set User Email:
				$r = $newuser->setEmail($_POST['mail']);
				if ($r != 1) {
					$msg .= $r . '<br />';
				}
				
				// Set User Password:
				$r = $newuser->setFirstPassword($_POST['password']);
				if ($r != 1) {
					$msg .= $r . '<br />';
				}
				
				// Set User Access Level:
				$r = $newuser->setAccesslevel($_POST['security']);
				if ($r != 1) {
					$msg .= $r . '<br />';
				}
			
				if ($msg) {
					$smarty->assign('msg', $msg);
					$smarty->assign('form_fname', $_POST['fname']);
					$smarty->assign('form_sname', $_POST['sname']);
					$smarty->assign('form_uname', $_POST['username']);
					$smarty->assign('form_mail', $_POST['mail']);
					$smarty->assign('form_security__selected', $_POST['security']);
					$smarty->assign('form_submitbtn', 'Create User');
				} else {
					// SQL to insert new user:
					$q = 'INSERT INTO SIT_users (username, firstname, surname, email, pass, accesslevel) VALUES (:username, :firstname, :surname, :email, :pass, :accesslevel)';
					$stmt = $pdo->prepare($q);
					$r = $stmt->execute(array(':username' => $newuser->getUsername(), ':firstname' => $newuser->getFirstname(), ':surname' => $newuser->getSurname(), ':email' => $newuser->getEmail(), ':pass' => $newuser->getPassword(), ':accesslevel' => $newuser->getAccesslevel()));
				
					if ($r) {
						$smarty->assign('msg', 'User Added Successfully');
					} else {
						throw new Exception('There has been an error adding your new user.');
					}
				}
			} //End of $r check IF
		} else {
			$smarty->assign('title', 'CMS Control Panel - Create New User');
			$smarty->assign('form_submitbtn', 'Create User');
		} //End of POST check IF
	} catch (Exception $e) {
		$smarty->assign('title', 'Error - Displaying Page');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error which has prevented us from displaying the new users screen: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
		exit();
	} //End of Try Catch
	
	$smarty->display('user_mod.tpl');
?>