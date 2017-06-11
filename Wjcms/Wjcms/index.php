<?php
/**
 * Wonderjar Index Page
 * @author Matt
 * @category page
 * @version 1.0
 * @since 2017-03-17
 *
 */

// Start session
session_start();

// Start $bodyclass for main <body> tag
global $bodyclass;
$bodyclass = '';

// Include functions
include ($_SERVER['DOCUMENT_ROOT'].'/functions.php');


// Get the template from '/templates/'
// set page to to 'index.php' if not allowed
$page = 'index';
$disallowed_paths = array('header','footer');
	
// Include $page
if (!empty($_GET['page'])) {

	// Get file name
	$tmp_page = basename($_GET['page']);

	// Make sure file is allowed and exists
	if (!in_array($tmp_page,$disallowed_paths) && file_exists($_SERVER['DOCUMENT_ROOT'].'/templates/' . $tmp_page . '.php')) {
			
		// Update $page
		$page = $tmp_page;
	}
}


// Include $page
include ($_SERVER['DOCUMENT_ROOT'].'/templates/' . $page . '.php');


?>