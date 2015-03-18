<?php # settings-security_new.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: settings-security_new.php
 * Version: 1.0
 */
// This page displays the new security group screen

	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	//Code / function to check user security level
	
	try {
		$newsecurity = new Security;
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
			// SQL to retrieve security list:
			$q = 'SELECT securityno FROM SIT_security WHERE securityno=:securityno';
			$stmt = $pdo->prepare($q);
			$r = $stmt->execute(array(':securityno' => $_POST['securityno']));
			$count = $stmt->rowCount();
		
			// Set Page Title:
			$smarty->assign('title', 'CMS Control Panel - Create New Security Group');
			
		
			// If the query ran okay, report security group already exists
			if ($count == 1) { //($r) {
				$smarty->assign('msg', '<h1>Already Exists</h1><p>The specified security group number already exisits.</p>');
				$smarty->assign('form_securityno', $_POST['securityno']);
				$smarty->assign('form_description', $_POST['description']);
				$smarty->assign('form_settings__options', $newsecurity->getSettinglist());
				$smarty->assign('form_settings__values', $newsecurity->getSettinglist());
				$smarty->assign('form_settings__selected', $_POST['settings']);
				$smarty->assign('form_submitbtn', 'Create Security Group');
			} else {
				//securityno is different so check fields and add to database
				
			
				// Set Security Number / Level:
				$r = $newsecurity->setSecurityno($_POST['securityno']);
				if ($r != 1) {
					$msg = $r . '<br />';
				}
			
				// Set Security Description:
				$r = $newsecurity->setDescription($_POST['description']);
				if ($r != 1) {
					$msg .= $r . '<br />';
				}
				
				// Set Security Settings:
				$r = $newsecurity->setSettings($_POST['settings']);
				if ($r != 1) {
					$msg .= $r . '<br />';
				}
			
				if ($msg) {
					$smarty->assign('msg', $msg);
					$smarty->assign('form_securityno', $_POST['securityno']);
					$smarty->assign('form_description', $_POST['description']);
					$smarty->assign('form_settings__options', $newsecurity->getSettinglist());
					$smarty->assign('form_settings__values', $newsecurity->getSettinglist());
					$smarty->assign('form_settings__selected', $_POST['settings']);
					$smarty->assign('form_submitbtn', 'Create Security Group');
				} else {
					// SQL to insert new user:
					$q = 'INSERT INTO SIT_security (securityno, description, settings) VALUES (:securityno, :description, :settings)';
					$stmt = $pdo->prepare($q);
					$r = $stmt->execute(array(':securityno' => $newsecurity->getSecurityno(), ':description' => $newsecurity->getDescription(), ':settings' => $newsecurity->getSettings('DB')));
				
					if ($r) {
						$smarty->assign('msg', 'Security Group Added Successfully');
						$smarty->assign('form_settings__options', $newsecurity->getSettinglist());
						$smarty->assign('form_settings__values', $newsecurity->getSettinglist());
						$smarty->assign('form_submitbtn', 'Create Security Group');
					} else {
						throw new Exception('There has been an error adding your new security group.');
					}
				}
			} //End of $r check IF
		} else {
			$smarty->assign('title', 'CMS Control Panel - Create New Security Group');
			$smarty->assign('form_settings__options', $newsecurity->getSettinglist());
			$smarty->assign('form_settings__values', $newsecurity->getSettinglist());
			$smarty->assign('form_submitbtn', 'Create Security Group');
		} //End of POST check IF
	} catch (Exception $e) {
		$smarty->assign('title', 'Error - Displaying Page');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error which has prevented us from displaying the new security group screen: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
		exit();
	} //End of Try Catch
	
	$smarty->display('settings-security_mod.tpl');
?>