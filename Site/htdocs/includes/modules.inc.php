<?php # modules.inc.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: modules.inc.php
 * Version: 1.0
 */
// description required

	// Add additional modules to system
	$q = 'SELECT name, VALUE FROM SIT_settings WHERE name LIKE "module%"';
	$i = 0;
	foreach ($pdo->query($q) as $row) {
		$module_value[$i] = $row['VALUE'];
		$i++;
	}
	
	// FOR LOOP???
	If ($module_value[0] == 1) {
		// enabled module
		$modpath = 'modules/' . $module_value[1];
		$modincludes = getFiles($modpath);
		foreach ($modincludes as $mod) {
			include($modpath . "/" . $mod);
		}
	}
?>