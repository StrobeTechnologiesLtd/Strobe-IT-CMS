<?php # utilities.inc.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: utilities.inc.php
 * Version: 1.5
 */
// This page needs to do the setup and configuration required by every other page

	// Load Additional configure Script
	//require_once('../../config.inc.php');
	require_once ($_SERVER['DOCUMENT_ROOT'] . '../../config.inc.php');
	
	// Set Include and Require Paths
	define ('ROOT',$_SERVER['DOCUMENT_ROOT'] . '/');
	define('INC_DIR',ROOT . 'edit/includes/');
	define('PLUG_DIR','http://' . $_SERVER['SERVER_NAME'] . '/edit/plugins/');
	define('MOD_DIR',ROOT . 'edit/mod/');
	define('LIB_DIR',$_SERVER['DOCUMENT_ROOT'] . '../../libs/');
	define('CLASS_DIR',ROOT . 'classes/');
	
	// Load Additional include files
	require_once(INC_DIR . 'security.inc.php');
	require_once(INC_DIR . 'functions.inc.php');
	require_once(INC_DIR . 'file_management.inc.php');
	

	// Load Smarty Template Engine:
	//require_once('../../libs/Smarty.class.php');
	require_once(LIB_DIR . 'Smarty.class.php');
	$smarty = new Smarty;
	
	
	// Autoload classes from "classes" directory:
	function class_loader($class) {
		//require('../classes/' . $class . '.php');
		require(CLASS_DIR . $class . '.php');
	}
	
	spl_autoload_register('class_loader');
	
	
	// Start the session:
	session_start();
	
	
	// Check for a user in the session:
	$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : null;
	
	
	// Set Smarty settings
	$style = 'std';
	
	define('jsDir', 'http://' . $_SERVER['SERVER_NAME'] . '/edit/views/' . $style . '/js/');
	define('cssDir', 'http://' . $_SERVER['SERVER_NAME'] . '/edit/views/' . $style . '/css/');
	define('tplDir', $_SERVER['DOCUMENT_ROOT'] . '/edit/views/' . $style . '/templates/');
	define('imgDir', 'http://' . $_SERVER['SERVER_NAME'] . '/edit/views/' . $style . '/images/');
	define('cfgDir', $_SERVER['DOCUMENT_ROOT'] . '/edit/views/' . $style . '/config/');
	define('cplDir', $_SERVER['DOCUMENT_ROOT'] . '/edit/views/' . $style . '/templates_c/');
	define('cheDir', $_SERVER['DOCUMENT_ROOT'] . '/edit/views/' . $style . '/cache/');
	//define('plugginDir', 'plugins/');
	define('plugginDir', PLUG_DIR);

	$smarty->setTemplateDir(tplDir);
	$smarty->setCompileDir(cplDir);
	$smarty->setCacheDir(cheDir);
	$smarty->setConfigDir(cfgDir);
	
	$smarty->assign('__imgDir', imgDir); 
	$smarty->assign('__cssDir', cssDir); 
	$smarty->assign('__jsDir', jsDir); 
	$smarty->assign('__plugginDir', plugginDir);
	
	
	// Create the database connection as a PDO object:
	try {
		// Create the object:
		//$pdo = new PDO('mysql:dbname=cms;host=localhost', 'username', 'password');
		$pdo = new PDO($db_type . ':dbname=' . $db_database . ';host=' . $db_host, $db_username, $db_password);
	} catch (PDOException $e) { // Report the error!
		$smarty->assign('title', 'Error');
		$smarty->assign('content', '<h1>Error</h1><p>There has been an error which has stopped your page being displayed: -</p><p>' . $e->getMessage() . '</p>');
		$smarty->display('error.tpl');
		exit();
	}
?>