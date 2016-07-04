<?php

	require_once("../classes/class.GeneralPageClass.php");
	require_once("../classes/class.Database.php");


	class TPageClass extends TGeneralPageClass	{
		function init() {
//			$this->XMLPages = new TXMLPages();
//			$contentTags = $this->XMLPages->getContentTags();
			
			$this->createContent();
			$this->assignPlaceholder('navbar');
			$this->assignPlaceholder('applicant');
			$this->assignPlaceholder('slides');
			$this->assignPlaceholder('copyright');

//			foreach ($contentTags as $key=>$value) {
//				$this->assignPlaceholder($value);
//			}
			
			$this->showContent();
		}
	}
