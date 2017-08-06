<?php
/**
 * Forms Plugin Included Functions
 * @author Matt
 * @category functions, plugin, forms
 * @version 1.0
 * @since 2017-06-10
 *
 */


/**
 * Forms list
 * @function forms_list()
 *
 * Notes: Returns the forms already inserted.
 */

function forms_list($dir, $plugin_id, $plugin_url) {
	// start vars
	global $conn;
	$mark = '<ul class="forms">';

	wj_connect();

	$sql = "SELECT `id`, `name`, `slug`, `description`, `markup` FROM `forms` ORDER BY `id`";

	if ($stmt = $conn->prepare($sql)) {

		$stmt->execute();

		$stmt->bind_result($nfr_id, $nfr_name, $nfr_slug, $nfr_description, $nfr_markup);

		while ($stmt->fetch()) {

			$actions = '<a href="' . $plugin_url . '?plug_id=' . $plugin_id . '&form_id=' . $nfr_id . '&type=delete">Delete</a>';
			$actions .= '<a href="' . $plugin_url . '?plug_id=' . $plugin_id . '&form_id=' . $nfr_id . '&type=edit">Edit</a>';

			$mark .= '<li class="form-item">';
			$mark .= '<div class="form-name">';
			$mark .= '<h3><a href="' . $dir . '/forms-admin.php?plug_id=' . $plugin_id . '&form_id=' . $nfr_id . '&type=edit">';
			$mark .= $nfr_name;
			$mark .= '</a></h3>';
			$mark .= '<div class="form-description">' . $nfr_description . '</div>';
			$mark .= '</div>';
			$mark .= '<div class="form-atts">';
			$mark .= '<div class="form-actions">' . $actions . '</div>';
			$mark .= '</div>';
			$mark .= '</li>';

		}

		$stmt->close();
	}

	$conn->close();

	$mark .= '</ul>';

	echo $mark;
}


/**
 * New Form
 * @function new_form()
 *
 * Notes: Insert new form.
 */

function new_form() {
	global $conn;

	wj_connect();

	$sql = "INSERT INTO `forms` (`name`, `slug`, `description`, `markup`)
				VALUES (?, ?, ?, ?)
				ON DUPLICATE KEY UPDATE
					`name` = VALUES(`name`),
					`slug` = VALUES(`slug`),
					`description` = VALUES(`description`),
					`markup` = VALUES(`markup`)";

	if ($stmt = $conn->prepare($sql)) {
		$stmt->bind_param("ssss", $nfp_name, $nfp_slug, $nfp_description, $nfp_markup);

		$nfp_name = $_POST['form-name'];
		$nfp_slug = $_POST['form-slug'];
		$nfp_description = $_POST['form-description'];
		$nfp_markup = $_POST['form-markup'];

		if (!$stmt->execute()) {
			echo '<h4>New Form Not Submitted.</h4>';
		}

		$stmt->close();
	}

	$conn->close();
}


/**
 * Edit Form
 * @function edit_form()
 *
 * Notes: Insert edited form.
 */

function edit_form() {
	global $conn;

	wj_connect();

	$sql = "UPDATE `forms`
			SET `name` = ?,
				`slug` = ?,
				`description` = ?,
				`markup` = ?
			WHERE `id` = ?";

	if ($stmt = $conn->prepare($sql)) {
		$stmt->bind_param("ssssi", $efp_name, $efp_slug, $efp_description, $efp_markup, $efp_id);

		$efp_name = $_POST['form-name'];
		$efp_slug = $_POST['form-slug'];
		$efp_description = $_POST['form-description'];
		$efp_markup = $_POST['form-markup'];
		$efp_id = $_GET['form_id'];

		if (!$stmt->execute()) {
			echo '<h4>Form not edited.</h4>';
		}

		$stmt->close();
	}

	$conn->close();
}


/**
 * Delete Form
 * @function delete_form()
 *
 * Notes: Delete form.
 */

function delete_form() {
	global $conn;

	if (!empty($_GET['form_id'])) {

		wj_connect();

		$sql = "DELETE FROM `forms` WHERE `id` = ?";

		if ($stmt = $conn->prepare($sql)) {

			$stmt->bind_param("i", $dfp_id);
			
			$dfp_id = $_GET['form_id'];

			if ($stmt->execute()) {
				echo '<h4>Form deleted.</h4>';
			}

			$stmt->close();
		}
	
		$conn->close();

	} else {
		echo '<h4>Cannot delete via id.</h4>';
	}
}


/**
 * Get Form Constants
 * @function get_form_constants()
 *
 * Notes: Returns the single form constants via the id
 */

function get_form_constants() {
	global $conn;

	if (!empty($_GET['form_id'])) {

		wj_connect();

		$sql = "SELECT `id`, `name`, `slug`, `description`, `markup` FROM `forms` WHERE `id` = ?";

		if ($stmt = $conn->prepare($sql)) {

			$stmt->bind_param("i", $gfcp_id);
			$gfcp_id = $_GET['form_id'];

			$stmt->execute();

			$stmt->bind_result($gfcr_id, $gfcr_name, $gfcr_slug, $gfcr_description, $gfcr_markup);

			$stmt->fetch();
			$stmt->close();

			// return the constants
			return array(
				'id' => $gfcr_id,
				'name' => $gfcr_name,
				'slug' => $gfcr_slug,
				'description' => $gfcr_description,
				'markup' => $gfcr_markup,
			);
		}

		$conn->close();

	} else {

		echo 'Cannot access form via id.';

	}
}

