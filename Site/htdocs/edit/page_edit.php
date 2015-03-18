<?php # page_edit.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: page_edit.php
 * Version: 1.1
 */
// This page displays the requested page screen & modifies the required page

	// Need the utilities file:
	require('includes/utilities.inc.php');

	// Check if user is logged in:
	checkLogin($user);
	
	// Check user security level:
	checkSecurity($pdo, $user, "Page - Edit Page");

	
	try {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// process changes to webpage
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
			
			// Set Updater ID
			$page->setUpdaterId($user->getId());
			
			if ($msg) {
				$smarty->assign('msg', $msg);
				$smarty->assign('form_title', $_POST['title']);
				$smarty->assign('form_url', $_POST['url']);
				$smarty->assign('form_description', $_POST['description']);
				$smarty->assign('form_keywords', $_POST['keywords']);
				$smarty->assign('form_body', $_POST['body']);
			} else {
				// Auth Changes or Submit for Approval
				if (isset($_POST['auth'])) {
					if (isset($_POST['date'])) {
						// SQL to update page including date:
						$q = 'UPDATE SIT_pages SET updaterId=:updaterId, title=:title, url=:url, content=:content, description=:description, keywords=:keywords, dateUpdated=NOW(), subpage=:subpage, mainpageid=:mainpageid WHERE id=:id';
					} else {
						// SQL to update page
						$q = 'UPDATE SIT_pages SET updaterId=:updaterId, title=:title, url=:url, content=:content, description=:description, keywords=:keywords, subpage=:subpage, mainpageid=:mainpageid WHERE id=:id';
					}
					$smarty->assign('msg', 'Page Updated Successfully');
					if (isset($_GET['authid'])) {
						$qa = 'DELETE FROM SIT_pages_auth WHERE id=:id';
						$stmt = $pdo->prepare($qa);
						$ra = $stmt->execute(array(':id' => $_GET['authid']));
					}
				} else {
					// SQL to send page to auth
					$q = 'INSERT INTO SIT_pages_auth (updaterId, title, url, content, description, keywords, subpage, mainpageid, pageid) VALUES (:updaterId, :title, :url, :content, :description, :keywords, :subpage, :mainpageid, :id)';
					$smarty->assign('msg', 'Page Submitted for Authorisation Successfully');
				}
				$stmt = $pdo->prepare($q);
				//$r = $stmt->execute(array(':creatorId' => $page->getCreatorId(), ':updaterId' => $page->getUpdaterId(), ':title' => $page->getTitle(), ':content' => $page->getContent(), ':description' => $page->getDescription(), ':keywords' => $page->getKeywords(), ':subpage' => $page->getSubpage(), ':mainpageid' => $page->getMainpageid(), ':id' => $_GET['id']));
				$r = $stmt->execute(array(':updaterId' => $page->getUpdaterId(), ':title' => $page->getTitle(), ':url' => $page->getUrl(), ':content' => $page->getContent(), ':description' => $page->getDescription(), ':keywords' => $page->getKeywords(), ':subpage' => $page->getSubpage(), ':mainpageid' => $page->getMainpageid(), ':id' => $_GET['id']));
				//print_r($stmt->errorInfo());
				
				if ($r) {
					$smarty->assign('title', 'CMS Control Panel - Edit Page');
					//$smarty->assign('msg', 'Page Updated Successfully');
				} else {
					throw new Exception('There has been an error updating your page.');
				}
			}
		} else { // else to if post check
			// display site to edit
			if (isset($_GET['pageid'])) {
				//$id = $_GET['pageid'];
				//$id = $_GET['id'];
				//$pageid = $_GET['id'];
				
    
				//$page = new records("CMS_pages_auth");
				//$page->get_records("id", $pageid);
				$q = 'SELECT id, updaterId, title, url, content, description, keywords, subpage, mainpageid, pageid FROM SIT_pages_auth WHERE id=:id';
			} else {
				//$id = $_GET['id'];
    
				$q = 'SELECT id, creatorId, updaterId, title, url, content, description, keywords, DATE_FORMAT(dateAdded, "%e %M %Y") AS dateAdded, DATE_FORMAT(dateUpdated, "%e %M %Y") AS dateUpdated, subpage, mainpageid FROM SIT_pages WHERE id=:id';
			}
			$id = $_GET['id'];
			$stmt = $pdo->prepare($q);
			$r = $stmt->execute(array(':id' => $id));
			
			// If the query ran okay, fetch the record into an object
			if ($r) {
				$stmt->setFetchMode(PDO::FETCH_CLASS, 'Page');
				$page = $stmt->fetch();
				
				// Confirm that it exists
				if ($page) {
					$smarty->assign('form_title', $page->getTitle());
					$smarty->assign('form_url', $page->getUrl());
					$smarty->assign('form_description', $page->getDescription());
					$smarty->assign('form_keywords', $page->getKeywords());
					$smarty->assign('form_body', $page->getContent());
					$smarty->assign('subpage_selected', $page->getMainpageid());
					$smarty->assign('subpage_select', $page->getSubpage());
					$smarty->assign('title', 'CMS Control Panel - Edit Page');
					if (isset($_GET['pageid'])) {
						$smarty->assign('form_action', $_SERVER['PHP_SELF'] . '?id=' . $pageid . '&authid=' . $id);
					} else {
						$smarty->assign('form_action', $_SERVER['PHP_SELF'] . '?id=' . $id);
					}
					
				} else {
					throw new Exception('An invalid page ID was provided to this page.');
				}
			} else {
				throw new Exception('An invalid page ID was provided to this page.');
			}
		} //End of POST check IF
	} catch (Exception $e) {	
		$smarty->assign('title', 'Error - Editing Page');
		$smarty->assign('error_header', 'Error');
		$smarty->assign('error_description', 'There has been an error which has prevented you from editing the page: -');
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
	
	$smarty->display('page_edit.tpl');
?>