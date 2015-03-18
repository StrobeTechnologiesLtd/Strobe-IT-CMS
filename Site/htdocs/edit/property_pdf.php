<?php # property_pics.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: property_pdf.php
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
			$Path = "/pdf/";

			//Allowable PDF extensions
			$PdfExtensions = array("pdf","PDF");
			
			
			//Upload Brochure File
			$fileupload = 'pdfbro';
			$newname = $_GET['id'];
		
			if($_FILES[$fileupload]['tmp_name']) {
				$FindExtension = explode ( '.', $_FILES[$fileupload]['name']);
				$newname .= ".".$FindExtension[count($FindExtension)-1];
				$error = do_file_upload($fileupload,$Path,5242880,$PdfExtensions,true,$newname);
			}//End of File upload
			
						
			//Delete Brochure File
			$delete ="Deletebro";
			if($_POST[$delete]=="delete") {
				$file = $livepath . $Path . $_GET['id'] . '.pdf';
				unlink($file) ;
			}//End of File Delete
			
			//Upload EPC File
			$fileupload = 'pdfepc';
			$newname = 'EPC_' . $_GET['id'];
		
			if($_FILES[$fileupload]['tmp_name']) {
				$FindExtension = explode ( '.', $_FILES[$fileupload]['name']);
				$newname .= ".".$FindExtension[count($FindExtension)-1];
				$error = do_file_upload($fileupload,$Path,5242880,$PdfExtensions,true,$newname);
			}//End of File upload
			
						
			//Delete EPC File
			$delete ="Deleteepc";
			if($_POST[$delete]=="delete") {
				$file = $livepath . $Path . 'EPC_' . $_GET['id'] . '.pdf';
				unlink($file) ;
			}//End of File Delete
			
			
			//Re-display details after submit
			$id = $_GET['id'];
			$pname = $_GET['name'];

			// General
			$smarty->assign('prop_name', $pname);
			$smarty->assign('form_action', $_SERVER['PHP_SELF'] . '?id=' . $id . '&amp;name=' . $pname);
			$smarty->assign('fullpath', $livepath);
			$smarty->assign('prop_key', $id);
			
			
		} else { // else to if post check
			$id = $_GET['id'];
			$pname = $_GET['name'];

			// General
			$smarty->assign('prop_name', $pname);
			$smarty->assign('form_action', $_SERVER['PHP_SELF'] . '?id=' . $id . '&amp;name=' . $pname);
			$smarty->assign('fullpath', $livepath);
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
											
	
	
	$smarty->assign('title', 'CMS Control Panel - Edit Property PDF');
	
	$smarty->display('property_pdf.tpl');
?>
