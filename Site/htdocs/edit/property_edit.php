<?php # property_edit.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: property_edit.php
 * Version: 1.0
 */
// This page displays the requested property screen & modifies the required property

	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	//checkSecurity($pdo, $user, "Page - Edit Page");

	
	try {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// process changes to webpage
			$property = new Est_Property;
			
			// Set Property REF:
			$r = $property->setPROP_REF($_POST['PROP_REF']);
			//if ($r != 1) {
				//$msg = $r . '<br />';
			//}
			
			// Set Property Price Prefix:
			$r = $property->setPROP_PRICE_PREFIX($_POST['PROP_PRICE_PREFIX']);
			//if ($r != 1) {
				//$msg = $r . '<br />';
			//}
			
			// Set Property Price:
			$r = $property->setPROP_PRICE($_POST['PROP_PRICE']);
			//if ($r != 1) {
				//$msg = $r . '<br />';
			//}
			
			// Set Property Tenure:
			$r = $property->setPROP_TENURE($_POST['PROP_TENURE']);
			//if ($r != 1) {
				//$msg.= $r . '<br />';
			//}
			
			$r = $property->setPROP_HOUSE_TYPE($_POST['PROP_HOUSE_TYPE']);
			$r = $property->setPROP_STATUS($_POST['PROP_STATUS']);
			$r = $property->setPROP_BED($_POST['PROP_BED']);
			$r = $property->setPROP_NAME($_POST['PROP_NAME']);
			$r = $property->setPROP_ADDRESS($_POST['PROP_ADDRESS']);
			$r = $property->setPROP_POSTCODE($_POST['PROP_POSTCODE']);
			$r = $property->setPROP_SUMMARY($_POST['PROP_SUMMARY']);
			$r = $property->setPROP_DETAILED($_POST['PROP_DETAILED']);
			$r = $property->setPROP_SHOW_NAME($_POST['PROP_SHOW_NAME']);
			$r = $property->setPROP_KEY($_GET['id']);
			$r = $property->setPROP_CONDITION($_POST['PROP_CONDITION']);
			$r = $property->setPROP_COPYRIGHT($_POST['PROP_COPYRIGHT']);
			$r = $property->setPROP_PRICE_TEXT($_POST['PROP_PRICE_TEXT']);
			$r = $property->setPROP_FISH($_POST['PROP_FISH']);
			$r = $property->setPROP_RIGHTMOVE($_POST['PROP_RIGHTMOVE']);
			$r = $property->setPROP_COMING_SOON($_POST['PROP_COMING_SOON']);
			$r = $property->setPROP_EER_CUR($_POST['PROP_EER_CUR']);
			$r = $property->setPROP_EER_POT($_POST['PROP_EER_POT']);
			$r = $property->setPROP_EIR_CUR($_POST['PROP_EIR_CUR']);
			$r = $property->setPROP_EIR_POT($_POST['PROP_EIR_POT']);
			
			if ($msg) {
				$smarty->assign('msg', $msg);
				$smarty->assign('form_PROP_REF', $_POST['PROP_REF']);
				$smarty->assign('form_PROP_PRICE_PREFIX', $_POST['PROP_PRICE_PREFIX']);
				$smarty->assign('form_PROP_PRICE', $_POST['PROP_PRICE']);
				$smarty->assign('form_PROP_TENURE', $_POST['PROP_TENURE']);
				$smarty->assign('form_PROP_HOUSE_TYPE', $_POST['PROP_HOUSE_TYPE']);
				$smarty->assign('form_PROP_STATUS', $_POST['PROP_STATUS']);
				$smarty->assign('form_PROP_BED', $_POST['PROP_BED']);
				$smarty->assign('form_PROP_NAME', $_POST['PROP_NAME']);
				$smarty->assign('form_PROP_ADDRESS', $_POST['PROP_ADDRESS']);
				$smarty->assign('form_PROP_POSTCODE', $_POST['PROP_POSTCODE']);
				$smarty->assign('form_PROP_SUMMARY', $_POST['PROP_SUMMARY']);
				$smarty->assign('form_PROP_DETAILED', $_POST['PROP_DETAILED']);
				$smarty->assign('form_PROP_SHOW_NAME ',$_POST['PROP_SHOW_NAME']);
				$smarty->assign('form_PROP_CONDITION', $_POST['PROP_CONDITION']);
				$smarty->assign('form_PROP_COPYRIGHT', $_POST['PROP_COPYRIGHT']);
				$smarty->assign('form_PROP_PRICE_TEXT', $_POST['PROP_PRICE_TEXT']);
				$smarty->assign('form_PROP_FISH', $_POST['PROP_FISH']);
				$smarty->assign('form_PROP_RIGHTMOVE', $_POST['PROP_RIGHTMOVE']);
				$smarty->assign('form_PROP_COMING_SOON', $_POST['PROP_COMING_SOON']);
				$smarty->assign('form_PROP_EER_CUR', $_POST['PROP_EER_CUR']);
				$smarty->assign('form_PROP_EER_POT', $_POST['PROP_EER_POT']);
				$smarty->assign('form_PROP_EIR_CUR', $_POST['PROP_EIR_CUR']);
				$smarty->assign('form_PROP_EIR_POT', $_POST['PROP_EIR_POT']);
			} else {
				// SQL to update property
				$q = 'UPDATE PROPERTY SET PROP_REF=:PROP_REF, PROP_PRICE_PREFIX=:PROP_PRICE_PREFIX, PROP_PRICE=:PROP_PRICE, PROP_TENURE=:PROP_TENURE, PROP_HOUSE_TYPE=:PROP_HOUSE_TYPE, PROP_STATUS=:PROP_STATUS, PROP_BED=:PROP_BED, PROP_NAME=:PROP_NAME, PROP_ADDRESS=:PROP_ADDRESS, PROP_POSTCODE=:PROP_POSTCODE, PROP_SUMMARY=:PROP_SUMMARY, PROP_DETAILED=:PROP_DETAILED, PROP_MAIN_LOC=:PROP_MAIN_LOC, PROP_MAIN_CAPTION=:PROP_MAIN_CAPTION, PROP_ADD1_LOC=:PROP_ADD1_LOC, PROP_ADD1_CAPTION=:PROP_ADD1_CAPTION, PROP_ADD2_LOC=:PROP_ADD2_LOC, PROP_ADD2_CAPTION=:PROP_ADD2_CAPTION, PROP_ADD3_LOC=:PROP_ADD3_LOC, PROP_ADD3_CAPTION=:PROP_ADD3_CAPTION, PROP_MAP1_LOC=:PROP_MAP1_LOC, PROP_MAP1_CAPTION=:PROP_MAP1_CAPTION, PROP_MAP2_LOC=:PROP_MAP2_LOC, PROP_MAP2_CAPTION=:PROP_MAP2_CAPTION, PROP_MAP3_LOC=:PROP_MAP3_LOC, PROP_MAP3_CAPTION=:PROP_MAP3_CAPTION, PROP_SHOW_NAME=:PROP_SHOW_NAME, PROP_ADD4_LOC=:PROP_ADD4_LOC, PROP_ADD4_CAPTION=:PROP_ADD4_CAPTION, PROP_ADD_DATE=:PROP_ADD_DATE, PROP_CONDITION=:PROP_CONDITION, PROP_COPYRIGHT=:PROP_COPYRIGHT, PROP_PRICE_TEXT=:PROP_PRICE_TEXT, PROP_FISH=:PROP_FISH, PROP_RIGHTMOVE=:PROP_RIGHTMOVE, PROP_COMING_SOON=:PROP_COMING_SOON, PROP_EER_CUR=:PROP_EER_CUR, PROP_EER_POT=:PROP_EER_POT, PROP_EIR_CUR=:PROP_EIR_CUR, PROP_EIR_POT=:PROP_EIR_POT WHERE PROP_KEY=:PROP_KEY';
				$smarty->assign('msg', 'Property Updated Successfully');
				$stmt = $pdo->prepare($q);
				$r = $stmt->execute(array(':PROP_REF' => $property->getPROP_REF(), ':PROP_PRICE_PREFIX' => $property->getPROP_PRICE_PREFIX(), ':PROP_PRICE' => $property->getPROP_PRICE(), ':PROP_TENURE' => $property->getPROP_TENURE(), ':PROP_HOUSE_TYPE' => $property->getPROP_HOUSE_TYPE(), ':PROP_STATUS' => $property->getPROP_STATUS(), ':PROP_BED' => $property->getPROP_BED(), ':PROP_NAME' => $property->getPROP_NAME(), ':PROP_ADDRESS' => $property->getPROP_ADDRESS(), ':PROP_POSTCODE' => $property->getPROP_POSTCODE(), ':PROP_SUMMARY' => $property->getPROP_SUMMARY(), ':PROP_DETAILED' => $property->getPROP_DETAILED(), ':PROP_MAIN_LOC' => $property->getPROP_MAIN_LOC(), ':PROP_MAIN_CAPTION' => $property->getPROP_MAIN_CAPTION(), ':PROP_ADD1_LOC' => $property->getPROP_ADD1_LOC(), ':PROP_ADD1_CAPTION' => $property->getPROP_ADD1_CAPTION(), ':PROP_ADD2_LOC' => $property->getPROP_ADD2_LOC(), ':PROP_ADD2_CAPTION' => $property->getPROP_ADD2_CAPTION(), ':PROP_ADD3_LOC' => $property->getPROP_ADD3_LOC(), ':PROP_ADD3_CAPTION' => $property->getPROP_ADD3_CAPTION(), ':PROP_MAP1_LOC' => $property->getPROP_MAP1_LOC(), ':PROP_MAP1_CAPTION' => $property->getPROP_MAP1_CAPTION(), ':PROP_MAP2_LOC' => $property->getPROP_MAP2_LOC(), ':PROP_MAP2_CAPTION' => $property->getPROP_MAP2_CAPTION(), ':PROP_MAP3_LOC' => $property->getPROP_MAP3_LOC(), ':PROP_MAP3_CAPTION' => $property->getPROP_MAP3_CAPTION(), ':PROP_SHOW_NAME' => $property->getPROP_SHOW_NAME(), ':PROP_ADD4_LOC' => $property->getPROP_ADD4_LOC(), ':PROP_ADD4_CAPTION' => $property->getPROP_ADD4_CAPTION(), ':PROP_ADD_DATE' => $property->getPROP_ADD_DATE(), ':PROP_CONDITION' => $property->getPROP_CONDITION(), ':PROP_COPYRIGHT' => $property->getPROP_COPYRIGHT(), ':PROP_PRICE_TEXT' => $property->getPROP_PRICE_TEXT(), ':PROP_FISH' => $property->getPROP_FISH(), ':PROP_RIGHTMOVE' => $property->getPROP_RIGHTMOVE(), ':PROP_COMING_SOON' => $property->getPROP_COMING_SOON(), ':PROP_EER_CUR' => $property->getPROP_EER_CUR(), ':PROP_EER_POT' => $property->getPROP_EER_POT(), ':PROP_EIR_CUR' => $property->getPROP_EIR_CUR(), ':PROP_EIR_POT' => $property->getPROP_EIR_POT(), ':PROP_KEY' => $property->getPROP_KEY()));
				//print_r($stmt->errorInfo());
				
				if ($r) {
					$smarty->assign('title', 'CMS Control Panel - Edit Property');
					//$smarty->assign('msg', 'Page Updated Successfully');
				} else {
					throw new Exception('There has been an error updating your page.');
				}
			}
		} else { // else to if post check
			// display site to edit
			$q = 'SELECT PROP_REF, PROP_PRICE_PREFIX, PROP_PRICE, PROP_TENURE, PROP_HOUSE_TYPE, PROP_STATUS, PROP_BED, PROP_NAME, PROP_ADDRESS, PROP_POSTCODE, PROP_SUMMARY, PROP_DETAILED, PROP_MAIN_LOC, PROP_MAIN_CAPTION, PROP_ADD1_LOC, PROP_ADD1_CAPTION, PROP_ADD2_LOC, PROP_ADD2_CAPTION, PROP_ADD3_LOC, PROP_ADD3_CAPTION, PROP_MAP1_LOC, PROP_MAP1_CAPTION, PROP_MAP2_LOC, PROP_MAP2_CAPTION, PROP_MAP3_LOC, PROP_MAP3_CAPTION, PROP_SHOW_NAME, PROP_KEY, PROP_ADD4_LOC, PROP_ADD4_CAPTION, PROP_ADD_DATE, PROP_CONDITION, PROP_COPYRIGHT, PROP_PRICE_TEXT, PROP_FISH, PROP_RIGHTMOVE, PROP_COMING_SOON, PROP_EER_CUR, PROP_EER_POT, PROP_EIR_CUR, PROP_EIR_POT FROM PROPERTY WHERE PROP_KEY=:id';
			$id = $_GET['id'];
			$stmt = $pdo->prepare($q);
			$r = $stmt->execute(array(':id' => $id));
			
			// If the query ran okay, fetch the record into an object
			if ($r) {
				$stmt->setFetchMode(PDO::FETCH_CLASS, 'Est_Property');
				$property = $stmt->fetch();
				
				// Confirm that it exists
				if ($property) {
					$smarty->assign('form_PROP_REF', $property->getPROP_REF());
					$smarty->assign('prop_price_prefix_selected', $property->getPROP_PRICE_PREFIX());
					$smarty->assign('form_PROP_PRICE', $property->getPROP_PRICE());
					$smarty->assign('prop_tenure_selected', $property->getPROP_TENURE());
					$smarty->assign('prop_house_type_selected', $property->getPROP_HOUSE_TYPE());
					$smarty->assign('prop_status_selected', $property->getPROP_STATUS());
					$smarty->assign('form_PROP_BED', $property->getPROP_BED());
					$smarty->assign('form_PROP_NAME', $property->getPROP_NAME());
					$smarty->assign('form_PROP_ADDRESS', $property->getPROP_ADDRESS());
					$smarty->assign('form_PROP_POSTCODE', $property->getPROP_POSTCODE());
					$smarty->assign('form_PROP_SUMMARY', $property->getPROP_SUMMARY());
					$smarty->assign('form_PROP_DETAILED', $property->getPROP_DETAILED());
					$smarty->assign('prop_show_name_checked', $property->getPROP_SHOW_NAME());
					$smarty->assign('form_PROP_KEY', $property->getPROP_KEY());
					$smarty->assign('form_PROP_ADD_DATE', $property->getPROP_ADD_DATE());
					$smarty->assign('prop_condition_selected', $property->getPROP_CONDITION());
					$smarty->assign('prop_copyright_selected', $property->getPROP_COPYRIGHT());
					$smarty->assign('form_PROP_PRICE_TEXT', $property->getPROP_PRICE_TEXT());
					$smarty->assign('prop_fish_selected', $property->getPROP_FISH());
					$smarty->assign('prop_rightmove_selected', $property->getPROP_RIGHTMOVE());
					$smarty->assign('prop_coming_soon_selected', $property->getPROP_COMING_SOON());
					$smarty->assign('form_PROP_EER_CUR', $property->getPROP_EER_CUR());
					$smarty->assign('form_PROP_EER_POT', $property->getPROP_EER_POT());
					$smarty->assign('form_PROP_EIR_CUR', $property->getPROP_EIR_CUR());
					$smarty->assign('form_PROP_EIR_POT', $property->getPROP_EIR_POT());
					$smarty->assign('title', 'CMS Control Panel - Edit Property');
					$smarty->assign('form_action', $_SERVER['PHP_SELF'] . '?id=' . $id);
					
				} else {
					throw new Exception('An invalid property ID was provided to this page.');
				}
			} else {
				throw new Exception('An invalid property ID was provided to this page.');
			}
		} //End of POST check IF
	} catch (Exception $e) {	
		$smarty->assign('title', 'Error - Editing Property');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error which has prevented you from editing the property: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
		exit();
	} //End of Try Catch
	
	
	//Drop Down and Tick Boxes
	//======================== 

	//Price Prefix
	$smarty->assign('prop_price_prefix_options', array(
                                'No Prefix' => 'No Prefix',
                                'Asking price' => 'Asking price',
								'Region of' => 'Region of',
								'Offers over' => 'Offers over',
								'Auction guide' => 'Auction guide',
								'Subject to contract' => 'Subject to contract',
								'Contact agents' => 'Contact agents')
                                );
								
	//Property Tenure
	$smarty->assign('prop_tenure_options', array(
                                'Freehold' => 'Freehold',
                                'Leasehold' => 'Leasehold',
								'Rental' => 'Rental')
                                );
								
	//House Type
	$smarty->assign('prop_house_type_options', array(
                                'Detached' => 'Detached',
                                'Semi' => 'Semi-Detached',
								'Flat' => 'Flat',
								'Terrace' => 'Terrace',
								'Commercial' => 'Commercial',
								'Building P' => 'Building Plot/Barns',
								'Paddock' => 'Paddock',
								'Rental' => 'Rental',
								'Bungalow' => 'Bungalow')
                                );
								
	//Property Status
	$smarty->assign('prop_status_options', array(
                                'Viewing' => 'Viewing',
                                'Sale Agreed' => 'Sale Agreed',
								'Sold' => 'Sold',
								'Under offer' => 'Under offer',
								'Hidden' => 'Hidden',
								'Let' => 'Let')
                                );
								
	//Property Condition
	$smarty->assign('prop_condition_options', array(
                                'N' => 'Don\'t Display Text',
                                'Y' => 'Display Text')
                                );
								
	//Property Copyright
	$smarty->assign('prop_copyright_options', array(
                                'N' => 'Don\'t Display &copy;',
                                'Y' => 'Display Copyright')
                                );
								
	//Fish 4
	$smarty->assign('prop_fish_options', array(
                                'N' => 'No',
                                'Y' => 'Yes')
                                );
								
	//Rightmove
	$smarty->assign('prop_rightmove_options', array(
                                'N' => 'No',
                                'Y' => 'Yes')
                                );
								
	//Coming Soon
	$smarty->assign('prop_coming_soon_options', array(
                                'N' => 'No',
                                'Y' => 'Yes')
                                );
	
	//Show Name
	$smarty->assign('prop_show_name_checkboxes', array(
                                     1 => '')
                                   );
								
								
								
								
	
	$smarty->display('property_new.tpl');
?>
