<?php
// Controler

	require_once("../classes/class.Session.php");
	require_once("../classes/class.Logging.php");
	require_once("../classes/class.ParseURI.php");

	$Session 		= new TSession();   
	$Logging 		= new TLogging();
	$ParseURI		= new TParseURI($_SERVER['REQUEST_URI']);
		
	$Logging->log("Starting script.");
    	
		

