<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>

<?php # car_search.php

/**
 * Project: Strobe IT CMS - Cars Module
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: car_search.php
 * Version: 1.0
 */
// This page displays search search results

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
		
		// Get Page number and set limits
		$rows_per_page = 8;
		
		if (isset($_GET['pageno'])) {
			$pageno = $_GET['pageno'];
		} else {
			$pageno = 1;
		}
		$pageno = (int)$pageno;
		
		// SQL to retrieve Picture Extension list:
		$q = 'SELECT ext FROM SIT_car_pictype WHERE enabled = "YES" ORDER BY ext ASC';
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute();
		
		// If the query ran okay, fetch the records into an array
		if ($r) {
			$extlist = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
			$smarty->assign('fileext', $extlist);
		}

				
			
		// Search Properties
		//**********************************
			// Vehicle Type		vtype
			// Vehicle Make		vmake
			// Minimum Price	minprice
			// Maximum Price	maxprice
			
		switch($_GET['vehicle']) {
			case "car":
				//$numrows = $pdo->query('SELECT count(*) FROM SIT_car_cars WHERE (PROP_STATUS != "Hidden" AND vehicle = "car")')->fetchColumn(); 
				$numrows = $pdo->query('SELECT count(*) FROM SIT_car_cars WHERE vehicle = "car"')->fetchColumn(); 
				$lastpage = ceil($numrows/$rows_per_page);
				
				if ($pageno > $lastpage) {
					$pageno = $lastpage;
				}
				if ($pageno < 1) {
					$pageno = 1;
				}
				
				$limit = 'LIMIT ' . ($pageno - 1) * $rows_per_page . ',' . $rows_per_page;
				$q = 'SELECT id, vehicle, make, model, year, price, vat, fuel, transmission, colour, minidescription, features, fulldescription, miles, inven_num, special FROM SIT_car_cars WHERE vehicle = "car" ORDER BY price ASC ' . $limit;
				$smarty->assign('title', 'Car List - Devco MVS');
				break;
			case "van": 
				$numrows = $pdo->query('SELECT count(*) FROM SIT_car_cars WHERE vehicle = "van"')->fetchColumn(); 
				$lastpage = ceil($numrows/$rows_per_page);
				
				if ($pageno > $lastpage) {
					$pageno = $lastpage;
				}
				if ($pageno < 1) {
					$pageno = 1;
				}
				
				$limit = 'LIMIT ' . ($pageno - 1) * $rows_per_page . ',' . $rows_per_page;	
				$q = 'SELECT id, vehicle, make, model, year, price, vat, fuel, transmission, colour, minidescription, features, fulldescription, miles, inven_num, special FROM SIT_car_cars WHERE vehicle = "van" ORDER BY price ASC ' . $limit;
				$smarty->assign('title', 'Van List - Devco MVS');
				break;
			default: 
				$q = 'SELECT id, vehicle, make, model, year, price, vat, fuel, transmission, colour, minidescription, features, fulldescription, miles, inven_num, special FROM SIT_car_cars';
				
				$q .= ' WHERE (';
				$q .= 'price >= '. $_POST['minprice'];
				if ($_POST['maxprice'] != 0) { $q .= ' AND price <= '. $_POST['maxprice']; }
				if ($_POST['vmake'] != "All") { $q .= ' AND make = "'. $_POST['vmake'] .'"'; }
				if ($_POST['vtype']) { $q .= ' AND vehicle = "'. $_POST['vtype'] .'"'; }
				$q .= ')';
				
				$q .= ' ORDER BY price ASC';
				$smarty->assign('title', 'Devco MVS Search');
		}
			
		// Fetch the car details:
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute();
		
		// If the query ran okay, fetch the records into an array
		if ($r) {
			$veh = $stmt->fetchall();
			$smarty->assign('vehlist', $veh);
			$smarty->assign('fullpath', $_SERVER['DOCUMENT_ROOT']);
			$smarty->assign('vehtype', $_GET['vehicle']);
			$smarty->assign('description', 'Devco MVS Search');
			
			// Generate Page Navigation
			if ($pageno == 1) {
				$paging = " FIRST PREV";
			} else {
				//$paging = " <a href='{$_SERVER['PHP_SELF']}1/'>FIRST</a> ";
				$paging = " <a href='/search/vehicle/" . $_GET['vehicle'] . "/1/'>FIRST</a> ";
				$prevpage = $pageno-1;
				$paging .= " <a href='/search/vehicle/" . $_GET['vehicle'] . "/" . $prevpage . "/'>PREV</a> ";
			}
			
			$paging .= " -";
			for($i = 1; $i < $lastpage+1; $i++) { 
				$paging .= " " . "<a href='/search/vehicle/" . $_GET['vehicle'] . "/" . $i . "/'>" . $i . "</a> "; 
			} 
			$paging .= " -";
			
			if ($pageno == $lastpage) {
				$paging .= " NEXT LAST ";
			} else {
				$nextpage = $pageno+1;
				$paging .= " <a href='/search/vehicle/" . $_GET['vehicle'] . "/" . $nextpage . "/'>NEXT</a> ";
				$paging .= " <a href='/search/vehicle/" . $_GET['vehicle'] . "/" . $lastpage . "/'>LAST</a> ";
			}
			$paging .= " ( Page $pageno of $lastpage ) ";
			$smarty->assign('pagenav', $paging);
		}	
			
	} catch (Exception $e) {
		$smarty->assign('title', 'Error');
		$smarty->assign('content', '<h1>Error</h1><p>There has been an error which has stopped your page being displayed: -</p><p>' . $e->getMessage() . '</p>');
	}
	
	$smarty->display('car_search.tpl');
?>