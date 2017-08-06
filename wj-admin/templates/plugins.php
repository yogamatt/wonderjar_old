<?php
/**
 * Wonderjar Admin Template - Plugins
 * @author Matt
 * @category admin, template
 * @version 1.0
 * @since 2017-06-08
 *
 */



if (!empty($_GET['plug_id'])) {

	if ($_GET['plug_id'] !== 'new') {

		if (!empty($_GET['action'])) {

			$action = $_GET['action'];
			
			switch($action) {

				case 'edit':
					include ($_SERVER['DOCUMENT_ROOT'] . '/wj-admin/templates/template-parts/plugins/plugin-edit.php');
					break;

				case 'delete':
					delete_plugin();
					break;

				default:
					return;
			}

		}

	} else {

		// new plugin
		include ($_SERVER['DOCUMENT_ROOT'] . '/wj-admin/templates/template-parts/plugins/plugin-new.php');

	}

} else {

	// get plugin list
	include ($_SERVER['DOCUMENT_ROOT'] . '/wj-admin/templates/template-parts/plugins/plugin-list.php');

}