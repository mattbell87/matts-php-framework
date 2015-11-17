<?php
	/*
		PHP Project Template

		This file brings everything together.
		It handles the path, skins and plugins.
	*/

	//Enable errors (for debugging purposes)
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	//Include the framework
	include('app/framework.php');

	//Create the project object
	$project = Project::Instance();

	//Set the path and index file
	$path = isset($_GET['path']) ? $_GET['path'] : '';
	$project->setPath($path) ||
	$project->setPath($path.".xml") ||
	$project->setPath($path."index.xml");

	//Set the skin
	$project->setSkin('app/skins/responsive.htm');

	//Set the 404 page
	$project->set404NotFound('app/error/error404.xml');

	//You can set prefixes for CSS and JS paths (when using css and js tags in the XML)
		//eg. $project->cssPath = 'css/';
		//    $project->jsPath = 'js/';

	//Add GLOBAL Plugins from app/objects
		//eg. $project->addPlugin('myplugin.php');

	//Output the page
	$project->process();
?>
