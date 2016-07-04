<?php	
	require_once("../classes/class.GeneralPageClass.php");
	require_once("../classes/class.Database.php");
	require_once("../classes/class.Logging.php");
	
	class TPageClass extends TGeneralPageClass {

		function init() {
			$this->database = new TDatabase();			
			if (!isset($_POST['submit'])) {			
				header("Location:http://54.149.251.93/homepage");
			}	
		}

		function handleFormSubmission() {
			$this->logging = new TLogging();
						
			$fname = strtoupper($this->safePost['firstName']);
			$lname = strtoupper($this->safePost['lastName']);
			$city = strtoupper($this->safePost['city']);
			$phone = $_POST['phone'];
			$state = $_POST['state'];
			$exp = $_POST['exp'];
			//$phone = strtoupper($this->safePost['phone']);
			$email = strtoupper($this->safePost['email']);

			$dtTime = date("Y-m-d H:i:s");
			
			foreach ($_POST as $key=>$value) {
				if ($key == "submit") { break; }
					
							
				if($key == "email" && (empty($email) || $email == "INVALID EMAIL")) {
					if (empty($email)){
						$this->errApply = "email address";
					}
					elseif ($email == "INVALID EMAIL") {
						$this->errApply = "valid email address";
					}

					$this->createContent();
					$this->assignPlaceholder('navbar');
					$this->assignPlaceholder('applyFail');
					$this->assignPlaceholder('slides');
					$this->assignPlaceholder('copyright');
					$this->showContent();	
					exit();	
				}
				elseif ($key == "phone" && !empty($phone)) {
					$justNums = preg_replace("/[^0-9]/", '', $phone);
					if (strlen($justNums) != 10) {
						$this->errApply = "valid phone number";
						$this->createContent();
						$this->assignPlaceholder('navbar');
						$this->assignPlaceholder('applyFail');
						$this->assignPlaceholder('slides');
						$this->assignPlaceholder('copyright');
						$this->showContent();	
						exit();	
					}
		
				}
			   	else {
					if (empty($value)) {
					
						$this->errApply = $key;
	

						if ($this->errApply == "firstName") {
							$this->errApply = "first name";
						}	
						elseif ($this->errApply == "lastName") {
							$this->errApply = "last name";
						}
						elseif ($this->errApply == "exp") {
							$this->errApply = "work experience";
						}
					
					
					$this->createContent();
					$this->assignPlaceholder('navbar');
					$this->assignPlaceholder('applyFail');
					$this->assignPlaceholder('slides');
					$this->assignPlaceholder('copyright');
					$this->showContent();	
					exit();	
					}
 
				}

			}	
				
			//$sqlQuery = "insert into test (tfield, dfield, fname) values ('".$d."','".$d."','Alex')";
			$sqlQuery = "insert into applicants (fname, lname, city, state, phone, email, experience, tStamp) values ('".$fname."','".$lname."', '".$city."','".$state."','".$phone."', '".$email."','".$exp."', '".$dtTime."')"; 
			
			$this->database->singleRowQuery($sqlQuery);

			$msg = "First Name: ".$fname."\n"."Last Name: ".$lname."\n"."City: ".$city."\n"."State: ".$state."\n"."Phone: ".$phone."\n"."Email: ".$email."\n"."Experience: ".$exp;
			$msg=wordwrap($msg,70);
			mail("alpenchev@yahoo.com","New Driver Application",$msg);
/*			echo "<script type='text/javascript'>alert('You have successfully submitted your application')</script>"; */
			$this->createContent();
			$this->assignPlaceholder('navbar');
			$this->assignPlaceholder('applySuccess');
			$this->assignPlaceholder('slides');
			$this->assignPlaceholder('copyright');
			$this->showContent();
		}			
	}  
