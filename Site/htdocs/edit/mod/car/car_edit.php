<?php # car_edit.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: car_edit.php
 * Version: 1.0
 */
// This page displays the requested car screen & modifies the required car

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
			$msg = $vehicle->setId($_GET['id']);
			
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
				// SQL to update car
				$q = '
UPDATE SIT_car_cars
SET
vehicle=:vehicle,
make=:make,
model=:model,
year=:year,
price=:price,
vat=:vat,
fuel=:fuel,
transmission=:transmission,
colour=:colour,
minidescription=:minidescription,
features=:features,
fulldescription=:description,
miles=:miles,
inven_num=:inven_num,
special=:special
WHERE id=:id
';
				$smarty->assign('msg', 'Car Updated Successfully');
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
':features' => $vehicle->getFeatures(),
':id' => $vehicle->getId()
));
				
				if ($r) {
					$smarty->assign('title', 'CMS Control Panel - Edit Car');
				} else {
					throw new Exception('There has been an error updating your car.');
				}
			}
		} else { // else to if post check
			// display site to edit
			$q = 'SELECT id, vehicle, make, model, year, price, vat, fuel, transmission, colour, minidescription, features, fulldescription, miles, inven_num, special FROM SIT_car_cars WHERE id=:id';
			$id = $_GET['id'];
			$stmt = $pdo->prepare($q);
			$r = $stmt->execute(array(':id' => $id));
			
			// If the query ran okay, fetch the record into an object
			if ($r) {
				$stmt->setFetchMode(PDO::FETCH_CLASS, 'Car_cars');
				$vehicle = $stmt->fetch();
				
				// Confirm that it exists
				if ($vehicle) {
					$smarty->assign('minidescription', $vehicle->getMinidescription());
					$smarty->assign('inven_num', $vehicle->getInven_num());
					$smarty->assign('miles', $vehicle->getMiles());
					$smarty->assign('model', $vehicle->getModel());
					$smarty->assign('price', $vehicle->getPrice());
					$smarty->assign('fuel', $vehicle->getFuel());
					$smarty->assign('transmission', $vehicle->getTransmission());
					$smarty->assign('colour', $vehicle->getColour());
					$smarty->assign('txt_description', $vehicle->getFulldescription());
					$smarty->assign('vehtype_id', $vehicle->getVehicle());
					$smarty->assign('year_drop__selected', $vehicle->getYear());
					$smarty->assign('make_drop__selected', $vehicle->getMake());
					$smarty->assign('vat', $vehicle->getVat());
					$smarty->assign('special_id', $vehicle->getSpecial());
					$dbfeatures = explode(",", $vehicle->getFeatures()); //*** Convert MySQL to PHP Array ***
					$smarty->assign('feature_check__selected', $dbfeatures); //*** Send PHP Array to Form ***
					$smarty->assign('title', 'CMS Control Panel - Edit Car');
					$smarty->assign('form_action', $_SERVER['PHP_SELF'] . '?id=' . $id);
					
				} else {
					throw new Exception('An invalid car ID was provided to this page.');
				}
			} else {
				throw new Exception('An invalid car ID was provided to this page.');
			}
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
