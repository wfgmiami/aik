<?php
	require_once("../classes/class.Database.php");
	require_once("../classes/class.Logging.php");

	class TAuthentication {
		function __construct() {
			// Constructor
			$this->database = new TDatabase();
			$this->logging = new TLogging();
		
		
			if ($_GET['logout'] == 1) {
				$_SESSION['loggedin'] = 0;
			}	
			if ($_SESSION['loggedin'] == 1) {
				
				$this->isAuthorized = 1;
			}
			else {
				$this->isAuthorized = 0;
			}
		}
		
		function isAuthorized($username, $password) {
			return  $this->isAuthorized;
		}
		
		function checkUserPass($user, $pass){
			$sqlQuery = "select count(*) as count from users.users where username = '".$user."' and password = '".$pass."'";	
			$result = $this->database->singleRowQuery($sqlQuery);
				
			if ($result['count'] == 1) {
				return 1;
				
			} else {
				return 0;
			}	
		}
		
		function checkUser($user){
			$sqlQuery = "select count(*) as count from users.users where username = '".$user."'";
			$result = $this->database->singleRowQuery($sqlQuery);
			
			if ($result['count'] == 0) {
				return 0;
			} else {
				return 1;
			}	
		}

		function successfulLogin() {
        		$_SESSION['loggedin'] = 1;
        	}

		function failedLogin() {
			$_SESSION['loggedin'] = 0;
		}	

		function createUser($username, $password) {
			$sqlQuery = "insert into users (username, password) values ('".$username."', '".$password."')";
			$this->Logging->log($sqlQuery);
		}
				
	}
	
	
