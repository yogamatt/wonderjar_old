<?php

/**
 * Wonderjar Included Functions
 * @author Matt
 * @category functions, include
 * @version 1.0
 * @since 2017-3-17
 *
 */


/**
 * Database Connection
 *
 */

// Find WonderJar Root
if (!function_exists('wj_root_dir')) {

	function wj_root_dir(){
		global $folder_spot;
		$root = $_SERVER['DOCUMENT_ROOT'];
	}

}

// If need quick db connect
// connect to database

if (!function_exists('wj_connect')) {

	function wj_connect(){
		require ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/assets/wj-connect.php');

		global $conn;

		$conn = new mysqli('localhost', $wj_username, $wj_password, $wj_dbname);

		if ($conn->connect_error) {
	    	die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
		}
	}

}

/**
 * Content Helpers
 *
 */

// Body classes
if (!function_exists('wj_body_classes')) {

	function wj_body_classes($bodyclass) {

		// Database Connection
		require ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/assets/wj-connect.php');

		$conn = new mysqli('localhost', $wj_username, $wj_password, $wj_dbname);

		if ($conn->connect_error) {
	    	die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
		}


		// SQL
		if ($stmt = $conn->prepare("SELECT `option_value` FROM `options` ORDER BY `id` DESC")) {
		
			$stmt->execute();

			// Bind results to var $options
			$stmt->bind_result($options);

			// Start $bodyclass and $row array()
			if (!isset($bodyclass)) {
				$bodyclass = '';
			}
			$row = array();


			// Using while loop for multiple database rows
			while ($stmt->fetch()) {

				// Set values array() into $row array()
				$row[] = array('options' => $options);
			
				$bodyclass .= $options . ' ';
			}

			// Close connection
			$conn->close();

		}

		// Output $bodyclass
		// echoing into <body> tag
		echo $bodyclass;

	}

}


// Is this the home page?
if (!function_exists('wj_is_home_page')) {

	function wj_is_home_page() {
		
		// Database Connection
		require ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/assets/wj-connect.php');

		$conn = new mysqli('localhost', $wj_username, $wj_password, $wj_dbname);

		if ($conn->connect_error) {
	    	die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
		}


		// SQL
		if ($stmt = $conn->prepare("SELECT `option_value` FROM `options` WHERE `option_name` = 'option_homepage' LIMIT 1")) {
		
			$stmt->execute();

			// Bind results to var $options
			$stmt->bind_result($homepage);

		}

		echo $homepage;

		/* Initialize $pageid
		$pageid = '';

		if ($home_page === $pageid) {
			return 1;
		}
		*/
	
		$conn->close();

	}

}



// Outputs the opening HTML
if (!function_exists('wj_before_content')) {

	function wj_before_content($type) {

		// Switch the $type
		switch ($type) {
			case 'banner-section':
				echo '<section class="main-section banner-section"><div class="inner-container"><div class="section-content">';
				break;
			case 'main-section':
				echo '<section class="main-section"><div class="inner-container"><div class="section-content">';
				break;
			default:
				echo '<section class="main-section default-section"><div class="inner-container"><div class="section-content">';
		}
	}

}


// Outputs the closing HTML
if (!function_exists('wj_after_content')) {

	function wj_after_content($type) {

		// Switch the $type
		switch ($type) {
			case 'banner-section':
				echo '</section></div></div>';
				break;
			case 'main-section':
				echo '</section></div></div>';
				break;
			default:
				echo '</section></div></div>';
		}
	}

}


?>