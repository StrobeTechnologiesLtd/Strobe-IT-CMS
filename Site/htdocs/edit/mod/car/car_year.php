<?php # car_year.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: car_year.php
 * Version: 1.0
 */
// This page displays the list of year screen

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
			$q = 'INSERT INTO SIT_car_year (year) VALUES (:year)';
			$stmt = $pdo->prepare($q);
			$r = $stmt->execute(array(':year' => $_POST['newyear']));
						
			if ($r) {
				$smarty->assign('msg', '<h3>Year Added</h3><p>The year ' . $_POST['newyear'] . ' has been added to your list.</p>');
			} else {
					throw new Exception('There has been an error adding your year.');
			} //End of $r check IF
		}
		
		// Was the page submitted via ACTION URL
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			// URL link submitted to perform action
			// Example: car_year.php?id={$item.id}&year={$item.year}&act=DEL
			
			switch ($_GET['act']) {
				case 'DEL':
					if ($_GET['CONF'] == 'YES') {
						// DELETE YEAR
						$q = 'DELETE FROM SIT_car_year WHERE id=:id';
						$stmt = $pdo->prepare($q);
						$r = $stmt->execute(array(':id' => $_GET['id']));
						
						if ($r) {
							$smarty->assign('msg', '<h3>Year Deleted</h3><p>The year ' . $_GET['year'] . ' has been deleted from your list.</p>');
						} else {
							throw new Exception('There has been an error deleting your year.');
						} //End of $r check IF
					} else {
						$smarty->assign('msg', '
						<h3>Delete Year?</h3>
						<p>You have requested to delete the year ' . $_GET['year'] . ',
							<br />	are you sure you want to do this?</p>
						<p><a href="car_year.php?id=' . $_GET['id'] . '&year=' . $_GET['year'] . '&act=DEL&CONF=YES">YES</a> <a href="car_year.php">NO</a></p>');
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
		$q = 'SELECT id, year FROM SIT_car_year ORDER BY year ASC';
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute();
		
		// Set Page Title:
		$smarty->assign('title', 'CMS Control Panel - Year List');
		
		// If the query ran okay, fetch the records into an array
		if ($r) {
			$yearlist = $stmt->fetchall();
			$smarty->assign('list', $yearlist);
		} else {
			$smarty->assign('msg', '<h3>No Years</h3><p>There are no years to display.</p>');
		} //End of $r check IF
	} catch (Exception $e) {
		$smarty->assign('title', 'Error - Displaying Page');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error which has prevented us from displaying the years: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
		exit();
	} //End of Try Catch
	
	$smarty->assign('formaction', $_SERVER['PHP_SELF']);
	$smarty->display('mod/car/year_list.tpl');
?>