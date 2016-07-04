<?php 
	require_once("../classes/class.GeneralPageClass.php");

	class TPageClass extends TGeneralPageClass {
		function init() {
		
			$this->showHeaders();		
			$this->createContent();
			$this->showContent();
		
		}
		

		function showHeaders(){
			header("Content-Style-Type: application/javascript");
			header("Content-Type: application/javascript");	
		}	

	}
