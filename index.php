<?php
	/*
		PHP Project Template

		This file brings everything together.
		It handles the path, skins and plugins.
	*/

	//Enable errors (for debugging purposes)
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	//Include the project class
	include('app/objects/project.php');

	//Create the project object
	$project = Project::Instance();

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
	$skin = 'app/skins/responsive.htm';
	$project->setSkin($skin);

	//You can set prefixes for CSS and JS paths (when using css and js tags in the XML)
		//eg. $project->cssPath = 'css/';
		//    $project->jsPath = 'js/';

	//Add GLOBAL Plugins from app/objects
		//eg. $project->addPlugin('myplugin.php');

	//Output the page
	$project->process();
?>
