<?php
/**
 * Wonderjar Plugin - Forms
 * @author Matt
 * @category plugin
 * @version 1.0
 * @since 2017-06-11
 *
 */


// include functions files
include ($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/wj-admin/plugins/plugin-functions.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/wj-admin/plugins/forms/forms.php');

// make sure user is logged in
check_session();

// get plugin constants
// returns: $plugin_id, $plugin_name, $plugin_dir, $plugin_url, $plugin_description
plugin_constants();

// define directory
$location = 'http://wonderjarcreative.com';
$dir = $location . strstr($plugin_dir, "/wj-admin");

// load stylesheets using the plugin directory
plugin_stylesheets($dir);

// shortcode vars using plugin directory
$name = 'forms';
$call = 'forms_call';
$include = $plugin_dir . '/forms.php';

// add shortcode
add_shortcode($name, $call, $include);


// page types
if (!empty($_GET['type'])) {

	$type = $_GET['type'];

	switch ($type) {
		case 'new':
			include ($plugin_dir . '/plugin-parts/admin/forms-new.php');
		break;

		case 'edit':
			include ($plugin_dir . '/plugin-parts/admin/forms-edit.php');
		break;

		case 'delete':
			delete_form();
			header("Location: http://wonderjarcreative.com/wj-admin/plugins/forms/forms-admin.php?plug_id=" . $plugin_id);
		break;
		
		default: 
			include ($plugin_dir . '/plugin-parts/admin/forms-layout.php');
		break;
	}

} else {

	// main forms layout
	include ($plugin_dir . '/plugin-parts/admin/forms-layout.php');

}





