<?php # page_new.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: page_new.php
 * Version: 1.1
 */
// This page displays the new page screen & creates the required page

	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	checkSecurity($pdo, $user, "Page - New Page");

	try {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$page = new Page;
			
			// Set Page Title:
			$r = $page->setTitle($_POST['title']);
			if ($r != 1) {
				$msg = $r . '<br />';
			}
			
			// Set Page URL
			$r = $page->setUrl($_POST['url']);
			if ($r != 1) {
				$msg = $r . '<br />';
			}
			
			// Set Page Description:
			$r = $page->setDescription($_POST['description']);
			if ($r != 1) {
				$msg = $r . '<br />';
			}
			
			// Set Page Keywords:
			$r = $page->setKeywords($_POST['keywords']);
			if ($r != 1) {
				$msg = $r . '<br />';
			}
			
			// Set Page Content:
			$r = $page->setContent($_POST['body']);
			if ($r != 1) {
				$msg.= $r . '<br />';
			}
			
			// Set if Page is a Subpage:
			$page->setSubpage($_POST['subpage']);
			
			// Set Main Page ID:
			$page->setMainpageid($_POST['subid']);
			
			// Set Creator & Updater ID
			$page->setCreatorId($user->getId());
			$page->setUpdaterId($user->getId());
			
			if ($msg) {
				$smarty->assign('msg', $msg);
				$smarty->assign('form_title', $_POST['title']);
				$smarty->assign('form_url', $_POST['url']);
				$smarty->assign('form_description', $_POST['description']);
				$smarty->assign('form_keywords', $_POST['keywords']);
				$smarty->assign('form_body', $_POST['body']);
			} else {
				// SQL to insert new page:
				$q = 'INSERT INTO SIT_pages (creatorId, updaterId, title, url, content, description, keywords, dateAdded, dateUpdated, subpage, mainpageid) VALUES (:creatorId, :updaterId, :title, :url, :content, :description, :keywords, NOW(), NOW(), :subpage, :mainpageid)';
				$stmt = $pdo->prepare($q);
				$r = $stmt->execute(array(':creatorId' => $page->getCreatorId(), ':updaterId' => $page->getUpdaterId(), ':title' => $page->getTitle(), ':url' => $page->getUrl(), ':content' => $page->getContent(), ':description' => $page->getDescription(), ':keywords' => $page->getKeywords(), ':subpage' => $page->getSubpage(), ':mainpageid' => $page->getMainpageid()));
				//print_r($stmt->errorInfo());
				
				if ($r) {
					$smarty->assign('title', 'CMS Control Panel - Create a New Page');
					$smarty->assign('msg', 'Page Added Successfully');
				} else {
					throw new Exception('There has been an error adding your new page.');
				}
			}
		} else {
			$smarty->assign('title', 'CMS Control Panel - Create a New Page');
		} //End of POST check IF
	} catch (Exception $e) {	
		$smarty->assign('title', 'Error - Creating New Page');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error which has prevented you from creating the new page: -');
		$smarty->assign('error_message', $e->getMessage());
		$smarty->display('error.tpl');
		exit();
	} //End of Try Catch

	// Produce Main Page List (Sub Page of dropdown)
	$q = 'SELECT id, title FROM SIT_pages WHERE subpage=:subpage';
	$stmt = $pdo->prepare($q);
	$r = $stmt->execute(array(':subpage' => 0));
			
	// If the query ran okay, fetch the records into an array
	if ($r) {
		$subpages_option = $stmt->fetchall(PDO::FETCH_COLUMN, 1);
		$subpages_value = $stmt->fetchall(PDO::FETCH_COLUMN, 0);
		$smarty->assign('subpages_option', $subpages_option);
		$smarty->assign('subpages_value', $subpages_value);
	}
	
	$smarty->assign('subpage_options', array(
                                0 => 'FALSE',
                                1 => 'TRUE')
                                );
	$smarty->assign('subpage_select', 0);
	
	$smarty->display('page_new.tpl');
?>