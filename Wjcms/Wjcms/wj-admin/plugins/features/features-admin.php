<?php
/**
 * Wonderjar Plugin - Features
 * @author Matt
 * @category plugin
 * @version 1.0
 * @since 2017-06-11
 *
 */


// include functions file
include ($_SERVER['DOCUMENT_ROOT'] . '/wj-admin/plugins/plugin-functions.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/wj-admin/plugins/features/features.php');

// get plugin constants
// returns: $plugin_name, $plugin_dir, $plugin_url, $plugin_description
plugin_constants();



if (!empty($_POST['submit'])) {


} else {

	include ($_SERVER['DOCUMENT_ROOT'] . '/wj-admin/plugins/features/plugin-parts/layout.php');

}
