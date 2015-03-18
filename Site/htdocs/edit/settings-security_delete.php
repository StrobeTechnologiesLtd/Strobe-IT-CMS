<?php # settings-security_delete.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: settings-security_delete.php
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
			// Form has been submitted via POST and security group requires deletion
			if (isset($_POST['id'])) {
			
				if ($_POST['submit'] == 'No') {
					header("Location:index.php");
					exit();
				}
				
				// SQL to delete security group
				$q = 'DELETE FROM SIT_security WHERE id=:id';
				$stmt = $pdo->prepare($q);
				$r = $stmt->execute(array(':id' => $_POST['id']));
					
				if ($r) {
					// Security Group deleted successfully
					$smarty->assign('title', 'CMS Control Panel - Deleted Security Group');
					$smarty->display('delete_deleted.tpl');
				} else {
					throw new Exception('Error deleting security group.');
				}
			} else {
				throw new Exception('Missing security group ID so security group could not be deleted.');
			} //End of isset 'id' IF
		} else {
			// Form not submitted so ask for confirmation
			$smarty->assign('title', 'CMS Control Panel - Confirm Delete');
			$smarty->assign('object_id', $_GET['id']);
			$smarty->assign('object_description', $_GET['groupname']);
			$smarty->assign('object_type', 'security group');
			$smarty->display('delete_confirm.tpl');
		} //End of POST check IF
	} catch (Exception $e) {
		$smarty->assign('title', 'Error - Deleting Security Group');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error with your request: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
	}
?>