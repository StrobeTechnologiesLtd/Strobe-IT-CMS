<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>

<?php # index.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: index.php
 * Version: 1.0
 */
// This page displays a single page of content

	// Need the utilities file:
	require('includes/utilities.inc.php');

	
	try {
	
		// Collect Page ID
		//urltranslate ($urlstring, $pdo)
		// Validate the page ID:
		//if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
		if (!isset($_GET['id'])){
			//throw new Exception('An invalid page `ID was provided to this page.');
			//$_GET['id'] not set so need to get the home page id
			//$pid = 1; // replace with getting home page id
			$pid = 'home';
		} else {
			$pid = $_GET['id'];
		}
		
		// Fetch the page:
		# Change this so the object retrieves.....
		$q = 'SELECT id, creatorId, updaterId, title, url, content, description, keywords, DATE_FORMAT(dateAdded, "%e %M %Y") AS dateAdded, DATE_FORMAT(dateUpdated, "%e %M %Y") AS dateUpdated,  subpage, mainpageid FROM SIT_pages WHERE url=:id';
		$stmt = $pdo->prepare($q);
		//$r = $stmt->execute(array(':id' => $_GET['id']));
		$r = $stmt->execute(array(':id' => $pid));
		
		// If the query ran okay, fetch the record into an object
		if ($r) {
			$stmt->setFetchMode(PDO::FETCH_CLASS, 'Page');
			$page = $stmt->fetch();

			// Confirm that it exists
			if ($page) {
				$smarty->assign('title', $page->getTitle());
				$smarty->assign('content', $page->getContent());
				$smarty->assign('description', $page->getDescription());
				$smarty->assign('keywords', $page->getKeywords());
				if (!$page->getSubpage()) {
					// Not a sub page
					$smarty->assign('pid', $page->getId());
				} else {
					// Is a sub page
					$smarty->assign('pid', $page->getMainpageid());
				}
				
				// Produce Site Navigation
				$q = 'SELECT id, title, url FROM SIT_pages WHERE subpage=:subpage';
				$stmt = $pdo->prepare($q);
				$r = $stmt->execute(array(':subpage' => 0));
			
				// If the query ran okay, fetch the records into an array
				if ($r) {
					$nav = $stmt->fetchall();
					$smarty->assign('sitenav', $nav);
				}
				
				
				// Produce Sub Site Navigation
				$q = 'SELECT id, title FROM SIT_pages WHERE mainpageid=:mainpageid AND subpage=1';
				$stmt = $pdo->prepare($q);
				if (!$page->getSubpage()) {
					// Not a sub page
					$r = $stmt->execute(array(':mainpageid' => $page->getId()));
				} else {
					$r = $stmt->execute(array(':mainpageid' => $page->getMainpageid()));
				}
				
				// If the query ran okay, fetch the records into an array
				if ($r) {
					$subnav = $stmt->fetchall();
					$smarty->assign('sitesubnav', $subnav);
				}
			} else {
				throw new Exception('An invalid page ID was provided to this page.');
			}
		} else {
			throw new Exception('An invalid page Id was provided to this page.');
		}
	} catch (Exception $e) {
		$smarty->assign('title', 'Error');
		$smarty->assign('content', '<h1>Error</h1><p>There has been an error which has stopped your page being displayed: -</p><p>' . $e->getMessage() . '</p>');
	}
	
	$smarty->display('index.tpl');
?>