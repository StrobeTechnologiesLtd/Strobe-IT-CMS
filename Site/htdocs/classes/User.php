<?php # User.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: User.php
 * Version: 1.0
 */
// This script define the User class

/* Class User.
 * The class contains 9 attributes which are:
 * # id: Number
 * # username: String
 * # firstname: String
 * # surname: String
 * # email: String
 * # password: String
 * # logontime: Date
 * # lastlogon: Date
 * # accesslevel: Number
 * The attributes match the corresponding database colums.
 * The class contains 17 methods:
 * + getId() : Number
 * + getUsername() : Number
 * + getFirstname() : String
 * + getSurname() : String
 * + getEmail() : String
 * + getPassword() : String
 * + getLogontime() : Date
 * + getLastlogon() : Date
 * + getAccesslevel() : Number
 * + setUsername(u: String) : Boolean
 * + setFirstname(n: String) : Void
 * + setSurname(n: String) : Void
 * + setEmail(e: String) : Boolean
 * + setPassword(p: String) : Void
 * + setAccesslevel(A: Number) : Void
 * + retrieveUser(user: String, pass: String) : Boolean
 * + updateUser() : Void
*/

	class User {
	
		// All attributes correspond to database colums
		protected $id = null;
		protected $username = null;
		protected $firstname = null;
		protected $surname = null;
		protected $email = null;
		protected $pass = null;
		protected $logontime = null;
		protected $lastlogon = null;
		protected $accesslevel = null;
		
		
		public function getId() {
			return $this->id;
		}
		
		public function getUsername() {
			return $this->username;
		}
		
		public function getFirstname() {
			return $this->firstname;
		}
		
		public function getSurname() {
			return $this->surname;
		}
		
		public function getEmail() {
			return $this->email;
		}
		
		public function getPassword() {
			return $this->pass;
		}
		
		public function getLogontime() {
			return $this->logontime;
		}
		
		public function getLastlogon() {
			return $this->lastlogon;
		}
		
		public function getAccesslevel() {
			return $this->accesslevel;
		}
		
		public function setUsername($u) {
			if ($u) {
				$this->username = $u;
				return TRUE;
			} else {
				return 'The username is empty.';
			}
		}
		
		public function setFirstname($n) {
			if ($n) {
				$this->firstname = $n;
				return TRUE;
			} else {
				return 'The firstname is empty.';
			}
		}
		
		public function setSurname($n) {
			if ($n) {
				$this->surname = $n;
				return TRUE;
			} else {
				return 'The surname is empty.';
			}
		}
		
		public function setEmail($e) {
			if ($e) {
				$this->email = $e;
				return TRUE;
			} else {
				return 'The mail is empty.';
			}
		}
		
		public function setFirstPassword($p) {
			if ($p) {
				$this->pass = SHA1($p);
				return TRUE;
			} else {
				return 'The password is empty.';
			}
		}
		
		public function setAccesslevel($a) {
			if ($a) {
				$this->accesslevel = $a;
				return TRUE;
			} else {
				return 'The security access is empty.';
			}
		}
		
		public function setPassword($oldpassword, $password, $repassword, $user_minpasslen) {
			// Collect Old passwords:
			$oldpasswordDB = $this->getPassword(); // users old password from DB
			$oldpassword = SHA1($oldpassword); // users old password from web form
			
			try {
				if ($oldpasswordDB == $oldpassword){
					if (strlen($password) >= $user_minpasslen) {
						$password = SHA1($password); // New Password
						$repassword = SHA1($repassword); // New Passsword check
			
						if ($repassword == $password){
							$this->pass = $password;
							return 'SUCCESS';
						} else {
							throw new Exception('Your new passwords do not match.');
						} //End of new password/re-type check IF
					} else {
						throw new Exception('New password too short. Password must be 6 or more charactors.');
					} //End of Password length check IF
				} else {
					throw new Exception('Your Old password does not match the one on file.');
				} //End of Old Password check IF
			} catch (Exception $e) {
				return $e->getMessage();
			}
		}
	}
?>