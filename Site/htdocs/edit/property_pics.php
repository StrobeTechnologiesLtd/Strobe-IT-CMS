<?php # property_pics.php

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
			
			//File Path
			$Path = "/propimages/";

			//Allowable Picture extensions
			//$PicExtensions = array("gif","GIF","jpg","JPG","png","PNG","bmp","BMP","pcx","PCX","tif","TIF");
			$PicExtensions = array("jpg","JPG");
			
			//Test for main pic or not
			if (file_exists($livepath . $Path . 'house' . $_GET['id'] . '.jpg')) {
				//Move on to next file
				//Find Suffix / Letter
				$i = 96;
				$x = '';
				do {
					if (file_exists($livepath . $Path . 'house' . $_GET['id'] . $x . '.jpg')) {
						//Files exists
						$i++;
						$x = chr($i);
					} else {
						//File does not exist
						$i = 120;
					}
				} while ($i != 120);
				//Upload File names
				$picture = 'pic';
				$newname = 'house' . $_GET['id'] . $x;
			} else {
				//Upload File names
				$picture = 'pic';
				$newname = 'house' . $_GET['id'];
			}
			
		
			if($_FILES[$picture]['tmp_name']) {
				$FindExtension = explode ( '.', $_FILES[$picture]['name']);
				$newname .= ".".$FindExtension[count($FindExtension)-1];
				$error = do_file_upload($picture,$Path,2097152,$PicExtensions,true,$newname);
			}//End of File upload
			
						
			//Process files to upload or delete
			$delete ="Deletep";
			if($_POST[$delete]=="delete") {
				$file = $livepath . $Path . 'house' . $_GET['id'] . '.jpg';
				unlink($file) ;
			}
			for($i=97; $i<=119 ; $i++) {
				$x = chr($i);
				$delete ="Deletep".$x;
				if($_POST[$delete]=="delete") {
					$file = $livepath . $Path . 'house' . $_GET['id'] . $x . '.jpg';
					unlink($file) ;
				}
			}//End of File Delete
			
			
			//Re-display details after submit
			$id = $_GET['id'];
			$pname = $_GET['name'];

			// General
			$smarty->assign('prop_name', $pname);
			$smarty->assign('form_action', $_SERVER['PHP_SELF'] . '?id=' . $id . '&amp;name=' . $pname);
			$alphalist = array();
			for ($i=97; $i<=119; $i++) { // (65=A 90=Z)(97=a 122=z)
				$x = chr($i);
			$alphalist[] = $x;
			}
			$smarty->assign('fullpath', $livepath);
			$smarty->assign('imagelist', $alphalist);
			$smarty->assign('prop_key', $id);
			
			
		} else { // else to if post check
			$id = $_GET['id'];
			$pname = $_GET['name'];

			// General
			$smarty->assign('prop_name', $pname);
			$smarty->assign('form_action', $_SERVER['PHP_SELF'] . '?id=' . $id . '&amp;name=' . $pname);
			$alphalist = array();
			for ($i=97; $i<=119; $i++) { // (65=A 90=Z)(97=a 122=z)
				$x = chr($i);
			$alphalist[] = $x;
			}
			$smarty->assign('fullpath', $livepath);
			$smarty->assign('imagelist', $alphalist);
			$smarty->assign('prop_key', $id);
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
