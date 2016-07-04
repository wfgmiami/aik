<?php
	require_once("../classes/class.Logging.php");
	class TDatabase {
		function __construct() {
			$this->Logging = new TLogging();
		
			if($this->database = mysqli_connect("localhost", "root","cpvp_sql","users")) {
				$this->Logging->log(__FILE__."||". __CLASS__."||".__LINE__."||Connected to database");
				//$sqlQuery = "select * from users.users";
				//$result = $this->singleRowQuery($sqlQuery);
	
			} else {
    			$this->Logging->log("Could not connect");
			}	
			
			}
			function multiRowQuery($sqlQuery) {			
				$result = $this->database->query($sqlQuery);
				$rows = array();

				while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					$returnArray[] = $rows;
				}
				return $returnArray;							
	    	}
				
			function singleRowQuery($sqlQuery) {
				$result = $this->database->query($sqlQuery);
				$rows = array();

				while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					return $rows;				
				}
				return 0;	
			}	
			
	}
									

