<?php # settings-style_list.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: settings-style_list.php
 * Version: 1.0
 */
// This page displays the delete security group screen

	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	//Code / function to check user security level
	
	try {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Form submitted
			$smarty->assign('title', 'CMS Control Panel - Style List Updated');
			$newstyle = $_POST['style'];
			
			$q = 'UPDATE SIT_settings SET VALUE=:value WHERE name="style"';
			$stmt = $pdo->prepare($q);
			$r = $stmt->execute(array(':value' => $newstyle));
				
			if ($r) {
				$smarty->assign('msg', 'Style Updated Successfully');
			} else {
				throw new Exception('There has been an error updating your style.');
			}
		} else {
			// Form not submitted
			$smarty->assign('title', 'CMS Control Panel - Style List');
		} //End of POST check IF
		
		// Generate style list 
			$style_option = getFolders('../views/', "std");
			$style_value = getFolders('../views/', "std");
			$q = 'SELECT name, VALUE FROM SIT_settings WHERE name="style"';
			foreach ($pdo->query($q) as $row) {
				//print $row['name'] .' - '. $row['VALUE'] . '<br />';
				$style_selected = $row['VALUE'];
			}
			
			// Assign all values to template
			$smarty->assign('style_option', $style_option);
			$smarty->assign('style_value', $style_value);
			$smarty->assign('style_selected', $style_selected);
			$smarty->assign('form_submitbtn', "Update Style");
			$smarty->display('settings-style_mod.tpl');
			
	} catch (Exception $e) {
		$smarty->assign('title', 'Error - Updating Style');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error with your request: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
	}
?>