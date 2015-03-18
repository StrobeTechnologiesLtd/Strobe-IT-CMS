<?php # settings-security_edit.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: settings-security_edit.php
 * Version: 1.0
 */
// This page displays the edit security group screen

	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	//Code / function to check user security level
	
	try {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
			// Set Page Title:
			$smarty->assign('title', 'CMS Control Panel - Edit Security Group');
		
			$editsecurity = new Security;
			$smarty->assign('form_securityno', $_POST['securityno']);
			$smarty->assign('form_description', $_POST['description']);
			$smarty->assign('form_settings__options', $editsecurity->getSettinglist());
			$smarty->assign('form_settings__values', $editsecurity->getSettinglist());
			$smarty->assign('form_settings__selected', $_POST['settings']);
			$smarty->assign('form_submitbtn', 'Update Security Group');
			
			// Set Security Number / Level:
				$r = $editsecurity->setSecurityno($_POST['securityno']);
				if ($r != 1) {
					$msg = $r . '<br />';
				}
			
				// Set Security Description:
				$r = $editsecurity->setDescription($_POST['description']);
				if ($r != 1) {
					$msg .= $r . '<br />';
				}
				
				// Set Security Settings:
				$r = $editsecurity->setSettings($_POST['settings']);
				if ($r != 1) {
					$msg .= $r . '<br />';
				}
				
			
			if ($msg) {
				$smarty->assign('msg', $msg);
			} else {
				$q = 'UPDATE SIT_security SET securityno=:securityno, description=:description, settings=:settings WHERE id=:id';
				$stmt = $pdo->prepare($q);
				$r = $stmt->execute(array(':securityno' => $editsecurity->getSecurityno(), ':description' => $editsecurity->getDescription(), ':settings' => $editsecurity->getSettings('DB'), ':id' => $_GET['id']));
				
				if ($r) {
					$smarty->assign('msg', 'Security Group Updated Successfully');
				} else {
					throw new Exception('There has been an error updating selected security group.');
				}
			}
		} else {
			// Form not submitted
			$q = 'SELECT id, securityno, description, settings FROM SIT_security WHERE id=:id';
			$stmt = $pdo->prepare($q);
			$r = $stmt->execute(array(':id' => $_GET['id']));
			
			// If the query ran okay, fetch the record into an object
			if ($r) {
				$stmt->setFetchMode(PDO::FETCH_CLASS, 'Security');
				$editsecurity = $stmt->fetch();
				
				// Confirm that it exists
				if ($editsecurity) {
					$smarty->assign('form_securityno', $editsecurity->getSecurityno());
					$smarty->assign('form_description', $editsecurity->getDescription());
					$smarty->assign('form_settings__values', $editsecurity->getSettinglist());
					$smarty->assign('form_settings__options', $editsecurity->getSettinglist());
					$smarty->assign('form_settings__selected', $editsecurity->getSettings());
					$smarty->assign('form_submitbtn', 'Update Security Group');
					$smarty->assign('title', 'CMS Control Panel - Edit Security Group');
					$smarty->assign('msg', '');
					$smarty->assign('form_action', $_SERVER['PHP_SELF'] . '?id=' . $editsecurity->getId());
				} else {
					throw new Exception('An invalid security group ID was provided to this page.');
				}
			} else {
				throw new Exception('An invalid security group ID was provided to this page.');
			}
		} //End of POST check IF
	} catch (Exception $e) {
		$smarty->assign('title', 'Error - Displaying Page');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error which has prevented us from displaying the edit security group screen: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
		exit();
	} //End of Try Catch
	
	$smarty->display('settings-security_mod.tpl');
?>