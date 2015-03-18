<?php # page_delete.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: page_delete.php
 * Version: 1.0
 */
// This page displays the delete pages screen

	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	checkSecurity($pdo, $user, "Page - Delete Page");
	
	try {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Form has been submitted via POST and page requires deletion
			if (isset($_POST['id'])) {
			
				if ($_POST['submit'] == 'No') {
					header("Location:index.php");
					exit();
				}
				
				// SQL to check there are no sub pages:
				$q = 'SELECT mainpageid FROM SIT_pages WHERE mainpageid=:mainpageid';
				$stmt = $pdo->prepare($q);
				$r = $stmt->execute(array(':mainpageid' => $_POST['id']));
				$count = $stmt->rowCount();
				
				if ($count == 0) {
					// SQL to delete page
					$q = 'DELETE FROM SIT_pages WHERE id=:id';
					$stmt = $pdo->prepare($q);
					$r = $stmt->execute(array(':id' => $_POST['id']));
					
					if ($r) {
						// Page deleted successfully
						$smarty->assign('title', 'CMS Control Panel - Deleted Page');
						//$smarty->display('page_delete-deleted.tpl');
						$smarty->display('delete_deleted.tpl');
					} else {
						throw new Exception('Error deleting page.');
					}
				} else {
					throw new Exception('This page cannot be deleted as it has subpages.');
				} //End of check for subpages IF
			} else {
				throw new Exception('Missing page ID so page could not be deleted.');
			} //End of isset 'id' IF
		} else {
			// Form not submitted so ask for confirmation
			$smarty->assign('title', 'CMS Control Panel - Confirm Delete');
			$smarty->assign('object_id', $_GET['id']);
			$smarty->assign('object_description', $_GET['title']);
			$smarty->assign('object_type', 'page');
			//$smarty->display('page_delete-confirm.tpl');
			$smarty->display('delete_confirm.tpl');
		} //End of POST check IF
	} catch (Exception $e) {
		$smarty->assign('title', 'Error - Deleting Page');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error with your request: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
	}
?>