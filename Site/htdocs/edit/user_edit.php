<?php # user_edit.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: user_edit.php
 * Version: 1.0
 */
// This page displays the edit user screen

	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	checkSecurity($pdo, $user, "User - Edit User");
	
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
		
			// Set Page Title:
			$smarty->assign('title', 'CMS Control Panel - Edit User');
		
			$smarty->assign('form_fname', $_POST['fname']);
			$smarty->assign('form_sname', $_POST['sname']);
			$smarty->assign('form_uname', $_POST['username']);
			$smarty->assign('form_mail', $_POST['mail']);
			$smarty->assign('form_security__selected', $_POST['security']);
			$smarty->assign('form_submitbtn', 'Update User');
			$edituser = new User;
			
			// Set User Username:
			$r = $edituser->setUsername($_POST['username']);
			if ($r != 1) {
				$msg = $r . '<br />';
			}
			
			// Set User Firstname:
			$r = $edituser->setFirstname($_POST['fname']);
			if ($r != 1) {
				$msg .= $r . '<br />';
			}
			
			// Set User Surname:
			$r = $edituser->setSurname($_POST['sname']);
			if ($r != 1) {
				$msg .= $r . '<br />';
			}
				
			// Set User Email:
			$r = $edituser->setEmail($_POST['mail']);
			if ($r != 1) {
				$msg .= $r . '<br />';
			}
			
			if ($_POST['password']) {
				// Set User Password:
				$r = $edituser->setFirstPassword($_POST['password']);
				if ($r != 1) {
					$msg .= $r . '<br />';
				}
				$q = 'UPDATE SIT_users SET username=:username, firstname=:firstname, surname=:surname, email=:email, pass=:pass, accesslevel=:accesslevel WHERE id=:id';
			} else {
				$q = 'UPDATE SIT_users SET username=:username, firstname=:firstname, surname=:surname, email=:email, accesslevel=:accesslevel WHERE id=:id';
			}
				
			// Set User Access Level:
			$r = $edituser->setAccesslevel($_POST['security']);
			if ($r != 1) {
				$msg .= $r . '<br />';
			}
			
			if ($msg) {
				$smarty->assign('msg', $msg);
			} else {
				$stmt = $pdo->prepare($q);
				if ($_POST['password']) {
					$r = $stmt->execute(array(':username' => $edituser->getUsername(), ':firstname' => $edituser->getFirstname(), ':surname' => $edituser->getSurname(), ':email' => $edituser->getEmail(), ':pass' => $edituser->getPassword(), ':accesslevel' => $edituser->getAccesslevel(), ':id' => $_GET['id']));
				} else {
					$r = $stmt->execute(array(':username' => $edituser->getUsername(), ':firstname' => $edituser->getFirstname(), ':surname' => $edituser->getSurname(), ':email' => $edituser->getEmail(), ':accesslevel' => $edituser->getAccesslevel(), ':id' => $_GET['id']));
				}
				
				if ($r) {
					$smarty->assign('msg', 'User Updated Successfully');
				} else {
					throw new Exception('There has been an error updating selected user.');
				}
			}
		} else {
			// Form not submitted
			$q = 'SELECT id, username, firstname, surname, email, accesslevel FROM SIT_users WHERE id=:id';
			$stmt = $pdo->prepare($q);
			$r = $stmt->execute(array(':id' => $_GET['id']));
			
			// If the query ran okay, fetch the record into an object
			if ($r) {
				$stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
				$edituser = $stmt->fetch();
				
				// Confirm that it exists
				if ($edituser) {
					$smarty->assign('form_fname', $edituser->getFirstname());
					$smarty->assign('form_sname', $edituser->getSurname());
					$smarty->assign('form_uname', $edituser->getUsername());
					$smarty->assign('form_mail', $edituser->getEmail());
					$smarty->assign('form_security__selected', $edituser->getAccesslevel());
					$smarty->assign('form_submitbtn', 'Update User');
					$smarty->assign('title', 'CMS Control Panel - Edit User');
					$smarty->assign('msg', 'Leave password blank if not resetting it.');
					$smarty->assign('form_action', $_SERVER['PHP_SELF'] . '?id=' . $edituser->getId());
				} else {
					throw new Exception('An invalid user ID was provided to this page.');
				}
			} else {
				throw new Exception('An invalid user ID was provided to this page.');
			}
		} //End of POST check IF
	} catch (Exception $e) {
		$smarty->assign('title', 'Error - Displaying Page');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error which has prevented us from displaying the edit users screen: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
		exit();
	} //End of Try Catch
	
	$smarty->display('user_mod.tpl');
?>