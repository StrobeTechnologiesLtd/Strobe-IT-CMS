<?php # searchlist.inc.php

/**
 * Project: Strobe IT CMS - Cars Module
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: searchlist.inc.php
 * Version: 1.0
 */
// This include file gives all the additional functions for search boxes etc

	function make_list($pdo) { //pass DB information to function
		// This function returns and array of car makes
		
		$q = 'SELECT * FROM SIT_car_make ORDER BY make ASC';
		$i = 0;
		foreach ($pdo->query($q) as $row) {
			$list[$i] = $row['make'];
			$i++;
		}
		
		return $list;
	}

	
	
	
	// Script that auto runs
	// ---------------------
	
	// Generate make list and send to template
	$makelst = make_list($pdo);
	$smarty->assign('make_values', $makelst);
	$smarty->assign('make_names', $makelst);
	
	// Generate price list and send to template
	$smarty->assign('price_min_values', array(1,2000,3000,4000,5000,6000,7000,8000,9000,10000));
	$smarty->assign('price_min_names', array('No Min','&pound;2,000','&pound;3,000','&pound;4,000','&pound;5,000','&pound;6,000','&pound;7,000','&pound;8,000','&pound;9,000','&pound;10,000'));
	$smarty->assign('price_max_values', array(0,2000,3000,4000,5000,6000,7000,8000,9000,10000));
	$smarty->assign('price_max_names', array('No Max','&pound;2,000','&pound;3,000','&pound;4,000','&pound;5,000','&pound;6,000','&pound;7,000','&pound;8,000','&pound;9,000','&pound;10,000'));
?>