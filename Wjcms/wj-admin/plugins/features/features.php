<?php
/**
 * Features Plugin Included Functions
 * @author Matt
 * @category functions, plugin, features
 * @version 1.0
 * @since 2017-06-10
 *
 */

/*
 * Features Call
 * @function features_call()
 *
 * Notes: Return the features
 */

if (!function_exists('features_call')) {

	function features_call() {

		// database connection
		require ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/assets/wj-connect.php');
		$conn = new mysqli('localhost', $wj_username, $wj_password, $wj_dbname);
		if ($conn->connect_error) {
			die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
		}

		// sql
		$sql = "SELECT `feature_order`, `feature_title`, `feature_image`, `feature_excerpt`, `feature_content`
					FROM `features` ORDER BY `feature_order`";

		if ($stmt = $conn->prepare($sql)) {

			$stmt->execute();
			$stmt->bind_result($fc_order, $fc_title, $fc_image, $fc_excrept, $fc_content);

			$feature = '<ul>';

			while ($stmt->fetch()) {

				$feature .= '<li><h3>' . $fc_title . '</h3></li>';

			}

			$feature .= '</ul>';

			$stmt->close();

		}

		$conn->close();

		echo $feature;

	}

}


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

			return array ($plugin_id, $plugin_name, $plugin_dir, $plugin_url, $plugin_description);

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

		$load = '<link rel="stylesheet" href="' . $dir . '/includes/css/admin-features.css">';

		return $load;

	}

}



/*
 * Submit Feature
 * @function submit_feature()
 *
 * Notes: Adds the new feature to the database
 */

if (!function_exists('submit_feature')) {

	function submit_feature() {

		// database connection
		require ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/assets/wj-connect.php');
		$conn = new mysqli('localhost', $wj_username, $wj_password, $wj_dbname);
		if ($conn->connect_error) {
			die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
		}

		// sql
		$sql = "INSERT INTO `features` (`feature_order`, `feature_title`, `feature_image`, `feature_excerpt`, `feature_content`)
					VALUES (?,?,?,?,?)
					ON DUPLICATE KEY UPDATE
						`feature_order` = VALUES(`feature_order`),
						`feature_title` = VALUES(`feature_title`),
						`feature_image` = VALUES(`feature_image`),
						`feature_excerpt` = VALUES(`feature_excerpt`),
						`feature_content` = VALUES(`feature_content`)";

		if ($stmt = $conn->prepare($sql)) {

			$stmt->bind_param("issss", $sfp_order, $sfp_title, $sfp_image, $sfp_excerpt, $sfp_content);

			// set params
			$sfp_order = $_POST['feature-order'];
			$sfp_title = $_POST['feature-title'];
			$sfp_image = $_POST['feature-image'];
			$sfp_excerpt = $_POST['feature-excerpt'];
			$sfp_content = $_POST['feature-content'];

			$stmt->execute();
			$stmt->close();

		}

		$conn->close();

		header ("Refresh: 1");

	}

}



/*
 * Return Features
 * @function return_features()
 *
 * Notes: Return the list of features
 */

if (!function_exists('return_features')) {

	function return_features($dir, $plugin_id) {

		// database connection
		require ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/assets/wj-connect.php');
		$conn = new mysqli('localhost', $wj_username, $wj_password, $wj_dbname);
		if ($conn->connect_error) {
			die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
		}

		// sql
		$sql = "SELECT `id`, `feature_order`, `feature_title`, `feature_image`, `feature_excerpt`, `feature_content` FROM `features` ORDER BY `feature_order`";

		if ($stmt = $conn->prepare($sql)) {

			$stmt->execute();

			$stmt->bind_result($rfr_id, $rfr_order, $rfr_title, $rfr_image, $rfr_excerpt, $rfr_content);

			// start markup
			$mark = '<ul class="feature-items">';

			while ($stmt->fetch()) {

				$mark .= '<li class="feature-item-' . $rfr_order . '">';
				$mark .= '<div class="feature-item-container">';
				$mark .= '<div class="features-nav">';
				$mark .= '<a href="' . $dir . '/features-admin.php?plug_id=' . $plugin_id . '&feat_no=' . $rfr_id . '&type=edit">Edit</a>';
				$mark .= '</div>';
				$mark .= '<div class="feature-item-image"><img src="' . $dir . '/assets/images/icons/' . $rfr_image . '"></div>';
				$mark .= '<div class="feature-item-title"><h3><a href="' . $dir . '/features-admin.php?plug_id=' . $plugin_id . '&feat_no=' . $rfr_id . '&type=edit">' . $rfr_title . '</a></h3></div>';
				$mark .= '<div class="feature-item-excerpt">' . $rfr_excerpt . '</div>';
				$mark .= '</div>';
				$mark .= '</li>';

			}

			$mark .= '</ul>';

			$stmt->close();

		}

		$conn->close();

		echo $mark;

	}

}


/*
 * Return Feature
 * @function return_feature()
 *
 * Notes: Return single feature to edit
 */

if (!function_exists('return_feature')) {

	function return_feature() {

		// start global variables
		global $feat_id, $feat_order, $feat_title, $feat_image, $feat_excerpt, $feat_content;

		// database connection
		require ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/assets/wj-connect.php');
		$conn = new mysqli('localhost', $wj_username, $wj_password, $wj_dbname);
		if ($conn->connect_error) {
			die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
		}

		// sql
		$sql = "SELECT `id`, `feature_order`, `feature_title`, `feature_image`, `feature_excerpt`, `feature_content` FROM `features` WHERE `id` = ?";

		if ($stmt = $conn->prepare($sql)) {

			$stmt->bind_param("i", $rfp_id);

			// set param
			$rfp_id = $_GET['feat_no'];

			$stmt->execute();

			$stmt->bind_result($rfr_id, $rfr_order, $rfr_title, $rfr_image, $rfr_excerpt, $rfr_content);

			$stmt->fetch();
			$stmt->close();

		}

		$conn->close();

		// change vars and return
		$feat_id = $rfr_id;
		$feat_order = $rfr_order;
		$feat_title = $rfr_title;
		$feat_image = $rfr_image;
		$feat_excerpt = $rfr_excerpt;
		$feat_content = $rfr_content;

		return array ($feat_id, $feat_order, $feat_title, $feat_image, $feat_excerpt, $feat_content);

	}

}


/*
 * Edit Feature
 * @function edit_feature()
 *
 * Notes: Edit single feature
 */

if (!function_exists('edit_feature')) {

	function edit_feature() {

		// database connection
		require ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/assets/wj-connect.php');
		$conn = new mysqli('localhost', $wj_username, $wj_password, $wj_dbname);
		if ($conn->connect_error) {
			die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
		}

		// sql
		$sql = "UPDATE `features` SET `feature_order` = ?, `feature_title` = ?, `feature_image` = ?, `feature_excerpt` = ?, `feature_content` = ?
					WHERE `id` = ?";

		if ($stmt = $conn->prepare($sql)) {

			$stmt->bind_param("issssi", $efp_order, $efp_title, $efp_image, $efp_excerpt, $efp_content, $efp_id);

			// set params
			$efp_order = $_POST['feature-order'];
			$efp_title = $_POST['feature-title'];
			$efp_image = $_POST['feature-image'];
			$efp_excerpt = $_POST['feature-excerpt'];
			$efp_content = $_POST['feature-content'];
			$efp_id = $_GET['feat_no'];

			$stmt->execute();
			$stmt->close();

		}

		$conn->close();

		header ("Refresh: 1");

	}
}

