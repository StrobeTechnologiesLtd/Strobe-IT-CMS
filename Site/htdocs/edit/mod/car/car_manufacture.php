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
			$q = 'INSERT INTO SIT_car_make (make) VALUES (:make)';
			$stmt = $pdo->prepare($q);
			$r = $stmt->execute(array(':make' => $_POST['newmake']));
						
			if ($r) {
				$smarty->assign('msg', '<h3>Manufacture Added</h3><p>The manufacture ' . $_POST['newmake'] . ' has been added to your list.</p>');
			} else {
					throw new Exception('There has been an error adding your manufacture.');
			} //End of $r check IF
		}
		
		// Was the page submitted via ACTION URL
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			// URL link submitted to perform action
			// Example: car_manufacture.php?id={$item.id}&make={$item.make}&act=DEL
			
			switch ($_GET['act']) {
				case 'DEL':
					if ($_GET['CONF'] == 'YES') {
						// DELETE MANUFACTURE
						$q = 'DELETE FROM SIT_car_make WHERE id=:id';
						$stmt = $pdo->prepare($q);
						$r = $stmt->execute(array(':id' => $_GET['id']));
						
						if ($r) {
							$smarty->assign('msg', '<h3>Manufacture Deleted</h3><p>The manufacture ' . $_GET['make'] . ' has been deleted from your list.</p>');
						} else {
							throw new Exception('There has been an error deleting your manufacture.');
						} //End of $r check IF
					} else {
						$smarty->assign('msg', '
						<h3>Delete Manufacture?</h3>
						<p>You have requested to delete the manufacture ' . $_GET['make'] . ',
							<br />	are you sure you want to do this?</p>
						<p><a href="car_manufacture.php?id=' . $_GET['id'] . '&make=' . $_GET['make'] . '&act=DEL&CONF=YES">YES</a> <a href="car_manufacture.php">NO</a></p>');
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
		$q = 'SELECT id, make FROM SIT_car_make ORDER BY make ASC';
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute();
		
		// Set Page Title:
		$smarty->assign('title', 'CMS Control Panel - Manufacture List');
		
		// If the query ran okay, fetch the records into an array
		if ($r) {
			$makelist = $stmt->fetchall();
			$smarty->assign('list', $makelist);
		} else {
			$smarty->assign('msg', '<h3>No Manufactures</h3><p>There are no manufacture to display.</p>');
		} //End of $r check IF
	} catch (Exception $e) {
		$smarty->assign('title', 'Error - Displaying Page');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error which has prevented us from displaying the manufactures: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
		exit();
	} //End of Try Catch
	
	$smarty->assign('formaction', $_SERVER['PHP_SELF']);
	$smarty->display('mod/car/make_list.tpl');
?>