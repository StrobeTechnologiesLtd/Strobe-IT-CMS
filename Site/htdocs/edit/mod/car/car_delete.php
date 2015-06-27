<?php # car_delete.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: car_delete.php
 * Version: 1.0
 */
// This page displays the delete car screen

	// Need the utilities file:
	require($_SERVER['DOCUMENT_ROOT'] . '/edit/includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	//checkSecurity($pdo, $user, "Page - Delete Page");
	
	try {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Form has been submitted via POST and car requires deletion
			if (isset($_POST['id'])) {
			
				if ($_POST['submit'] == 'No') {
					header("Location:/edit/mod/car/car.php");
					exit();
				}
				
				// SQL to delete page
				$q = 'DELETE FROM SIT_car_cars WHERE id=:id';
				$stmt = $pdo->prepare($q);
				$r = $stmt->execute(array(':id' => $_POST['id']));
					
				if ($r) {
					// Page deleted successfully
					$smarty->assign('title', 'CMS Control Panel - Deleted Car');
					$smarty->display('delete_deleted.tpl');
				} else {
					throw new Exception('Error deleting car.');
				}
			} else {
				throw new Exception('Missing car ID so car could not be deleted.');
			} //End of isset 'id' IF
		} else {
			// Form not submitted so ask for confirmation
			$smarty->assign('title', 'CMS Control Panel - Confirm Delete');
			$smarty->assign('object_id', $_GET['id']);
			$smarty->assign('object_description', $_GET['name']);
			$smarty->assign('object_type', 'Car');
			$smarty->display('delete_confirm.tpl');
		} //End of POST check IF
	} catch (Exception $e) {
		$smarty->assign('title', 'Error - Deleting Car');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error with your request: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
	}
?>