<?php # car_pictypes.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: car_pictypes.php
 * Version: 1.0
 */
// This page displays the list of picture types screen

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
			$q = 'INSERT INTO SIT_car_pictype (ext, description, enabled) VALUES (:ext, :description, :enabled)';
			$stmt = $pdo->prepare($q);
			$r = $stmt->execute(array(':ext' => $_POST['newext'], ':description' => $_POST['newdescription'], ':enabled' => $_POST['newenabled']));
						
			if ($r) {
				$smarty->assign('msg', '<h3>File Extension Added</h3><p>The extension ' . $_POST['newext'] . ' has been added to your list.</p>');
			} else {
					throw new Exception('There has been an error adding your file extension.');
			} //End of $r check IF
		}
		
		// Was the page submitted via ACTION URL
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			// URL link submitted to perform action
			// Example: car_pictypes.php?id={$item.id}&ext={$item.ext}&act=DEL
			
			switch ($_GET['act']) {
				case 'DEL':
					if ($_GET['CONF'] == 'YES') {
						// DELETE FILE EXTENSION
						$q = 'DELETE FROM SIT_car_pictype WHERE id=:id';
						$stmt = $pdo->prepare($q);
						$r = $stmt->execute(array(':id' => $_GET['id']));
						
						if ($r) {
							$smarty->assign('msg', '<h3>File Extension Deleted</h3><p>The extension ' . $_GET['ext'] . ' has been deleted from your list.</p>');
						} else {
							throw new Exception('There has been an error deleting your file extension.');
						} //End of $r check IF
					} else {
						$smarty->assign('msg', '
						<h3>Delete File Extension?</h3>
						<p>You have requested to delete the file extension ' . $_GET['ext'] . ',
							<br />	are you sure you want to do this?</p>
						<p><a href="car_pictypes.php?id=' . $_GET['id'] . '&ext=' . $_GET['ext'] . '&act=DEL&CONF=YES">YES</a> <a href="car_pictypes.php">NO</a></p>');
					}
					break;
				case 'ENA':
					// Enable the file type
					$q = 'UPDATE SIT_car_pictype SET enabled="YES" WHERE id=:id';
					$stmt = $pdo->prepare($q);
					$r = $stmt->execute(array(':id' => $_GET['id']));
						
					if ($r) {
						$smarty->assign('msg', '<h3>File Extension Enabled</h3><p>The extension ' . $_GET['ext'] . ' has been enabled.</p>');
					} else {
						throw new Exception('There has been an error enabling your file extension.');
					}
					break;
				case 'DIS':
					// Disable the file type
					$q = 'UPDATE SIT_car_pictype SET enabled="NO" WHERE id=:id';
					$stmt = $pdo->prepare($q);
					$r = $stmt->execute(array(':id' => $_GET['id']));
						
					if ($r) {
						$smarty->assign('msg', '<h3>File Extension Disabled</h3><p>The extension ' . $_GET['ext'] . ' has been disabled.</p>');
					} else {
						throw new Exception('There has been an error disabling your file extension.');
					}
					break;
				default:
					//$smarty->assign('msg', '<h3>Invalid Action</h3>
					//<p>An invaild action was submitted to this form, nothing processed.</p>');
			} 
		}
		
		// SQL to retrieve vehicle list:
		$q = 'SELECT id, ext, description, enabled FROM SIT_car_pictype ORDER BY ext ASC';
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute();
		
		// Set Page Title:
		$smarty->assign('title', 'CMS Control Panel - Picture Type List');
		
		// If the query ran okay, fetch the records into an array
		if ($r) {
			$list = $stmt->fetchall();
			$smarty->assign('list', $list);
		} else {
			$smarty->assign('msg', '<h3>No Picture Types</h3><p>There are no picture types to display.</p>');
		} //End of $r check IF
	} catch (Exception $e) {
		$smarty->assign('title', 'Error - Displaying Page');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error which has prevented us from displaying the picture types: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
		exit();
	} //End of Try Catch
	
	$smarty->assign('formaction', $_SERVER['PHP_SELF']);
	$smarty->display('mod/car/pictype_list.tpl');
?>