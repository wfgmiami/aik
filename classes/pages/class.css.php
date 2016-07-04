<?php 
	require_once("../classes/class.GeneralPageClass.php");
 	require_once("../classes/class.Database.php");


	class TPageClass extends TGeneralPageClass {
		function init() {
			// $this->showHeaders();
			$this->showHeaders();
		
			$this->createContent();
//			$this->XMLPages = new TXMLPages();
//			$contentTags = $this->XMLPages->getContentTags();		


//			foreach ($contentTags as $key=>$value) {
//				$this->assignCSS($value);
//			}
			$this->showContent();
		
		}
		

		function showHeaders(){
			header("Content-Style-Type: text/css");
			header("Content-Type: text/css");	
		}

		function handleFormSubmission() {	

		}

	}
