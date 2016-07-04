<?php

	class TLogging {
		function __construct() {
			$this->logfile = '../logs/log_'.date('Ymd').'.txt';
					
		}
		
		
		function log($message) {
			$fp = fopen($this->logfile, 'a+');
			$logMessage = date("Y m d h:m:s", time())."|".$message.".\n";
			
			$logMessage = str_replace('/var/www/html/cpvp/', '', $logMessage);

			fwrite($fp, $logMessage);
			fclose($fp);
		}

	}
