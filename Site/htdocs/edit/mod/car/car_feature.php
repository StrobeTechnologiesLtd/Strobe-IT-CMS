<?php # car_manufacture.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: car_manufacture.php
 * Version: 1.0
 */
// This page displays the list of car_manufacture screen

	// Need the utilities file:
	require($_SERVER['DOCUMENT_ROOT'] . '/edit/includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	//checkSecurity($pdo, $user, "Page - List Properties");
	
	try {
		
		// Was the form submitted via POST
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Form submitted to add new year to list
			$q = 'INSERT INTO SIT_car_feature (feature) VALUES (:feature)';
			$stmt = $pdo->prepare($q);
			$r = $stmt->execute(array(':feature' => $_POST['newfeature']));
						
			if ($r) {
				$smarty->assign('msg', '<h3>Feature Added</h3><p>The feature ' . $_POST['newfeature'] . ' has been added to your list.</p>');
			} else {
					throw new Exception('There has been an error adding your feature.');
			} //End of $r check IF
		}
		
		// Was the page submitted via ACTION URL
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			// URL link submitted to perform action
			// Example: car_feature.php?id={$item.feature}&feature={$item.feature}&act=DEL
			
			switch ($_GET['act']) {
				case 'DEL':
					if ($_GET['CONF'] == 'YES') {
						// DELETE FEATURE
						$q = 'DELETE FROM SIT_car_feature WHERE id=:id';
						$stmt = $pdo->prepare($q);
						$r = $stmt->execute(array(':id' => $_GET['id']));
						
						if ($r) {
							$smarty->assign('msg', '<h3>Feature Deleted</h3><p>The feature ' . $_GET['feature'] . ' has been deleted from your list.</p>');
						} else {
							throw new Exception('There has been an error deleting your feature.');
						} //End of $r check IF
					} else {
						$smarty->assign('msg', '
						<h3>Delete Feature?</h3>
						<p>You have requested to delete the feature ' . $_GET['feature'] . ',
							<br />	are you sure you want to do this?</p>
						<p><a href="car_feature.php?id=' . $_GET['id'] . '&feature=' . $_GET['feature'] . '&act=DEL&CONF=YES">YES</a> <a href="car_feature.php">NO</a></p>');
					}
					break;
				case 'BOB':
					// Do something
					break;
				default:
					//$smarty->assign('msg', '<h3>Invalid Action</h3>
					//<p>An invaild action was submitted to this form, nothing processed.</p>');
			} 
		}
		
		// SQL to retrieve vehicle list:
		$q = 'SELECT id, feature FROM SIT_car_feature ORDER BY feature ASC';
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute();
		
		// Set Page Title:
		$smarty->assign('title', 'CMS Control Panel - Car Feature List');
		
		// If the query ran okay, fetch the records into an array
		if ($r) {
			$featurelist = $stmt->fetchall();
			$smarty->assign('list', $featurelist);
		} else {
			$smarty->assign('msg', '<h3>No Features</h3><p>There are no features to display.</p>');
		} //End of $r check IF
	} catch (Exception $e) {
		$smarty->assign('title', 'Error - Displaying Page');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error which has prevented us from displaying the features: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
		exit();
	} //End of Try Catch
	
	$smarty->assign('formaction', $_SERVER['PHP_SELF']);
	$smarty->display('mod/car/feature_list.tpl');
?>