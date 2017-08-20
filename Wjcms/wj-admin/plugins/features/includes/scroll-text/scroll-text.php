<?php
/**
 * Scroll Text Plugin Included Functions
 * @author Matt
 * @category functions, plugin, scroll-text
 * @version 1.0
 * @since 2017-06-10
 *
 */


/*
 * Check Session
 * @function check_session()
 *
 * Notes: Make sure user is logged in.
 */

if (!function_exists('check_session')) {

	function check_session() {

		// start session
		session_start();

		if (!(isset($_SESSION['admin']))) {

			header("Location: http://wonderjarcreative.com/wj-admin/login.php");
		}
	}
}


/*
 * Plugin Constants
 * @function plugin_constants()
 *
 * Notes: Gets the basic plugin constants
 * 		  returns: $plugin_name, $plugin_dir, $plugin_url, $plugin_description
 */

if (!function_exists('plugin_constants')) {

	function plugin_constants() {

		if (!empty($_GET['plug_id'])) {

			global $plugin_id, $plugin_name, $plugin_dir, $plugin_url, $plugin_description;

			// database connection
			require ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/assets/wj-connect.php');
			$conn = new mysqli('localhost', $wj_username, $wj_password, $wj_dbname);
			if ($conn->connect_error) {
		    	die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
			}

			// sql
			$sql = "SELECT `id`, `plugin_name`, `plugin_dir`, `plugin_url`, `plugin_description` FROM `plugins` WHERE `id` = ?";

			if ($stmt = $conn->prepare($sql)) {

				$stmt->bind_param("i", $param_id);

				// set param
				$param_id = $_GET['plug_id'];
				$stmt->execute();

				$stmt->bind_result($result_id, $result_name, $result_dir, $result_url, $result_description);
				$stmt->fetch();
				$stmt->close();
			}

			$conn->close();

			// change vars and return
			$plugin_id = $result_id;
			$plugin_name = $result_name;
			$plugin_dir = $result_dir;
			$plugin_url = $result_url;
			$plugin_description = $result_description;

			return array($plugin_id, $plugin_name, $plugin_dir, $plugin_url, $plugin_description);
		}
	}
}



/*
 * Plugin Stylesheets
 * @function plugin_stylesheets()
 *
 * Notes: Starts the load variable. To use, add more loads
 *
 * Used: Admin
 */

if (!function_exists('plugin_stylesheets')) {

	function plugin_stylesheets($dir) {

		// define stylesheets with starting $load variable
		global $load;

		$load = '<link rel="stylesheet" href="' . $dir . '/includes/css/scroll-text-admin.css">';

		return $load;
	}
}


/*
 * Add New Scroll Slider
 * @function add_new_scroll()
 *
 * Notes: add a new scroll slider to the database
 *
 * Used: Admin
 */

if (!function_exists('add_new_scroll')) {

	function add_new_scroll($dir, $plugin_id) {

		// configure content array
		$num = $_POST['slide-number'];
		$array = $_POST['scroll-content'];
		$combined = array_combine($num, $array);

		$content = json_encode($combined);

		// global connection
		global $conn;
		wj_connect();

		// sql
		$sql = "INSERT INTO `scroll_text` (`scroll_order`, `num_slides`, `scroll_title`, `scroll_slug`, `scroll_content`)
					VALUES(?,?,?,?,?)
					ON DUPLICATE KEY UPDATE
						`scroll_order` = VALUES(`scroll_order`),
						`num_slides` = VALUES(`num_slides`),
						`scroll_title` = VALUES(`scroll_title`),
						`scroll_slug` = VALUES(`scroll_slug`),
						`scroll_content` = VALUES(`scroll_content`)";

		if ($stmt = $conn->prepare($sql)) {

			$stmt->bind_param("iisss", $ansp_order, $ansp_num_slides, $ansp_title, $ansp_slug, $ansp_content);

			// set params
			$ansp_order = 0;
			$ansp_num_slides = 1;
			$ansp_title = $_POST['scroll-title'];
			$ansp_slug = $_POST['scroll-slug'];
			$ansp_content = $content;
			
			$stmt->execute();
			$stmt->close();

		} else {
			echo 'Scroll Text not added.';
		}

		$conn->close();
		header("Location: ". $dir . "/scroll-text-admin.php?plug_id=" . $plugin_id . "&type=edit&slug=" . $ansp_slug);
	}
}


/*
 * Return scrolling slider
 * @function return_scroll()
 *
 * Notes: Returns the single scroll via the scroll-slug
 *
 * Used: Admin
 */

if (!function_exists('return_scroll')) {

	function return_scroll() {

		// global connection and scroll vars
		global $conn, $scroll;
		wj_connect();

		// sql
		$sql = "SELECT `id`, `scroll_order`, `num_slides`, `scroll_title`, `scroll_slug`, `scroll_content`
					FROM `scroll_text` WHERE `scroll_slug` = ? LIMIT 1";

		if ($stmt = $conn->prepare($sql)) {

			$stmt->bind_param("s", $rsp_slug);
			$rsp_slug = $_GET['slug'];

			$stmt->execute();

			// bind results
			$stmt->bind_result($rsr_id, $rsr_order, $rsr_num_slides, $rsr_title, $rsr_slug, $rsr_content);
			$stmt->fetch();

			$scroll = array(
				'id' => $rsr_id,
				'order' => $rsr_order,
				'num_slides' => $rsr_num_slides,
				'title' => $rsr_title,
				'slug' => $rsr_slug,
				'content' => $rsr_content
				);

			$stmt->close();
		} else {
			echo 'Cannot return scroll.';
		}

		$conn->close();

		return $scroll;
	}
}


/*
 * Get Scroll Text Fields
 * @function get_scroll_text_fields
 *
 * Notes: Gets the text fields based on the $content[]
 *
 * Used: Admin
 */

if (!function_exists('get_scroll_text_fields')) {

	function get_scroll_text_fields($content, $plugin_dir) {

		$c = 1;
		$con_array = json_decode($content);

		foreach ($con_array as $con) {

			include($plugin_dir . '/template-parts/admin-text-fields.php');
			$c++;
		}

	}
}