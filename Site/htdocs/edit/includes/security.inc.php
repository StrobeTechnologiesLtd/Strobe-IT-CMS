<?php # security.inc.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: security.inc.php
 * Version: 1.0
 */
// This page supplies all the security checking required

	// Function checkLogin - Checks to see if the user has been logged in
	function checkLogin($user){
		if (!$user) {
			header("Location:/edit/login.php");
			exit();
		}
	}
	
	// Function checkSecurity - Checks to see if the user has the correct security rights to view a page
	function checkSecurity ($pdo, $user, $key) {
		$q = 'SELECT id, securityno, description, settings FROM SIT_security WHERE securityno=:securityno';
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute(array(':securityno' => $user->getAccesslevel()));
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Security');
		$testsecurity = $stmt->fetch();
		
		$securityarray = $testsecurity->getSettings();
		$r = array_search($key,$securityarray,true);
		
		if (!$r) {
			header("Location:/edit/index.php");
			exit();
		}
	}
?>