<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>

<?php # prop_search.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: prop_search.php
 * Version: 1.0
 */
// This page displays property search results

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

				
			
		// Search Properties
		//**********************************
			// Within (Miles)	within
			// Location			location
			// Property Type	proptype
			// Bedrooms			bedrooms
			// Minimum Price	minprice
			// Maximum Price	maxprice
			
		switch($_GET['type']) {
			case "Commercial":
				$numrows = $pdo->query('SELECT count(*) FROM PROPERTY WHERE (PROP_STATUS != "Hidden" AND PROP_HOUSE_TYPE = "Commercial")')->fetchColumn(); 
				$lastpage = ceil($numrows/$rows_per_page);
				
				if ($pageno > $lastpage) {
					$pageno = $lastpage;
				}
				if ($pageno < 1) {
					$pageno = 1;
				}
				
				$limit = 'LIMIT ' . ($pageno - 1) * $rows_per_page . ',' . $rows_per_page;			
				$q = 'SELECT PROP_REF, PROP_PRICE_PREFIX, PROP_Price, PROP_TENURE, PROP_HOUSE_TYPE, PROP_STATUS, PROP_BED, PROP_NAME, PROP_ADDRESS, PROP_POSTCODE, PROP_SUMMARY, PROP_DETAILED, PROP_MAIN_LOC, PROP_MAIN_CAPTION, PROP_ADD1_LOC, PROP_ADD1_CAPTION, PROP_ADD2_LOC, PROP_ADD2_CAPTION, PROP_ADD3_LOC, PROP_ADD3_CAPTION, PROP_MAP1_LOC, PROP_MAP1_CAPTION, PROP_MAP2_LOC, PROP_MAP2_CAPTION, PROP_MAP3_LOC, PROP_MAP3_CAPTION, PROP_SHOW_NAME, PROP_KEY, PROP_ADD4_LOC, PROP_ADD4_CAPTION, PROP_ADD_DATE, PROP_CONDITION, PROP_COPYRIGHT, PROP_PRICE_TEXT, PROP_FISH, PROP_RIGHTMOVE, PROP_COMING_SOON, PROP_EER_CUR, PROP_EER_POT, PROP_EIR_CUR, PROP_EIR_POT FROM PROPERTY WHERE (PROP_STATUS != "Hidden" AND PROP_HOUSE_TYPE = "Commercial") ORDER BY PROP_Price ASC ' . $limit;
				$smarty->assign('title', 'Commercial List - Thorne + Carter');
				break;
			case "Rental": 
				$numrows = $pdo->query('SELECT count(*) FROM PROPERTY WHERE (PROP_STATUS != "Hidden" AND PROP_HOUSE_TYPE = "Rental")')->fetchColumn(); 
				$lastpage = ceil($numrows/$rows_per_page);
				
				if ($pageno > $lastpage) {
					$pageno = $lastpage;
				}
				if ($pageno < 1) {
					$pageno = 1;
				}
				
				$limit = 'LIMIT ' . ($pageno - 1) * $rows_per_page . ',' . $rows_per_page;	
				$q = 'SELECT PROP_REF, PROP_PRICE_PREFIX, PROP_Price, PROP_TENURE, PROP_HOUSE_TYPE, PROP_STATUS, PROP_BED, PROP_NAME, PROP_ADDRESS, PROP_POSTCODE, PROP_SUMMARY, PROP_DETAILED, PROP_MAIN_LOC, PROP_MAIN_CAPTION, PROP_ADD1_LOC, PROP_ADD1_CAPTION, PROP_ADD2_LOC, PROP_ADD2_CAPTION, PROP_ADD3_LOC, PROP_ADD3_CAPTION, PROP_MAP1_LOC, PROP_MAP1_CAPTION, PROP_MAP2_LOC, PROP_MAP2_CAPTION, PROP_MAP3_LOC, PROP_MAP3_CAPTION, PROP_SHOW_NAME, PROP_KEY, PROP_ADD4_LOC, PROP_ADD4_CAPTION, PROP_ADD_DATE, PROP_CONDITION, PROP_COPYRIGHT, PROP_PRICE_TEXT, PROP_FISH, PROP_RIGHTMOVE, PROP_COMING_SOON, PROP_EER_CUR, PROP_EER_POT, PROP_EIR_CUR, PROP_EIR_POT FROM PROPERTY WHERE (PROP_STATUS != "Hidden" AND PROP_HOUSE_TYPE = "Rental") ORDER BY PROP_Price ASC ' . $limit;
				$smarty->assign('title', 'Rental List - Thorne + Carter');
				break;
			case "Sale":
				$numrows = $pdo->query('SELECT count(*) FROM PROPERTY WHERE (PROP_STATUS != "Hidden" AND PROP_HOUSE_TYPE != "Commercial" AND PROP_HOUSE_TYPE != "Rental")')->fetchColumn(); 
				$lastpage = ceil($numrows/$rows_per_page);
				
				if ($pageno > $lastpage) {
					$pageno = $lastpage;
				}
				if ($pageno < 1) {
					$pageno = 1;
				}
				
				$limit = 'LIMIT ' . ($pageno - 1) * $rows_per_page . ',' . $rows_per_page;	
				$q = 'SELECT PROP_REF, PROP_PRICE_PREFIX, PROP_Price, PROP_TENURE, PROP_HOUSE_TYPE, PROP_STATUS, PROP_BED, PROP_NAME, PROP_ADDRESS, PROP_POSTCODE, PROP_SUMMARY, PROP_DETAILED, PROP_MAIN_LOC, PROP_MAIN_CAPTION, PROP_ADD1_LOC, PROP_ADD1_CAPTION, PROP_ADD2_LOC, PROP_ADD2_CAPTION, PROP_ADD3_LOC, PROP_ADD3_CAPTION, PROP_MAP1_LOC, PROP_MAP1_CAPTION, PROP_MAP2_LOC, PROP_MAP2_CAPTION, PROP_MAP3_LOC, PROP_MAP3_CAPTION, PROP_SHOW_NAME, PROP_KEY, PROP_ADD4_LOC, PROP_ADD4_CAPTION, PROP_ADD_DATE, PROP_CONDITION, PROP_COPYRIGHT, PROP_PRICE_TEXT, PROP_FISH, PROP_RIGHTMOVE, PROP_COMING_SOON, PROP_EER_CUR, PROP_EER_POT, PROP_EIR_CUR, PROP_EIR_POT FROM PROPERTY WHERE (PROP_STATUS != "Hidden" AND PROP_HOUSE_TYPE != "Commercial" AND PROP_HOUSE_TYPE != "Rental") ORDER BY PROP_Price ASC ' . $limit;
				$smarty->assign('title', 'Sale List - Thorne + Carter');
				break;
			default: 
				$q = 'SELECT PROP_REF, PROP_PRICE_PREFIX, PROP_Price, PROP_TENURE, PROP_HOUSE_TYPE, PROP_STATUS, PROP_BED, PROP_NAME, PROP_ADDRESS, PROP_POSTCODE, PROP_SUMMARY, PROP_DETAILED, PROP_MAIN_LOC, PROP_MAIN_CAPTION, PROP_ADD1_LOC, PROP_ADD1_CAPTION, PROP_ADD2_LOC, PROP_ADD2_CAPTION, PROP_ADD3_LOC, PROP_ADD3_CAPTION, PROP_MAP1_LOC, PROP_MAP1_CAPTION, PROP_MAP2_LOC, PROP_MAP2_CAPTION, PROP_MAP3_LOC, PROP_MAP3_CAPTION, PROP_SHOW_NAME, PROP_KEY, PROP_ADD4_LOC, PROP_ADD4_CAPTION, PROP_ADD_DATE, PROP_CONDITION, PROP_COPYRIGHT, PROP_PRICE_TEXT, PROP_FISH, PROP_RIGHTMOVE, PROP_COMING_SOON, PROP_EER_CUR, PROP_EER_POT, PROP_EIR_CUR, PROP_EIR_POT FROM PROPERTY WHERE (PROP_STATUS != "Hidden"';
				
				$q .= ' AND PROP_PRICE >= '. $_GET['minprice'];
				if ($_GET['maxprice'] != 0) {$q .= ' AND PROP_PRICE <= '. $_GET['maxprice'];}
				if ($_GET['bedrooms'] != 0) {$q .= ' AND PROP_BED >= '. $_GET['bedrooms'];}
				if ($_GET['proptype'] != "Any") {$q .= ' AND PROP_HOUSE_TYPE = "'. $_GET['proptype'] .'"';}
				//within
				//location
				
				$q .= ') ORDER BY PROP_Price ASC';
				$smarty->assign('title', 'Thorne + Carter Search');
		}
			
		// Fetch the house details:
		//PROP_REF, PROP_PRICE_PREFIX, PROP_Price, PROP_TENURE, PROP_HOUSE_TYPE, PROP_STATUS, PROP_BED, PROP_NAME, PROP_ADDRESS, PROP_POSTCODE, PROP_SUMMARY, PROP_DETAILED, PROP_MAIN_LOC, PROP_MAIN_CAPTION, PROP_ADD1_LOC, PROP_ADD1_CAPTION, PROP_ADD2_LOC, PROP_ADD2_CAPTION, PROP_ADD3_LOC, PROP_ADD3_CAPTION, PROP_MAP1_LOC, PROP_MAP1_CAPTION, PROP_MAP2_LOC, PROP_MAP2_CAPTION, PROP_MAP3_LOC, PROP_MAP3_CAPTION, PROP_SHOW_NAME, PROP_KEY, PROP_ADD4_LOC, PROP_ADD4_CAPTION, PROP_ADD_DATE, PROP_CONDITION, PROP_COPYRIGHT, PROP_PRICE_TEXT, PROP_FISH, PROP_RIGHTMOVE, PROP_COMING_SOON, PROP_EER_CUR, PROP_EER_POT, PROP_EIR_CUR, PROP_EIR_POT
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute();
		
		// If the query ran okay, fetch the records into an array
		if ($r) {
			$prop = $stmt->fetchall();
			$smarty->assign('proplist', $prop);
			$smarty->assign('fullpath', $livepath);
			$smarty->assign('searchtype', $_GET['type']);
			$smarty->assign('description', 'Thorne + Carter Search');
			
			// Generate Page Navigation
			if ($pageno == 1) {
				$paging = " FIRST PREV";
			} else {
				//$paging = " <a href='{$_SERVER['PHP_SELF']}1/'>FIRST</a> ";
				$paging = " <a href='/search/" . $_GET['type'] . "/1/'>FIRST</a> ";
				$prevpage = $pageno-1;
				$paging .= " <a href='/search/" . $_GET['type'] . "/" . $prevpage . "/'>PREV</a> ";
			}
			
			$paging .= " -";
			for($i = 1; $i < $lastpage+1; $i++) { 
				$paging .= " " . "<a href='/search/" . $_GET['type'] . "/" . $i . "/'>" . $i . "</a> "; 
			} 
			$paging .= " -";
			
			if ($pageno == $lastpage) {
				$paging .= " NEXT LAST ";
			} else {
				$nextpage = $pageno+1;
				$paging .= " <a href='/search/" . $_GET['type'] . "/" . $nextpage . "/'>NEXT</a> ";
				$paging .= " <a href='/search/" . $_GET['type'] . "/" . $lastpage . "/'>LAST</a> ";
			}
			$paging .= " ( Page $pageno of $lastpage ) ";
			$smarty->assign('pagenav', $paging);
		}	
			
	} catch (Exception $e) {
		$smarty->assign('title', 'Error');
		$smarty->assign('content', '<h1>Error</h1><p>There has been an error which has stopped your page being displayed: -</p><p>' . $e->getMessage() . '</p>');
	}
	
	$smarty->display('prop_search.tpl');
?>