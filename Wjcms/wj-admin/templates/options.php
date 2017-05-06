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

	/*
	 * Insert Regular Options
	 * 
	 */

	// SQL for regular options
	$sql1 = "INSERT INTO `options` (`option_name`,`option_value`) VALUES (?,?), (?,?)
			ON DUPLICATE KEY UPDATE 
				`option_name` = VALUES(`option_name`),
				`option_value` = VALUES(`option_value`)";

	// If $stmt for regular options
	if ($stmt1 = $conn->prepare($sql1)) {

		// Bind params
		$stmt1->bind_param("ssss", $header_type_label, $header_type, $homepage_layout_label, $homepage_layout);

		// Set param variables
		$header_type_label = 'option_header';
		$header_type = $_POST['header-type'];

		$homepage_layout_label = 'option_layout';
		$homepage_layout = $_POST['homepage-layout'];

		// Execute
		$stmt1->execute();

		// Close $stmt		
		$stmt1->close();

	} else {
		echo 'SQL Failed.';
	}

	/*
	 * Insert Homepage Option
	 *
	 */

	// Find and remove 'homepage' value of `page_special`
	// SQL
	$sql2 = "UPDATE `pages` SET `page_special` = ? WHERE `page_special` = ?"; 

	// If $stmt3 using $sql2
	if ($stmt2 = $conn->prepare($sql2)) {

		// Bind paramaters
		$stmt2->bind_param("ss", $page_special_blank, $page_special);

		// Set variable paramaters
		$page_special_blank = '';
		$page_special = 'homepage';

		// Execute
		$stmt2->execute();

		$stmt2->close();

	} else {
		echo 'MySQL2 Failed.';
	}

	/*
	 * Insert new 'homepage' into `page_special`
	 *
	 */

	// SQL for homepage
	$sql3 = "UPDATE `pages` SET `page_special` = ? WHERE `page_title` = ?";

	// If $stmt3 using $sql3
	if ($stmt3 = $conn->prepare($sql3)) {

		// Bind paramaters
		$stmt3->bind_param("ss", $home_label, $homepage);

		// Set variable paramaters
		$home_label = 'homepage';
		$homepage = $_POST['homepage'];

		$stmt3->execute();

		$stmt3->close();

	} else {
		echo 'MySQL3 Failed.';
	}
	
	// Close connection
	$conn->close();

	// Redirect
	header('Refresh: 1; URL=http://wonderjarcreative.com/wj-admin/index.php?page=options');
	
} else {

	/*
	 * @function option_generals
	 * 
	 * FROM: /functions.php:240
	 */

	// Load up option_generals() variables for setting form
	// Options: $option_header_type, $option_layout
	option_generals();

	// Output opening HTML
	wj_before_content($type = 'main-section');

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
						<option value="relative" <?php if ($option_header_type === 'relative') echo 'selected';  ?>>Relative</option>
						<option value="fixed-header" <?php if ($option_header_type === 'fixed-header') echo 'selected';  ?>>Fixed</option>
					</select>
				</div>
				<div class="form-group">
					<label class="label-left" for="homepage-layout">Homepage layout style:</label>
					<select name="homepage-layout" id="homepage-layout">
						<option value=""></option>
						<option value="single" <?php if ($option_layout === 'single') echo 'selected'; ?>>Single Page</option>
						<option value="sections" <?php if ($option_layout === 'sections') echo 'selected'; ?>>Sections</option>
					</select>
				</div>
				<div class="form-group">
					<label class="label-left" for="homepage">Homepage:</label>
					<select name="homepage" id="homepage">
						<option value=""></option>
						<?php 
						/*
						 * @function select_pages()
						 * from: /functions.php:238
						 */

							option_pages();
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
wj_after_content($type = 'main-section');

// Endif
}

?>