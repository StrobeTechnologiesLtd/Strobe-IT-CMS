<?php # utilities.inc.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: utiliies.inc.php
 * Version: 1.0
 */
// This page needs to do the setup and configuration required by every other page

	// Load Additional configure Script
	require_once('../config.inc.php');
	
	// Load Additional include files
	require_once('edit/includes/functions.inc.php');
	

	// Load Smarty Template Engine:
	require_once('../libs/Smarty.class.php');
	$smarty = new Smarty;
	
	
	// Autoload classes from "classes" directory:
	function class_loader($class) {
		require('classes/' . $class . '.php');
	}
	
	spl_autoload_register('class_loader');
	
	
	// Start the session:
	session_start();
	
	
	// Check for a user in the session:
	$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : null;
	
	
	// Create the database connection as a PDO object:
	try {
		// Create the object:
		//$pdo = new PDO('mysql:dbname=cms;host=localhost', 'username', 'password');
		$pdo = new PDO($db_type . ':dbname=' . $db_database . ';host=' . $db_host, $db_username, $db_password);
	} catch (PDOException $e) { // Report the error!
	
		$style = 'std';
	
		define('tplDir', 'views/' . $style . '/templates/');
		define('cfgDir', 'views/' . $style . '/config/');
		define('cplDir', 'views/' . $style . '/templates_c/');
		define('cheDir', 'views/' . $style . '/cache/');
		$smarty->setTemplateDir(tplDir);
		$smarty->setCompileDir(cplDir);
		$smarty->setCacheDir(cheDir);
		$smarty->setConfigDir(cfgDir);
		
		$smarty->assign('title', 'Error');
		$smarty->assign('content', '<h1>Error</h1><p>There has been an error which has stopped your page being displayed: -</p><p>' . $e->getMessage() . '</p>');
		$smarty->display('error.tpl');
		exit();
	}
	
	
	// Get & Set Site Style
	# http://www.smarty.net/forums/viewtopic.php?t=8161
	$style_array = getFolders('./views/', "std");
	$q = 'SELECT name, VALUE FROM SIT_settings WHERE name="style"';
	foreach ($pdo->query($q) as $row) {
		$style_selected = $row['VALUE'];
	}
	//echo "style is " . $style_selected . " " . $style_array[$style_selected];
	//$style = 'blank';
	$style = $style_array[$style_selected];
	
	define('jsDir', '/views/' . $style . '/js/');
	define('cssDir', '/views/' . $style . '/css/');
	define('tplDir', 'views/' . $style . '/templates/');
	define('imgDir', '/views/' . $style . '/images/');
	define('cfgDir', 'views/' . $style . '/config/');
	define('cplDir', 'views/' . $style . '/templates_c/');
	define('cheDir', 'views/' . $style . '/cache/');

	$smarty->setTemplateDir(tplDir);
	$smarty->setCompileDir(cplDir);
	$smarty->setCacheDir(cheDir);
	$smarty->setConfigDir(cfgDir);
	
	$smarty->assign('__imgDir', imgDir); 
	$smarty->assign('__cssDir', cssDir); 
	$smarty->assign('__jsDir', jsDir); 
?>