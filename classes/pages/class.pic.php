<?php 
	require_once("../classes/class.GeneralPageClass.php");

	class TPageClass extends TGeneralPageClass {
		function init() {
		
			$this->showHeaders();		
			$this->createContent();
			$this->showContent();
		
		}
		

		function showHeaders(){
			header("Content-Style-Type: image/jpeg");
			header("Content-Type: image/jpeg");	
		}	

	}
