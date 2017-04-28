<?php

/**
 * Wonderjar Admin Options Template
 * @author Matt
 * @category admin, template
 * @version 1.0
 * @since 2017-03-17
 *
 */


// Submittal?
if (isset($_POST['submit'])) {

	// Connect to database
	wj_connect();

	/**
	 * Insert Regular Options
	 * 
	 */

	// SQL for regular options
	$sql = "INSERT INTO `options` (`option_name`,`option_value`) VALUES (?,?), (?,?)
			ON DUPLICATE KEY UPDATE 
				`option_name` = VALUES(`option_name`),
				`option_value` = VALUES(`option_value`)";

	// If $stmt for regular options
	if ($stmt = $conn->prepare($sql)) {

		// Bind params
		$stmt->bind_param("ssss", $header_type_label, $header_type, $homepage_layout_label, $homepage_layout);

		// Set param variables
		$header_type_label = 'option_header';
		$header_type = $_POST['header-type'];

		$homepage_layout_label = 'option_layout';
		$homepage_layout = $_POST['homepage-layout'];

		// Execute
		$stmt->execute();

		// Close $stmt		
		$stmt->close();

	} else {
		echo 'SQL Failed.';
	}

	/**
	 * Insert Homepage Option
	 *
	 */

	// Find and remove 'homepage' value of `page_special`
	// SQL
	$sql2 = "UPDATE `pages` SET `page_special` = ? WHERE `page_special` = ?"; 

	// If $stmt_find using $sql2
	if ($stmt_find = $conn->prepare($sql2)) {

		// Bind paramaters
		$stmt_find->bind_param("ss", $page_special_blank, $page_special);

		// Set variable paramaters
		$page_special_blank = '';
		$page_special = 'homepage';

		// Execute
		$stmt_find->execute();

		$stmt_find->close();

	} else {
		echo 'MySQL2 Failed.';
	}

	// SQL for homepage
	$sql3 = "UPDATE `pages` SET `page_special` = ? WHERE `page_title` = ?";

	// If $stmt_homepage using $sql3
	if ($stmt_homepage = $conn->prepare($sql3)) {

		// Bind paramaters
		$stmt_homepage->bind_param("ss", $home_label, $homepage);

		// Set variable paramaters
		$home_label = 'homepage';
		$homepage = $_POST['homepage'];

		$stmt_homepage->execute();

		$stmt_homepage->close();

	} else {
		echo 'MySQL3 Failed.';
	}
	
	// Close connection
	$conn->close();

	// Redirect
	header('Refresh: 1; URL=http://wonderjarcreative.com/wj-admin/index.php?page=options');
	
} else {

	// Output opening HTML
	wj_before_content($type = 'banner-section');

	?>

	<header class="admin-header">
		<h2>Global Options</h2>
	</header>

	<div class="form-contain">
		<form name="admin-options" method="post" action="/wj-admin/index.php?page=options">
			<h3 class="form-title">Select Options</h3>
			<fieldset>
				<div class="form-group">
					<label class="label-left" for="header-type">Header type:</label>
					<select name="header-type" id="header-type">
						<option value=""></option>
						<option value="relative">Relative</option>
						<option value="fixed-header">Fixed</option>
					</select>
				</div>
				<div class="form-group">
					<label class="label-left" for="homepage-layout">Homepage layout style:</label>
					<select name="homepage-layout" id="homepage-layout">
						<option value=""></option>
						<option value="single">Single Page</option>
						<option value="sections">Sections</option>
					</select>
				</div>
				<div class="form-group">
					<label class="label-left" for="homepage">Homepage:</label>
					<select name="homepage" id="homepage">
						<option name="homepage_blank" value="blank"></option>
						<?php 
						/**
						 * @function find_homepage()
						 * 
						 * FROM:
						 * /functions.php:238
						 */

							find_homepage();
						?>
					</select>	
				</div>
			</fieldset>
			<input type="submit" name="submit" value="Submit">
		</form>
	</div>

	<div class="current-options">
		
		<?php

			//Connect to database
			wj_connect();

			if ($stmt = $conn->prepare("SELECT * FROM `options` ORDER BY `id` ASC")) {
			
			$stmt->execute();

			// Get Result and Bind it
			$stmt->bind_result($option_id,$option_name,$option_value);
			
			// While loop
			while ($stmt->fetch()) {
				echo '<p>' . $option_name . ': ' . $option_value . '</p>';
			}

			//Close Statement
			$stmt->close();

			} else {
				echo 'SQL Failed';
			}

		//Close Connection
		$conn->close();

		?>

	</div>

<?php

// Output closing HTML
wj_after_content($type = 'banner-section');

// Endif
}

?>