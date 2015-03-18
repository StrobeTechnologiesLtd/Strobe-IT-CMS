<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>

<?php # prop_search.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: prop_detail.php
 * Version: 1.0
 */
// This page displays property details

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
				
		$pid = $_GET['ref'];	
		$q = 'SELECT PROP_REF, PROP_PRICE_PREFIX, PROP_PRICE, PROP_TENURE, PROP_HOUSE_TYPE, PROP_STATUS, PROP_BED, PROP_NAME, PROP_ADDRESS, PROP_POSTCODE, PROP_SUMMARY, PROP_DETAILED, PROP_MAIN_LOC, PROP_MAIN_CAPTION, PROP_ADD1_LOC, PROP_ADD1_CAPTION, PROP_ADD2_LOC, PROP_ADD2_CAPTION, PROP_ADD3_LOC, PROP_ADD3_CAPTION, PROP_MAP1_LOC, PROP_MAP1_CAPTION, PROP_MAP2_LOC, PROP_MAP2_CAPTION, PROP_MAP3_LOC, PROP_MAP3_CAPTION, PROP_SHOW_NAME, PROP_KEY, PROP_ADD4_LOC, PROP_ADD4_CAPTION, PROP_ADD_DATE, PROP_CONDITION, PROP_COPYRIGHT, PROP_PRICE_TEXT, PROP_FISH, PROP_RIGHTMOVE, PROP_COMING_SOON, PROP_EER_CUR, PROP_EER_POT, PROP_EIR_CUR, PROP_EIR_POT FROM PROPERTY WHERE PROP_REF = :PROP_REF';
			
		// Fetch the house details:
		//PROP_REF, PROP_PRICE_PREFIX, PROP_Price, PROP_TENURE, PROP_HOUSE_TYPE, PROP_STATUS, PROP_BED, PROP_NAME, PROP_ADDRESS, PROP_POSTCODE, PROP_SUMMARY, PROP_DETAILED, PROP_MAIN_LOC, PROP_MAIN_CAPTION, PROP_ADD1_LOC, PROP_ADD1_CAPTION, PROP_ADD2_LOC, PROP_ADD2_CAPTION, PROP_ADD3_LOC, PROP_ADD3_CAPTION, PROP_MAP1_LOC, PROP_MAP1_CAPTION, PROP_MAP2_LOC, PROP_MAP2_CAPTION, PROP_MAP3_LOC, PROP_MAP3_CAPTION, PROP_SHOW_NAME, PROP_KEY, PROP_ADD4_LOC, PROP_ADD4_CAPTION, PROP_ADD_DATE, PROP_CONDITION, PROP_COPYRIGHT, PROP_PRICE_TEXT, PROP_FISH, PROP_RIGHTMOVE, PROP_COMING_SOON, PROP_EER_CUR, PROP_EER_POT, PROP_EIR_CUR, PROP_EIR_POT
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute(array(':PROP_REF' => $pid));
		
		// If the query ran okay, fetch the records into an array
		if ($r) {
			$stmt->setFetchMode(PDO::FETCH_CLASS, 'Est_Property');
			$property = $stmt->fetch();
			
				// Confirm that it exists
				if ($property) {
					$smarty->assign('fullpath', $livepath);
					$smarty->assign('prop_name', $property->getPROP_ADDRESS());
					$smarty->assign('prop_bed', $property->getPROP_BED());
					$smarty->assign('prop_price', $property->getPROP_PRICE());
					$smarty->assign('detaildescription', $property->getPROP_DETAILED());
					$smarty->assign('prop_key', $property->getPROP_KEY());
					$smarty->assign('prop_postcode', $property->getPROP_POSTCODE());
					$smarty->assign('price_text', $property->getPROP_PRICE_TEXT());
					$smarty->assign('prop_type', $property->getPROP_HOUSE_TYPE());
					
					$alphalist = array();
					for ($i=97; $i<=119; $i++) { // (65=A 90=Z)(97=a 122=z)
						$x = chr($i);
						$alphalist[] = $x;
						//print $x;
					}
					$smarty->assign('fullpath', $livepath);
					$smarty->assign('imagelist', $alphalist);
				} else {
					throw new Exception('An invalid property Ref was provided to this page.');
				}
		} else {
			throw new Exception('An invalid property Ref was provided to this page.');
		}	
			
	} catch (Exception $e) {
		$smarty->assign('title', 'Error');
		$smarty->assign('content', '<h1>Error</h1><p>There has been an error which has stopped your page being displayed: -</p><p>' . $e->getMessage() . '</p>');
	}
	
	$smarty->display('prop_detail.tpl');
?>