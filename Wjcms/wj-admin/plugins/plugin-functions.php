<?php
/**
 * Plugin Functions
 * @author Matt
 * @category functions, plugin
 * @version 1.0
 * @since 2017-06-10
 *
 */


/*
 * Plugin Functions Files
 * @function plugin_functions_files()
 *
 * Notes: Load the plugins functions files
 */

if (!function_exists('plugin_functions_files')) {

	function plugin_functions_files($plugin_dir, $plugin_url) {

		if (!empty($plugin_dir)) {

			$folder = str_replace("", "", $plugin_dir);

			$file = str_replace("http://wonderjarcreative.com/wj-admin/plugins", "", $plugin_url);
			$file = str_replace("-admin.php", "", $file) . '.php';

			include ($plugin_dir . $file);

			echo $plugin_dir . $file;

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

			global $plugin_name, $plugin_dir, $plugin_url, $plugin_description;

			// database connection
			require ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/assets/wj-connect.php');
			$conn = new mysqli('localhost', $wj_username, $wj_password, $wj_dbname);
			if ($conn->connect_error) {
		    	die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
			}

			// sql
			$sql = "SELECT `plugin_name`, `plugin_dir`, `plugin_url`, `plugin_description` FROM `plugins` WHERE `id` = ?";

			if ($stmt = $conn->prepare($sql)) {

				$stmt->bind_param("i", $param_id);

				// set param
				$param_id = $_GET['plug_id'];
				$stmt->execute();

				$stmt->bind_result($result_name, $result_dir, $result_url, $result_description);
				$stmt->fetch();
				$stmt->close();

			}

			$conn->close();

			// change vars and return
			$plugin_name = $result_name;
			$plugin_dir = $result_dir;
			$plugin_url = $result_url;
			$plugin_description = $result_description;

			return array ($plugin_name, $plugin_dir, $plugin_url, $plugin_description);

		}

	}

}