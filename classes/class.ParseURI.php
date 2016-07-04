<?php	
	require_once("../classes/class.Authentication.php");	
	require_once("../classes/class.Logging.php");
	
	class TParseURI {
		function __construct($uri) {

			$this->logging = new TLogging();

			if (preg_match('!^/([^/]+)!ismx', $uri, $pmatches)) {
				$className = $pmatches[1];
			
			} else {
				$className = 'homepage';				
				$this->logging->log("testing");
			}
				
			if (strlen($className) > 32) {
				die("unexpected error");
			}
					
			$className = preg_replace('![^a-z0-9]!ismx', '', $className);	
					
			if (file_exists("../classes/pages/class.".$className.".php")) {
				require_once("../classes/pages/class.".$className.".php");
				$pageClass = new TPageClass($className);

			} else {				
			 	 die('page not found');
			}
							 		
		}

	}
