<?php # car_pics.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: car_pics.php
 * Version: 1.0
 */
// This page displays the requested car screen & modifies the required car images

	// Need the utilities file:
	require($_SERVER['DOCUMENT_ROOT'] . '/edit/includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	//checkSecurity($pdo, $user, "Page - Edit Page");

	
	try {
		
		//Global VARS
		$filepath = $_SERVER['DOCUMENT_ROOT'] . '/modules/car/vehicles';
		// picture extensions?????
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// process changes to car

			//Allowable Picture extensions **** CHANGE THIS TO DB VARS???????
			$q = 'SELECT ext FROM SIT_car_pictype ORDER BY ext ASC';
			$stmt = $pdo->prepare($q);
			$r = $stmt->execute();
			$PicExtensions = $stmt->fetchall(PDO::FETCH_COLUMN, 0);
			//$PicExtensions = array("gif","GIF","jpg","JPG","png","PNG","bmp","BMP","pcx","PCX","tif","TIF");
			//$PicExtensions = array("jpg","JPG");
			
			//Test for main pic or not
			//if 
			
			//Test for main pic or not
			//if (file_exists($livepath . $Path . 'house' . $_GET['id'] . '.jpg')) {
				//Move on to next file
				//Find Suffix / Letter
				//$i = 96;
				//$x = '';
				//do {
					//if (file_exists($livepath . $Path . 'house' . $_GET['id'] . $x . '.jpg')) {
						//Files exists
						//$i++;
						//$x = chr($i);
					//} else {
						//File does not exist
						//$i = 120;
					//}
				//} while ($i != 120);
				//Upload File names
				//$picture = 'pic';
				//$newname = 'house' . $_GET['id'] . $x;
			//} else {
				//Upload File names
				//$picture = 'pic';
				//$newname = 'house' . $_GET['id'];
			//}
			
		
			if($_FILES[$picture]['tmp_name']) {
				$FindExtension = explode ( '.', $_FILES[$picture]['name']);
				$newname .= ".".$FindExtension[count($FindExtension)-1];
				$error = do_file_upload($picture,$filepath,2097152,$PicExtensions,true,$newname);
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
			//$inv = $_GET['inv'];

			// General
			$smarty->assign('inven_num', $_GET['inv']);
			$smarty->assign('form_action', $_SERVER['PHP_SELF'] . '?id=' . $id . '&amp;inv=' . $_GET['inv']);
			$alphalist = array();
			for ($i=97; $i<=119; $i++) { // (65=A 90=Z)(97=a 122=z)
				$x = chr($i);
			$alphalist[] = $x;
			}
			$smarty->assign('fullpath', $livepath);
			$smarty->assign('imagelist', $alphalist);
			$smarty->assign('prop_key', $id);
			
			
		} else { // else to if post check
			//$id = $_GET['id'];
			//$pname = $_GET['name'];

			// General
			$smarty->assign('inven_num', $_GET['inv']);
			$smarty->assign('id', $_GET['id']);
			$smarty->assign('form_action', $_SERVER['PHP_SELF'] . '?id=' . $_GET['id'] . '&amp;inv=' . $_GET['inv']);
			$imglist = array(); // need to generate and hold the following -- <img src="/thumb.php?pic=c{$id}p{$n}.JPG&amp;path=modules/car/vehicles&amp;width=200" alt="" width="200px" /> <input name="Deletep{$n}" type="checkbox" value="delete" />Delete
			$imgcount = array(); // generated list of possible images. EG 1, 2, 3, 4, 5, 6
			$imgexist = array(); // generated list of existing images. EG 1, 3, 4, 5
			$extlist = array();
			
			// SQL to count number of enabled picture extensions
			$q = 'SELECT COUNT(*) FROM SIT_car_pictype WHERE enabled = "YES"';
			$stmt = $pdo->prepare($q);
			$stmt->execute();
			$number_of_rows = $stmt->fetchColumn(); 
			
			// SQL to retrieve Picture Extension list:
			$q = 'SELECT ext FROM SIT_car_pictype WHERE enabled = "YES" ORDER BY ext ASC';
			$stmt = $pdo->prepare($q);
			$r = $stmt->execute();
		
			// If the query ran okay, fetch the records into an array
			if ($r) {
				$extlist = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
				$x = 1; // Loops number of pictures 
				while($x <= 8) {
					$y = 1; // Loops file extensions
					$imgcount[] = $x;
					while ($y <= $number_of_rows) {
						$filename = 'c' . $_GET['id'] . 'p' . $x . '.' . $extlist[$y-1];
						if (file_exist($filename, $filepath)) {
							$imglist[] = $filename;
							$imgexist[] = $x;
							break;
						}
						$y++;
					}
					$x++;
				}
				$smarty->assign('filelist', $imglist);
				
				// Determine if there is a free space and what the upload number will be
				$imgdiff = array_diff($imgcount, $imgexist);
				if (empty($imgdiff)) {
					// list is empty.
					$temp = 0;
				} else {
					// free space
					$temp = current($imgdiff);
				}
				$smarty->assign('picnum', $temp);
			} else {
				$smarty->assign('msg', '<h3>No Picture Types</h3><p>There are no picture types configured.</p>');
			}			
			
		} //End of POST check IF
	} catch (Exception $e) {	
		$smarty->assign('title', 'Error - Editing Car');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error which has prevented you from editing the car: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
		exit();
	} //End of Try Catch
											
	
	
	$smarty->assign('title', 'CMS Control Panel - Edit Car Pictures');
	
	$smarty->display('mod/car/car_pics.tpl');
?>
