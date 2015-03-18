<?php # Security.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: Security.php
 * Version: 1.0
 */
// This script define the Security class

/* Class Security.
 * The class contains 4 attributes which are:
 * # id: Number
 * # securityno: Number
 * # description: String
 * # settings: String
 * The attributes match the corresponding database colums.
 * The class contains 7 methods:
 * + getSettinglist() : Array
 * + getId() : Number
 * + getSecurityno() : Number
 * + getDescription() : String
 * + getSettings(opt: string) : String
 * + setSecurityno(sn: String) : Boolean
 * + setDescription(d: String) : Boolean
 * + setSettings(s: String) : Boolean
*/

	class Security {
	
		// All attributes correspond to database colums
		protected $id = null;
		protected $securityno = null;
		protected $description = null;
		protected $settings = null;
		
		
		public function getSettinglist() {
			$SettingsArray = array("User (Required)", "File Manager", "Page - List Pages", "Page - New Page", "Page - Edit Page", "Page - Delete Page ", "Page - List Page Approval", "Page - Delete Page Approval", "User - List Users", "User - New User", "User - Edit User", "User - Delete User", "Settings");
			return $SettingsArray;
		}
		
		public function getId() {
			return $this->id;
		}
		
		public function getSecurityno() {
			return $this->securityno;
		}
		
		public function getDescription() {
			return $this->description;
		}
		
		public function getSettings($opt) {
			if ($opt == 'DB') {
				return $this->settings;
			} else {
				$dbsettings = explode (",", $this->settings);
				return $dbsettings;
			}
		}
		
		public function setSecurityno($sn) {
			if ($sn) {
				$this->securityno = $sn;
				return TRUE;
			} else {
				return 'The Security Number is empty.';
			}
		}
		
		public function setDescription($d) {
			if ($d) {
				$this->description = $d;
				return TRUE;
			} else {
				return 'The description is empty.';
			}
		}
		
		public function setSettings($s) {
			if ($s) {
				$this->settings = implode(",", $s);
				return TRUE;
			} else {
				return 'No Settings selected.';
			}
		}
		
	}
?>