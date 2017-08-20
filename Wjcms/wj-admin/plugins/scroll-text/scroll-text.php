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

			// global vars
			global $plugin_id, $plugin_name, $plugin_dir, $plugin_url, $plugin_description;
			
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
 * Get Num Slides
 * @function get_num_slides()
 *
 * Notes: get the num_slides
 *
 * Used: Admin
 */

if (!function_exists('get_num_slides')) {

	function get_num_slides() {

		if (!empty($_GET['slug'])) {

			// global connection
			global $conn;
			wj_connect();

			// sql
			$sql = "SELECT `num_slides` FROM `scroll_text` WHERE `scroll_slug` = ?";

			if ($stmt = $conn->prepare($sql)) {

				$stmt->bind_param("s", $gnsp_slug);
				$gnsp_slug = $_GET['slug'];

				$stmt->execute();

				$stmt->bind_result($gnsr_num_slides);
				$stmt->fetch();
				$stmt->close();

				return $gnsr_num_slides;
			}

			$conn->close();

		} else {
			echo 'No slug.';
		}
	}
}


/*
 * Add Num Slides
 * @function add_num_slides()
 *
 * Notes: add to the num_slides table
 *
 * Used: Admin
 */

if (!function_exists('add_num_slides')) {

	function add_num_slides() {

		if (!empty($_GET['slug'])) {

			// add to num_slides
			$num_slides = get_num_slides();
			$new_num_slides = $num_slides + 1;

			// global connection
			global $conn;
			wj_connect();

			$sql = "UPDATE `scroll_text` SET `num_slides` = ? WHERE `scroll_slug` = ?";

			if ($stmt = $conn->prepare($sql)) {

				$stmt->bind_param("is", $ansp_num_slides, $ansp_slug);

				// set params
				$ansp_num_slides = $new_num_slides;
				$ansp_slug = $_GET['slug'];

				$stmt->execute();
				$stmt->close();
			}

			$conn->close();
		}
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

		// if the hidden var add num sides is passed
		// add to num_slides
		if (!empty($_POST['add-num-slides'])) {
			add_num_slides();
		}

		// configure nums
		$num_slides = get_num_slides();

		if (!$num_slides) {

			$num_slides = 1;
		}

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
			$ansp_num_slides = $num_slides;
			$ansp_title = $_POST['scroll-title'];
			$ansp_slug = $_POST['scroll-slug'];
			$ansp_content = $content;
			
			$stmt->execute();
			$stmt->close();

		} else {
			echo 'Scroll Text not added.';
		}

		$conn->close();
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

	function get_scroll_text_fields($content, $plugin_url, $plugin_dir) {

		$c = 1;
		$con_array = json_decode($content);

		foreach ($con_array as $con) {

			include($plugin_dir . '/plugin-parts/admin-text-fields.php');
			$c++;
		}
	}
}


/*
 * Delete Scroll
 * @function delete_scroll
 *
 * Notes: Delete the scroll via the slug
 *
 * Used: Admin
 */

if (!function_exists('delete_scroll')) {

	function delete_scroll() {

		// global plugin vars
		global $plugin_url;
		plugin_constants();

		if (!empty($_GET['slug'])) {

			// global connection
			global $conn;
			wj_connect();

			// sql
			$sql = "DELETE FROM `scroll_text` WHERE `scroll_slug` = ?";

			if ($stmt = $conn->prepare($sql)) {

				$stmt->bind_param("s", $dsp_slug);
				$dsp_slug = $_GET['slug'];

				if ($stmt->execute()) {
					echo 'Deleted.';
				} else {
					echo 'Failed to delete.';
				}

				$stmt->close();
			}

			$conn->close();

		} else {
			echo 'No scroll to delete.';
		}
		header("Location: " . $plugin_url);
	}
}


/*
 * Delete Scroll Item
 * @function delete_scroll_item
 *
 * Notes: Delete the scroll item via the delete number
 *
 * Used: Admin
 */

if (!function_exists('delete_scroll_item')) {

	function delete_scroll_item() {

		if (!empty($_GET['slug'])) {
			
			// global connection
			global $conn;
			wj_connect();

			// get content to work with
			$sql = "SELECT `scroll_content` FROM `scroll_text` WHERE `scroll_slug` = ?";

			if ($stmt = $conn->prepare($sql)) {

				$stmt->bind_param("s", $dsip_slug);
				$dsip_slug = $_GET['slug'];

				$stmt->execute();

				$stmt->bind_result($dsir_content);
				$stmt->fetch();
				$stmt->close();

				// explode content
				$content_array = json_decode($dsir_content);

				var_dump($content_array);
			}

			$conn->close();

		} else {
			echo 'No slug.';
		}


	}
}


/*
 * Get Scroll List
 * @function get_scroll_list
 *
 * Notes: Get the list of scroll sliders for admin use
 *
 * Used: Admin
 */

if (!function_exists('get_scroll_list')) {

	function get_scroll_list() {

		// global connection and constants
		global $conn, $plugin_id, $plugin_url, $plugin_name;
		wj_connect();

		// get plugin constants
		plugin_constants();

		// sql
		$sql = "SELECT `scroll_order`, `num_slides`, `scroll_title`, `scroll_slug`
					FROM `scroll_text` ORDER BY `scroll_order`";

		if ($stmt = $conn->prepare($sql)) {

			$stmt->execute();
			$stmt->bind_result($gsl_order, $gsl_num_slides, $gsl_title, $gsl_slug);

			$mark = '<ul class="scrolls">';

			while ($stmt->fetch()) {

				// setting some link variables for actions
				$edit =  $plugin_url . '&type=edit&slug=' . $gsl_slug;
				$delete = $plugin_url . '&type=delete&slug=' . $gsl_slug;
				
				$actions = '<a href="' . $edit .'">Edit</a>';
				$actions .= '<a href="' . $delete . '">Delete</a>'; 

				// the markup
				$mark .= '<li class="scroll-item">';
				$mark .= '<div class="scroll-name">';
				$mark .= '<h3><a href="' . $edit . '">' . $gsl_title . '</a></h3>';
				$mark .= '</div>';
				$mark .= '<div class="scroll-atts">';
				$mark .= '<div class="scroll-actions">' . $actions . '</div>';
				$mark .= '</div>';
				$mark .= '</li>';
			}

			$mark .= '</ul>';

			$stmt->close();

		} else {
			echo 'No scrolls found.';
		}

		$conn->close();

		echo $mark;
	}
}

