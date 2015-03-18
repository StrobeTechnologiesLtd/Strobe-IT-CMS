<?php # user_delete.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: user_delete.php
 * Version: 1.0
 */
// This page displays the delete user screen

	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	checkSecurity($pdo, $user, "User - Delete User");
	
	try {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Form has been submitted via POST and user requires deletion
			if (isset($_POST['id'])) {
			
				if ($_POST['submit'] == 'No') {
					header("Location:index.php");
					exit();
				}
				
				// SQL to delete page
				$q = 'DELETE FROM SIT_users WHERE id=:id';
				$stmt = $pdo->prepare($q);
				$r = $stmt->execute(array(':id' => $_POST['id']));
					
				if ($r) {
					// Page deleted successfully
					$smarty->assign('title', 'CMS Control Panel - Deleted User');
					//$smarty->display('page_delete-deleted.tpl');
					$smarty->display('delete_deleted.tpl');
				} else {
					throw new Exception('Error deleting user.');
				}
			} else {
				throw new Exception('Missing user ID so user could not be deleted.');
			} //End of isset 'id' IF
		} else {
			// Form not submitted so ask for confirmation
			$smarty->assign('title', 'CMS Control Panel - Confirm Delete');
			$smarty->assign('object_id', $_GET['id']);
			$smarty->assign('object_description', $_GET['username']);
			$smarty->assign('object_type', 'user');
			//$smarty->display('page_delete-confirm.tpl');
			$smarty->display('delete_confirm.tpl');
		} //End of POST check IF
	} catch (Exception $e) {
		$smarty->assign('title', 'Error - Deleting User');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error with your request: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
	}
?>