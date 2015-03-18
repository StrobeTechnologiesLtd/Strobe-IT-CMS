<?php # property_pics.php
//http://www.quackit.com/php/tutorial/php_upload_file.cfm

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: property_pics.php
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
			// process changes to property
			$property = new Est_Property;
			
			//File Path
			$Path = "propimages/";

			//Allowable Picture extensions
			$PicExtensions = array("jpg","JPG");
			
			if ($_POST['submit'] == 'Upload') {
			
				switch ($_POST['item']) {
					case "MAIN":
						$r = $property->setPROP_MAIN_LOC($_FILES['uploadedfile']['name']);
						$r = $property->setPROP_MAIN_CAPTION($_POST['uploadcaption']);
						$suffix = '';
						// SQL to update property
						$q = 'UPDATE PROPERTY SET PROP_MAIN_LOC=:PROP_MAIN_LOC, PROP_MAIN_CAPTION=:PROP_MAIN_CAPTION WHERE PROP_KEY=:PROP_KEY';
						break;
					case "PIC1":
						$r = $property->setPROP_ADD1_LOC($_FILES['uploadedfile']['name']);
						$r = $property->setPROP_ADD1_CAPTION($_POST['uploadcaption']);
						$suffix = 'a';
						// SQL to update property
						$q = 'UPDATE PROPERTY SET PROP_ADD1_LOC=:PROP_ADD1_LOC, PROP_ADD1_CAPTION=:PROP_ADD1_CAPTION WHERE PROP_KEY=:PROP_KEY';
						break;
					case "PIC2":
						$r = $property->setPROP_ADD2_LOC($_FILES['uploadedfile']['name']);
						$r = $property->setPROP_ADD2_CAPTION($_POST['uploadcaption']);
						$suffix = 'b';
						// SQL to update property
						$q = 'UPDATE PROPERTY SET PROP_ADD2_LOC=:PROP_ADD2_LOC, PROP_ADD2_CAPTION=:PROP_ADD2_CAPTION WHERE PROP_KEY=:PROP_KEY';
						break;
					case "PIC3":
						$r = $property->setPROP_ADD3_LOC($_FILES['uploadedfile']['name']);
						$r = $property->setPROP_ADD3_CAPTION($_POST['uploadcaption']);
						$suffix = 'c';
						// SQL to update property
						$q = 'UPDATE PROPERTY SET PROP_ADD3_LOC=:PROP_ADD3_LOC, PROP_ADD3_CAPTION=:PROP_ADD3_CAPTION WHERE PROP_KEY=:PROP_KEY';
						break;
					case "PIC4":
						$r = $property->setPROP_ADD4_LOC($_FILES['uploadedfile']['name']);
						$r = $property->setPROP_ADD4_CAPTION($_POST['uploadcaption']);
						$suffix = 'd';
						// SQL to update property
						$q = 'UPDATE PROPERTY SET PROP_ADD4_LOC=:PROP_ADD4_LOC, PROP_ADD4_CAPTION=:PROP_ADD4_CAPTION WHERE PROP_KEY=:PROP_KEY';
						break;
					case "PLAN1":
						$r = $property->setPROP_MAP1_LOC($_FILES['uploadedfile']['name']);
						$r = $property->setPROP_MAP1_CAPTION($_POST['uploadcaption']);
						$suffix = 'x';
						// SQL to update property
						$q = 'UPDATE PROPERTY SET PROP_MAP1_LOC=:PROP_MAP1_LOC, PROP_MAP1_CAPTION=:PROP_MAP1_CAPTION WHERE PROP_KEY=:PROP_KEY';
						break;
					case "PLAN2":
						$r = $property->setPROP_MAP2_LOC($_FILES['uploadedfile']['name']);
						$r = $property->setPROP_MAP2_CAPTION($_POST['uploadcaption']);
						$suffix = 'y';
						// SQL to update property
						$q = 'UPDATE PROPERTY SET PROP_MAP2_LOC=:PROP_MAP2_LOC, PROP_MAP2_CAPTION=:PROP_MAP2_CAPTION WHERE PROP_KEY=:PROP_KEY';
						break;
					case "PLAN3":
						$r = $property->setPROP_MAP3_LOC($_FILES['uploadedfile']['name']);
						$r = $property->setPROP_MAP3_CAPTION($_POST['uploadcaption']);
						$suffix = 'z';
						// SQL to update property
						$q = 'UPDATE PROPERTY SET PROP_MAP3_LOC=:PROP_MAP3_LOC, PROP_MAP3_CAPTION=:PROP_MAP3_CAPTION WHERE PROP_KEY=:PROP_KEY';
						break;
					default:
						echo "Not Submitted Successfully";
						break;
				}
				
				//Process files to upload
				$picture = "uploadedfile";
				$newname = 'house' . $_GET['id'] . $suffix;
		
				if($_FILES[$picture]['tmp_name']) {
					$FindExtension = explode ( '.', $_FILES[$picture]['name']);
					$newname .= ".".$FindExtension[count($FindExtension)-1];
					$error = do_file_upload($picture,$Path,2097152,$PicExtensions,true,$newname,'FULL');
				}//End of File upload
				if ($error != 1) {
					$msg = $error . '<br />';
				}
			
	
				if ($msg) {
					$smarty->assign('msg', $msg);
				} else {
					$smarty->assign('msg', 'Property Updated Successfully');
					$stmt = $pdo->prepare($q);
					$id = $_GET['id'];
					$r = $stmt->execute(array(':PROP_MAIN_LOC' => $property->getPROP_MAIN_LOC(), ':PROP_MAIN_CAPTION' => $property->getPROP_MAIN_CAPTION(), ':PROP_ADD1_LOC' => $property->getPROP_ADD1_LOC(), ':PROP_ADD1_CAPTION' => $property->getPROP_ADD1_CAPTION(), ':PROP_ADD2_LOC' => $property->getPROP_ADD2_LOC(), ':PROP_ADD2_CAPTION' => $property->getPROP_ADD2_CAPTION(), ':PROP_ADD3_LOC' => $property->getPROP_ADD3_LOC(), ':PROP_ADD3_CAPTION' => $property->getPROP_ADD3_CAPTION(), ':PROP_MAP1_LOC' => $property->getPROP_MAP1_LOC(), ':PROP_MAP1_CAPTION' => $property->getPROP_MAP1_CAPTION(), ':PROP_MAP2_LOC' => $property->getPROP_MAP2_LOC(), ':PROP_MAP2_CAPTION' => $property->getPROP_MAP2_CAPTION(), ':PROP_MAP3_LOC' => $property->getPROP_MAP3_LOC(), ':PROP_MAP3_CAPTION' => $property->getPROP_MAP3_CAPTION(), ':PROP_ADD4_LOC' => $property->getPROP_ADD4_LOC(), ':PROP_ADD4_CAPTION' => $property->getPROP_ADD4_CAPTION(), ':PROP_KEY' => $id));
					//print_r($stmt->errorInfo());
				
					if ($r) {
						$smarty->assign('title', 'CMS Control Panel - Edit Property');
					} else {
						throw new Exception('There has been an error updating your property.');
					}
				}
			} else {
				switch ($_POST['item']) {
					case "MAIN":
						$suffix = '';
						break;
					case "PIC1":
						$suffix = 'a';
						break;
					case "PIC2":
						$suffix = 'b';
						break;
					case "PIC3":
						$suffix = 'c';
						break;
					case "PIC4":
						$suffix = 'd';
						break;
					case "PLAN1":
						$suffix = 'x';
						break;
					case "PLAN2":
						$suffix = 'y';
						break;
					case "PLAN3":
						$suffix = 'z';
						break;
					default:
						echo "Not Submitted Successfully";
						break;
				}
				$filename = 'house' . $_GET['id'] . $suffix;
				do_file_delete($filename, '.jpg', $Path);
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

					// Main Picture
					if (file_exists('../propimages/house'.$id.'.jpg')) {
						$smarty->assign('form_prop_main_img', '<img src="http://www.thorneandcarter.co.uk/propimages/house'.$id.'.jpg" width="80" height="60">');
					} else {
						$smarty->assign('form_prop_main_img', "<center><b>No<br />Picture<br />Uploaded</b></center>");
					}
					$smarty->assign('form_prop_main_loc', $property->getPROP_MAIN_LOC());
					$smarty->assign('form_prop_main_caption', $property->getPROP_MAIN_CAPTION());
					
					// Picture 1
					if (file_exists('../propimages/house'.$id.'a.jpg')) {
						$smarty->assign('form_prop_add1_img', '<img src="http://www.thorneandcarter.co.uk/propimages/house'.$id.'a.jpg" width="80" height="60">');
					} else {
						$smarty->assign('form_prop_add1_img', "<center><b>No<br />Picture<br />Uploaded</b></center>");
					}
					$smarty->assign('form_prop_add1_loc', $property->getPROP_ADD1_LOC());
					$smarty->assign('form_prop_add1_caption', $property->getPROP_ADD1_CAPTION());
					
					// Picture 2
					if (file_exists('../propimages/house'.$id.'b.jpg')) {
						$smarty->assign('form_prop_add2_img', '<img src="http://www.thorneandcarter.co.uk/propimages/house'.$id.'b.jpg" width="80" height="60">');
					} else {
						$smarty->assign('form_prop_add2_img', "<center><b>No<br />Picture<br />Uploaded</b></center>");
					}
					$smarty->assign('form_prop_add2_loc', $property->getPROP_ADD2_LOC());
					$smarty->assign('form_prop_add2_caption', $property->getPROP_ADD2_CAPTION());
					
					// Picture 3
					if (file_exists('../propimages/house'.$id.'c.jpg')) {
						$smarty->assign('form_prop_add3_img', '<img src="http://www.thorneandcarter.co.uk/propimages/house'.$id.'c.jpg" width="80" height="60">');
					} else {
						$smarty->assign('form_prop_add3_img', "<center><b>No<br />Picture<br />Uploaded</b></center>");
					}
					$smarty->assign('form_prop_add3_loc', $property->getPROP_ADD3_LOC());
					$smarty->assign('form_prop_add3_caption', $property->getPROP_ADD3_CAPTION());
					
					// Picture 4
					if (file_exists('../propimages/house'.$id.'d.jpg')) {
						$smarty->assign('form_prop_add4_img', '<img src="http://www.thorneandcarter.co.uk/propimages/house'.$id.'d.jpg" width="80" height="60">');
					} else {
						$smarty->assign('form_prop_add4_img', "<center><b>No<br />Picture<br />Uploaded</b></center>");
					}
					$smarty->assign('form_prop_add4_loc', $property->getPROP_ADD4_LOC());
					$smarty->assign('form_prop_add4_caption', $property->getPROP_ADD4_CAPTION());
					
					// Floor Plan 1
					if (file_exists('../propimages/house'.$id.'x.jpg')) {
						$smarty->assign('form_prop_plan1_img', '<img src="http://www.thorneandcarter.co.uk/propimages/house'.$id.'x.jpg" width="80" height="60">');
					} else {
						$smarty->assign('form_prop_plan1_img', "<center><b>No<br />Picture<br />Uploaded</b></center>");
					}
					$smarty->assign('form_prop_plan1_loc', $property->getPROP_MAP1_LOC());
					$smarty->assign('form_prop_plan1_caption', $property->getPROP_MAP1_CAPTION());
					
					// Floor Plan 2
					if (file_exists('../propimages/house'.$id.'y.jpg')) {
						$smarty->assign('form_prop_plan2_img', '<img src="http://www.thorneandcarter.co.uk/propimages/house'.$id.'y.jpg" width="80" height="60">');
					} else {
						$smarty->assign('form_prop_plan2_img', "<center><b>No<br />Picture<br />Uploaded</b></center>");
					}
					$smarty->assign('form_prop_plan2_loc', $property->getPROP_MAP2_LOC());
					$smarty->assign('form_prop_plan2_caption', $property->getPROP_MAP2_CAPTION());
					
					// Floor Plan 3
					if (file_exists('../propimages/house'.$id.'z.jpg')) {
						$smarty->assign('form_prop_plan3_img', '<img src="http://www.thorneandcarter.co.uk/propimages/house'.$id.'z.jpg" width="80" height="60">');
					} else {
						$smarty->assign('form_prop_plan3_img', "<center><b>No<br />Picture<br />Uploaded</b></center>");
					}
					$smarty->assign('form_prop_plan3_loc', $property->getPROP_MAP3_LOC());
					$smarty->assign('form_prop_plan3_caption', $property->getPROP_MAP3_CAPTION());
					
					// General
					$smarty->assign('prop_name', $_GET['name']);
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
											
	
	
	$smarty->assign('title', 'CMS Control Panel - Edit Property Pictures');
	
	$smarty->display('property_pics.tpl');
?>
