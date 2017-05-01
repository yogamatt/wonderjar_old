<?php
/**
 * Wonderjar Included Functions
 * @author Matt
 * @category functions, include
 * @version 1.0
 * @since 2017-3-17
 *
 */


/*
 * @function wj_connect()
 *
 * If need quick db connect
 * connect to database
 *
 * Used: all-over
 *
 */

if (!function_exists('wj_connect')) {

	function wj_connect(){
		require ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/assets/wj-connect.php');

		global $conn;

		$conn = new mysqli('localhost', $wj_username, $wj_password, $wj_dbname);

		if ($conn->connect_error) {
	    	die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
		}

		return $conn;
	}

}

/*
 * @function wj_body_classes()
 *
 * Get body classes
 *
 * Used: /header.php
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

/*
 * @function wj_get_homepage()
 *
 * Get the homepage page
 * returns: `page_id`, `page_time`, `page_special`, `page_title`, `page_content`
 *
 * Used: /templates/homepage.php:
 *
 */

if (!function_exists('wj_get_homepage')) {

	function wj_get_homepage() {

		// Database Connection
		require ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/assets/wj-connect.php');

		$conn = new mysqli('localhost', $wj_username, $wj_password, $wj_dbname);

		if ($conn->connect_error) {
	    	die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
		}

		// Start globals
		global $page_id, $page_time, $page_special, $page_title, $page_content;

		// SQL
		$sql = "SELECT * FROM `pages` WHERE `page_special` = ?";

		if ($stmt = $conn->prepare($sql)) {

			// Bind parameters
			$stmt->bind_param("s", $pspecial);

			// Bind variable parameters
			$pspecial = 'homepage';

			// Execute
			$stmt->execute();

			// Bind result variables
			$stmt->bind_result($page_id, $page_time, $page_special, $page_title, $page_content);

			// Fetch
			$stmt->fetch();

			$stmt->close();

		}

		$conn->close();

		return array ($page_id, $page_time, $page_special, $page_title, $page_content);

	}

}




/*
 * @function wj_before_content($type)
 * @function wj_after_content($type)
 *
 */

// Outputs the opening HTML
if (!function_exists('wj_before_content')) {

	function wj_before_content($type) {

		// Switch the $type
		switch ($type) {
			case 'plain-section':
				echo '<div class="plain-section"><div class="inner-container"><div class="inner-content">';
				break;
			case 'main-section':
				echo '<div class="main-section"><div class="inner-container"><div class="inner-content">';
				break;
			default:
				echo '<div class="main-section default-section"><div class="inner-container"><div class="inner-content">';
		}
	}

}

// Outputs the closing HTML
if (!function_exists('wj_after_content')) {

	function wj_after_content($type) {

		// Switch the $type
		switch ($type) {
			case 'plain-section':
				echo '</div></div></div>';
				break;
			case 'main-section':
				echo '</div></div></div>';
				break;
			default:
				echo '</div></div></div>';
		}
	}

}

/*
 * Get homepage ID
 * Function: wj_homepage_id()
 * Used: index.php:
 *
 */

if (!function_exists('wj_homepage_id')) {

	function wj_homepage_id() {

		// Database Connection
		require ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/assets/wj-connect.php');

		$conn = new mysqli('localhost', $wj_username, $wj_password, $wj_dbname);

		if ($conn->connect_error) {
	    	die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
		}

		// Grab the homepage from `pages` -> `page_special`
		// SQL
		$sql = "SELECT `page_id` FROM `pages` WHERE `page_special` = ?";

		if ($stmt = $conn->prepare($sql)){

			// Bind parameters
			$stmt->bind_param("s", $special_home);

			// Set variable parameters
			$special_home = 'homepage';

			// Execute
			$stmt->execute();

			// Bind result variables
			$stmt->bind_result($homepage_id);

			// Fetch
			$stmt->fetch();

			$stmt->close();

		}

		$conn->close();

		echo $homepage_id;

	}

}


/*
 * @function wj_sidebar()
 *
 */

if (!function_exists('wj_sidebar')) {

	function wj_sidebar($type) {

		switch($type) {

			case 'menus':
				include ($_SERVER['DOCUMENT_ROOT'] . '/wj-admin/templates/template-parts/menus/menus-sidebar.php');
				break;

			case 'new-page':
				?>
					<aside class="sidebar">
							<header class="form-header">
								<h3 class="form-title">Single Page Options</h3>
							</header>
							<fieldset>
								<div class="form-group">
									<label for="template" class="label-top">Template:</label>
									<select name="template">
										<option></option>
										<option value="sections">Sections</option>
										<option value="single">Single Page</option>
									</select>
								</div>
							</fieldset>
					</aside>
				<?php
				;
				break;
			default:
				echo '';

		}

	}

}

/*
 * Option Generals
 * @function option_generals()
 *
 * Used:
 * /wj-admin/templates/options:123
 */

if (!function_exists('option_generals')) {

	function option_generals() {

		// Database Connection
		require ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/assets/wj-connect.php');

		$conn = new mysqli('localhost', $wj_username, $wj_password, $wj_dbname);

		if ($conn->connect_error) {
	    	die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
		}

		// Global variables
		global $option_header_type, $option_layout;

		/*
		 * option_name: 'option_header'
		 * option_value: $option_header_type
		 *
		 */

		// SQL - $sql_head
		$sql_head = "SELECT `option_value` FROM `options` WHERE `option_name` = ?";

		if ($stmt_head = $conn->prepare($sql_head)) {

			// Bind paramaters
			$stmt_head->bind_param("s", $opt_header);

			// Set variable parameters
			$opt_header = 'option_header';

			// Execute
			$stmt_head->execute();

			// Bind result variables
			$stmt_head->bind_result($option_header_type);

			// Fetch
			$stmt_head->fetch();

			// Close $stmt_head
			$stmt_head->close();
		}

		/*
		 * option_name: 'option_layout'
		 * option_value: $option_layout
		 *
		 */

		// SQL - $sql_layout
		$sql_layout = "SELECT `option_value` FROM `options` WHERE `option_name` = ?";

		if ($stmt_layout = $conn->prepare($sql_layout)) {

			// Bind parameters
			$stmt_layout->bind_param("s", $opt_layout);

			// Set variable parameters
			$opt_layout = 'option_layout';

			// Execute
			$stmt_layout->execute();

			// Bind result variables
			$stmt_layout->bind_result($option_layout);

			// Fetch
			$stmt_layout->fetch();

			// Close $stmt_layout
			$stmt_layout->close();

		}

		return array ($option_header_type, $option_layout);

		$conn->close();

	}

}


/*
 * Option Pages
 * @function option_pages()
 * 
 * Used:
 * /wj-admin/templates/options:166
 */

if (!function_exists('option_pages')) {
	
	function option_pages() {

		// Grab pages for homepage selection
		// Connect to database
		require ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/assets/wj-connect.php');

		$conn = new mysqli('localhost', $wj_username, $wj_password, $wj_dbname);

		if ($conn->connect_error) {
			die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
		}

		if ($stmt = $conn->prepare("SELECT `page_title`, `page_special` FROM `pages` ORDER BY `page_id` ASC")) {
						
			$stmt->execute();

			// Get Result and Bind it
			$stmt->bind_result($ptitle, $pspecial);

			$pages = '';
										
			// While loop
			while ($stmt->fetch()) {
				
				$pages .= '<option value="' . $ptitle . '"';

				// Add 'selected' if homepage
				if ($pspecial === 'homepage') {
					$pages .= 'selected';
				}

				$pages .= ' >' . $ptitle . '</option>';
			}

			// Close Statement
			$stmt->close();

		} else {
			echo 'SQL Failed';
		}

		// Close Connection
		$conn->close();

			
		// Echo $pages
		echo $pages;

	}

}


/*
 * Set inputs for setting menus
 * @function menu_set_inputs()
 *
 * Used: /wj-admin/templates/menu.php:25
 */

if (!function_exists('menu_set_inputs')) {

	function menu_set_inputs() {

		/* 
		 * Grab `page_id`, `page_title`
		 * for form inputs
		 */

		global $result;

		// Connect to database
		require ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/assets/wj-connect.php');

		$conn = new mysqli('localhost', $wj_username, $wj_password, $wj_dbname);

		if ($conn->connect_error) {
			die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
		}

		// SQL
		$sql = "SELECT `page_id`, `page_title` FROM `pages`";

		if ($stmt = $conn->prepare($sql)) {

			$stmt->execute();

			$stmt->bind_result($page_id, $page_title);

			$result = '';

			while ($stmt->fetch()) {

				$result .= '<div class="form-group checkbox">';
				$result .= '<input type="checkbox" id="input_' . $page_id . '" name="input_' . $page_id . '" value="' . $page_id . '">';
				$result .= '<label for="input_' . $page_id . '">' . $page_title . '</label>';
				$result .= '</div>';

			}

			$stmt->close();

		}

		$conn->close();

		echo $result;

	}

}


if (!function_exists('get_current_menu')) {

	function get_current_menu() {

		

	}

}



?>