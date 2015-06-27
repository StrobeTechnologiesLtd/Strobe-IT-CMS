<?php # functions.inc.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: functions.inc.php
 * Version: 2.0
 */
// This page supplies all the additional basic functions


	// Function urltranslate - translates the requested URL supplied by the .htaccess file
	function urltranslate ($urlstring, $pdo) {
		// RewriteEngine on
		// RewriteRule ^page/([^/\.]+)/?$ index.php?page=$1 [L]
		//
		// Above translates the following address from and to:
		// page/software/ to index.php?page=software
	}

	// Function getDirectory - Retrieves a list of directories within the requested path
	function getDirectory( $path = '.', $level = 0 ) { 
		// Directories to ignore when listing output. 
		$ignore = array( '.', '..' ); 

		// Open the directory to the handle $dh
		$dh = @opendir( $path ); 

		// Loop through the directory 
		while( false !== ( $file = readdir( $dh ) ) ) { 
			// Check that this file is not to be ignored 
			if( !in_array( $file, $ignore ) ) { 
				// Indent spacing for better view
				$spaces = str_repeat( '&nbsp;', ( $level * 5 ) );

				// Show directories only
				if(is_dir( "$path/$file" ) ) { 
					// Re-call this same function but on a new directory. 
					// this is what makes function recursive. 
					echo "$spaces<a href='$path/$file/index.php'>$file</a><br />";
					getDirectory( "$path/$file", ($level+1) ); 
				} 
			} 
		}
		// Close the directory handle 
		closedir( $dh ); 
	}
	
	
	// Function getFolders - Retrieves a list of folders within the requested path
	function getFolders($path = '.', $addignore) { 
		// Directories to ignore when listing output. 
		$ignore = array( '.', '..' );
		$ignore[] = $addignore;

		// Open the directory to the handle $dh
		$dh = @opendir( $path ); 

		// Loop through the directory 
		while( false !== ( $file = readdir( $dh ) ) ) { 
			// Check that this file is not to be ignored 
			if( !in_array( $file, $ignore ) ) { 

				// Show directories only
				if(is_dir( "$path/$file" ) ) { 
					$folders[] = $file;
				} 
			} 
		}
		// Close the directory handle 
		closedir( $dh ); 
		
		return $folders;
	}
	
	// Function getFiles - Retrieves a list of files of type within the requested path
	function getFiles ($directory) {
		// create an array to hold directory list
		$results = array();

		// create a handler for the directory
		$handler = opendir($directory);

		// open directory and walk through the filenames
		while ($file = readdir($handler)) {

			// if file isn't this directory or its parent, add it to the results
			if ($file != "." && $file != "..") {
				$results[] = $file;
			}
		}

		// tidy up: close the handler
		closedir($handler);

		// done!
		return $results;
	}
?>