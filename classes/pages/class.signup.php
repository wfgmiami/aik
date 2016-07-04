<?php 
	require_once("../classes/class.GeneralPageClass.php");
 	require_once("../classes/class.Database.php");
	require_once("../classes/class.Authentication.php");

	class TPageClass extends TGeneralPageClass {
		function init() {
			$this->database = new TDatabase();			
			if (!isset($_POST['submit'])) {			
				$this->createContent();
				$this->showContent();
			}	
		}

		function handleFormSubmission() {
			$auth = new TAuthentication();
			$user = strtoupper($this->safePost['username']);
			$pass = strtoupper($this->safePost['password']);
			
			if ($auth->checkUser($user)) {
				echo "User already exist!";
			} else {
				$sqlQuery = "insert into users (username, password) values ('".$user."','".$pass."')"; 
				$this->database->singleRowQuery($sqlQuery);

				// if the new user is created successfully 
				echo "User was created!";
			}			
		}
	}
