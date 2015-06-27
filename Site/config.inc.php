<?php # config.inc.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: config.inc.php
 * Version: 1.2
 */
// This page config additional bits like DB settings and is stored so not accessible from the browser
	
	$db_username = "<USERNAME>";											// Database username
	$db_password = "<PASSWORD>";											// Database password
	$db_database = "<DB NAME>";												// Database name
	$db_host = "<DB ADDRESS / IP>";											// DNS Address or IP Address of database server
	$db_type = "mysql";														// Type of database server
	
	$livepath = "/Path/To/htdocs";											// Physical path / Scripting path to htdocs root
	
	$user_minpasslen = 5													// Minimum length of passwords
?>