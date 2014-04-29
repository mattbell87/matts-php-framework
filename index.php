<?php
	/*
		PHP Project Template
		
		This file brings everything together.
		It handles skins and plugins.
	*/

	//Enable errors
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	
	//Include the project class
	include('./common/objects/project.php');
	
	//Create the project object
	$project = new Project();

	// Handle the path to the page
	$path = 'index.xml';
	if (isset($_GET['path']) && 
		$_GET['path'] != "" && 
		$_GET['path'] != ".xml")
	{
		$path = $_GET['path'];
	}
	
	$project->setPath($path);
	
	//Set the skin
	$skin = './common/skins/desktop.htm';
	$project->setSkin($skin);
	
	//Add Plugins from /common/objects
	//eg. $page->addPlugin('myplugin');
	
	//Output the page
	$project->process();
?>