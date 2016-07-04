<?php 

	require_once("../classes/class.GeneralPageClass.php");
	require_once("../classes/class.Authentication.php");

	class TPageClass extends TGeneralPageClass	{
		function init() {
			if (!isset($_POST['submit'])) {
				$this->createContent();
				$this->assignPlaceholder('navbar');
				$this->assignPlaceholder('slides');
				$this->assignPlaceholder('copyright');
				$this->showContent();
			}
		}

		function handleFormSubmission() {
			$auth = new TAuthentication();
			$user = strtoupper($this->safePost['username']);
			$pass = strtoupper($this->safePost['password']);
			if ($_SESSION['loggedin']){
				echo "already logged in session";}	
			else{
				if ($auth->checkUserPass($user, $pass)){
					echo "User logged in!";
					$auth->successfulLogin();
					echo($_SESSION['loggedin']);
				} else {
					$this->createContent();
					$this->assignPlaceholder('navbar');
				
					$this->showContent();
					$auth->failedLogin();
					echo($_SESSION['loggedin']);
					echo "User does not exist!";
				}	
			}
				
		}
	}
			// $sqlQuery = "select count(*) as count from users.users where username = '".$this->safePost['username']."' and password = '".$this->safePost['password']."'";
			// print_r($this->database->singleRowQuery($sqlQuery));
			
