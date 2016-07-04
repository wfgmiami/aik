<?php

	require_once("../classes/class.GeneralPageClass.php");

	class TPageClass extends TGeneralPageClass	{
		function init() {
			
			$this->createContent();
			$this->assignPlaceholder('navbar');
			$this->assignPlaceholder('applicant');
			$this->assignPlaceholder('slides');
			$this->assignPlaceholder('copyright');
			
			$this->showContent();
		}
	}
