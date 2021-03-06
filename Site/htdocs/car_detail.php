<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>

<?php # car_detail.php

/**
 * Project: Strobe IT CMS - Cars Module
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: car_detail.php
 * Version: 1.0
 */
// This page displays car details

	// Need the utilities file:
	require('includes/utilities.inc.php');

	
	try {
	
		// Produce Site Navigation
		$q = 'SELECT id, title, url FROM SIT_pages WHERE subpage=:subpage';
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute(array(':subpage' => 0));
		
		// If the query ran okay, fetch the records into an array
		if ($r) {
			$nav = $stmt->fetchall();
			$smarty->assign('sitenav', $nav);
		}
		
		
		/*// SQL to retrieve vehicle feature list:
		$q = 'SELECT id, feature FROM SIT_car_feature ORDER BY feature ASC';
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute();
		// If the query ran okay, fetch the records into an array
		if ($r) {
			$featurelist = $stmt->fetchall();
			$smarty->assign('featurelist', $featurelist);
		}*/
		
		
		// SQL to retrieve Picture Extension list:
		$q = 'SELECT ext FROM SIT_car_pictype WHERE enabled = "YES" ORDER BY ext ASC';
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute();
		// If the query ran okay, fetch the records into an array
		if ($r) {
			$extlist = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
			$smarty->assign('fileext', $extlist);
		}
		
				
		$cid = $_GET['ref'];	
		$q = 'SELECT id, vehicle, make, model, year, price, vat, fuel, transmission, colour, minidescription, features, fulldescription, miles, inven_num, special FROM SIT_car_cars WHERE inven_num = :inven_num';
		//id, vehicle, make, model, year, price, vat, fuel, transmission, colour, minidescription, features, fulldescription, miles, inven_num, special
			
		// Fetch the car details:
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute(array(':inven_num' => $cid));
		
		// If the query ran okay, fetch the records into an array
		if ($r) {
			$stmt->setFetchMode(PDO::FETCH_CLASS, 'Car_cars');
			$vehicle = $stmt->fetch();
			
				// Confirm that it exists
				if ($vehicle) {
					$smarty->assign('id', $vehicle->getId());
					$smarty->assign('vehicle', $vehicle->getVehicle());
					$smarty->assign('make', $vehicle->getMake());
					$smarty->assign('model', $vehicle->getModel());
					$smarty->assign('year', $vehicle->getYear());
					$smarty->assign('price', $vehicle->getPrice());
					$smarty->assign('vat', $vehicle->getVat());
					$smarty->assign('fuel', $vehicle->getFuel());
					$smarty->assign('transmission', $vehicle->getTransmission());
					$smarty->assign('colour', $vehicle->getColour());
					$smarty->assign('minidescription', $vehicle->getMinidescription());
					$dbfeatures = explode(",", $vehicle->getFeatures()); //*** Convert MySQL to PHP Array ***
					$smarty->assign('features', $dbfeatures); //*** Send PHP Array to Page ***
					$smarty->assign('fulldescription', $vehicle->getFulldescription());
					$smarty->assign('miles', $vehicle->getMiles());
					$smarty->assign('inven_num', $vehicle->getInven_num());
					$smarty->assign('special', $vehicle->getSpecial());
					
					$smarty->assign('fullpath', $_SERVER['DOCUMENT_ROOT']);
				} else {
					throw new Exception('An invalid car Ref was provided to this page.');
				}
		} else {
			throw new Exception('An invalid car Ref was provided to this page.');
		}	
			
	} catch (Exception $e) {
		$smarty->assign('title', 'Error');
		$smarty->assign('content', '<h1>Error</h1><p>There has been an error which has stopped your page being displayed: -</p><p>' . $e->getMessage() . '</p>');
	}
	
	$smarty->display('car_detail.tpl');
?>