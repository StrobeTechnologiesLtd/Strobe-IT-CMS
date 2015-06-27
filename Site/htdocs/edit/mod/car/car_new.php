<?php # car_new.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: car_new.php
 * Version: 1.0
 */
// This page displays the Add new car screen

	// Need the utilities file:
	require($_SERVER['DOCUMENT_ROOT'] . '/edit/includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	//checkSecurity($pdo, $user, "Page - Edit Page");

	
	try {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// process changes to Car
			$vehicle = new Car_cars;
			
			$msg = $vehicle->setMinidescription($_POST['minidescription']);
			$msg = $vehicle->setInven_num($_POST['inven_num']);
			$msg = $vehicle->setMiles($_POST['miles']);
			$msg = $vehicle->setModel($_POST['model']);
			$msg = $vehicle->setPrice($_POST['price']);
			$msg = $vehicle->setFuel($_POST['fuel']);
			$msg = $vehicle->setTransmission($_POST['transmission']);
			$msg = $vehicle->setColour($_POST['colour']);
			$msg = $vehicle->setFulldescription($_POST['txt_description']);
			$msg = $vehicle->setVehicle($_POST['vehicle']);
			$msg = $vehicle->setYear($_POST['year']);
			$msg = $vehicle->setMake($_POST['make']);
			$msg = $vehicle->setVat($_POST['VAT']);
			$msg = $vehicle->setSpecial($_POST['special']);
			$CompFeatures = implode(",", $_POST['features']); //*** Compile Features to one DB Field ***
			$msg = $vehicle->setFeatures($CompFeatures);
			
			if ($msg) {
				$smarty->assign('msg', $msg);
				$smarty->assign('minidescription', $_POST['minidescription']);
				$smarty->assign('inven_num', $_POST['inven_num']);
				$smarty->assign('miles', $_POST['miles']);
				$smarty->assign('model', $_POST['model']);
				$smarty->assign('price', $_POST['price']);
				$smarty->assign('fuel', $_POST['fuel']);
				$smarty->assign('transmission', $_POST['transmission']);
				$smarty->assign('colour', $_POST['colour']);
				$smarty->assign('txt_description', $_POST['txt_description']);
				$smarty->assign('vehtype_id', $_POST['vehicle']);
				$smarty->assign('year_drop__selected', $_POST['year']);
				$smarty->assign('make_drop__selected', $_POST['make']);
				$smarty->assign('vat', $_POST['VAT']);
				$smarty->assign('special_id', $_POST['special']);
				$smarty->assign('feature_check__selected', $_POST['features']);
			} else {
				// SQL to insert new car
				$q = '
INSERT
INTO SIT_car_cars 
(vehicle, make, model, year, price, vat, fuel, transmission, colour, minidescription, features, fulldescription, miles, inven_num, special) 
VALUES
(:vehicle, :make, :model, :year, :price, :vat, :fuel, :transmission, :colour, :minidescription, :features, :description, :miles, :inven_num, :special)
';
				$smarty->assign('msg', 'Car Added Successfully');
				$stmt = $pdo->prepare($q);
				$r = $stmt->execute(array(
':minidescription' => $vehicle->getMinidescription(),
':inven_num' => $vehicle->getInven_num(),
':miles' => $vehicle->getMiles(),
':model' => $vehicle->getModel(),
':price' => $vehicle->getPrice(),
':fuel' => $vehicle->getFuel(),
':transmission' => $vehicle->getTransmission(),
':colour' => $vehicle->getColour(),
':description' => $vehicle->getFulldescription(),
':vehicle' => $vehicle->getVehicle(),
':year' => $vehicle->getYear(),
':make' => $vehicle->getMake(),
':vat' => $vehicle->getVat(),
':special' => $vehicle->getSpecial(),
':features' => $vehicle->getFeatures()
));
//print_r($stmt->errorInfo());
				
				if ($r) {
					$smarty->assign('title', 'CMS Control Panel - Add Car');
				} else {
					throw new Exception('There has been an error adding your car.');
				}
			}
		} else { // else to if post check
			$smarty->assign('title', 'CMS Control Panel - Add Car');
			$smarty->assign('form_action', $_SERVER['PHP_SELF']);
		} //End of POST check IF
	} catch (Exception $e) {	
		$smarty->assign('title', 'Error - Editing Car');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error which has prevented you from editing the vehicle: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
		exit();
	} //End of Try Catch
	
	
	//Drop Down, Tick Box & Radio Button
	//================================== 
	
	// Vehicle Type Radio Buttons
	/* In the array layout is VALUE => TEXT */
	$smarty->assign('vehtype_radios', array(
                               'car' => 'Car',
                               'van' => 'Van'));
	/* $smarty->assign('vehtype_id', 'van'); LOCATED IN OBJECT CHECK IF */
	
	// Year Drop Down
	$q = 'SELECT year FROM SIT_car_year ORDER BY year ASC';
	$stmt = $pdo->prepare($q);
	$r = $stmt->execute();
	$year_values = $stmt->fetchall(PDO::FETCH_COLUMN, 0);
	$smarty->assign('year_drop__values', $year_values);
	$smarty->assign('year_drop__output', $year_values);
	/* selected is in object */
	
	// Make Drop Down
	$q = 'SELECT make FROM SIT_car_make ORDER BY make ASC';
	$stmt = $pdo->prepare($q);
	$r = $stmt->execute();
	$make_values = $stmt->fetchall(PDO::FETCH_COLUMN, 0);
	$smarty->assign('make_drop__values', $make_values);
	$smarty->assign('make_drop__output', $make_values);
	/* selected is in object */
	
	// Car Features Check List
	$q = 'SELECT feature FROM SIT_car_feature ORDER BY feature ASC';
	$stmt = $pdo->prepare($q);
	$r = $stmt->execute();
	$feature_values = $stmt->fetchall(PDO::FETCH_COLUMN, 0);
	$smarty->assign('feature_check__values', $feature_values);
	$smarty->assign('feature_check__output', $feature_values);
	
	// Special Radio Buttons
	/* In the array layout is VALUE => TEXT */
	$smarty->assign('special_radios', array(
                               'SPECIAL' => 'Special',
                               'SOLD' => 'Sold',
							   'NONE' => 'None'));
	
	
	$smarty->display('mod/car/car_new.tpl');
?>
