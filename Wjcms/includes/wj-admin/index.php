<?php

/**
 * Wonderjar Admin Index Page
 * @author Matt
 * @category admin, page
 * @version 1.0
 * @since 2017-03-17
 *
 */

// Start session
session_start();

// Is logged in?
if (!(isset($_SESSION['admin']))) {

	// Not logged in
	include ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/login.php');

} else {

	// Start $bodyclass for main <body> tag
	global $bodyclass;
	$bodyclass = 'wj-admin page ';


	// Include admin header
	include ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/header.php');

	
	// Output opening HTML
	wj_before_content($type = 'banner-section');


	// Get the template from '/wj-admin/templates/'
	// set page to to 'index.php' if not allowed
	$page = 'index';
	$disallowed_paths = array('header','footer');
	
	// Include $page
	if (!empty($_GET['page'])) {

		// Get file name
		$tmp_page = basename($_GET['page']);

		// Make sure file is allowed and exists
		if (!in_array($tmp_page,$disallowed_paths) && file_exists($_SERVER['DOCUMENT_ROOT'].'/wj-admin/templates/' . $tmp_page . '.php')) {
			
			// Update $page
			$page = $tmp_page;

		}

	}

	// Include $page
	include ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/templates/' . $page . '.php');


	// Output closing HTML
	wj_after_content($type = 'banner-secton');


	// Include footer
	include ($_SERVER['DOCUMENT_ROOT'].'/footer.php');

// Endif logged in
}

?>