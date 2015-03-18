<?php # login.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: login.php
 * Version: 1.0
 */
// This page displays the login screen or performs the log in / out functions


	// Need the utilities file:
	require('includes/utilities.inc.php');


	// Log the user out
	if ($_GET['status'] == 'logout') {
		//Run logout script or function
		if ($user) {
		
			// Clear the variable:
			$user = null;
			
			// Clear the session data:
			$_SESSION = array();
			
			// Clear the cookie:
			setcookie(session_name(), false, time()-3600);
			
			// Destroy the session data:
			session_destroy();
			
			// Inform the user they have been logged out:
			$smarty->assign('error', '<h1>Logged Out</h1><p>You have been successfully logged out</p>');
			
		} // End $user IF.
	}

	try {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Log the user in
	
			//retrieve username & password:
			$username = $_POST['username'];
			$password = $_POST['password'];
	
			$q = 'SELECT id, username, firstname, surname, email, pass, DATE_FORMAT(logontime, "%e %M %Y") AS logontime, DATE_FORMAT(lastlogon, "%e %M %Y") AS lastlogon, accesslevel FROM SIT_users WHERE username=:username AND pass=SHA1(:password)';
			$stmt = $pdo->prepare($q);
			$r = $stmt->execute(array(':username' => $username, ':password' => $password));
			$count = $stmt->rowCount();
			//echo 'Row Count: ' . $count . '<br />';
			//for ($i=0; $row = $stmt->fetch(); $i++){
			//	echo $i." - ".$row['username']. " " .$row['id']. " " .$row['firstname']. " " .$row['surname']. " " .$row['email']. " " .$row['pass']. " " .$row['logontime']. " " .$row['lastlogon']. " " .$row['accesslevel']."<br />";
			//}
		
			if ($count == 1) { //Book example uses IF($r) but this does not work as every username and password retrieves a results even if a blank result
				$stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
				$user = $stmt->fetch();
			
				if ($user){
					// Store in a session:
					$_SESSION['user'] = $user;
					
					// Redirect:
					header("Location:index.php");
					exit();
				} else {
					throw new Exception('There has been and error while logging you in.');
				}
			
				$smarty->assign('title', 'CMS Login');
			} else {
				throw new Exception('Invalid Username or Password.');
			}
		} else {
			$smarty->assign('title', 'CMS Login');
		}
	} catch (Exception $e) {
		$smarty->assign('title', 'Error');
		$smarty->assign('error', '<h1>Error</h1><p>There has been an error which has stopped you being logged in: -</p><p>' . $e->getMessage() . '</p>');
	}

	$smarty->display('login.tpl');
?>
