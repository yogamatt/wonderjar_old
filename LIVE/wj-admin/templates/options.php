<?php

/**
 * Wonderjar Admin Options Template
 * @author Matt
 * @category admin, template
 * @version 1.0
 * @since 2017-03-17
 *
 */


// Returning with variables?
if (isset($_POST['header-type'])) {

	// Include functions
	require ($_SERVER['DOCUMENT_ROOT'].'/functions.php');

	// Connect to database
	wj_connect();

	// Initial variables
	$header_type = $_POST['header-type'];
	$homepage = $_POST['homepage'];
	$homepage_layout_style = $_POST['homepage-layout-style'];

	// SQL Query
	$sql = "INSERT INTO `options` (`option_name`,`option_value`) VALUES ('option_header','$header_type'),('option_homepage_layout_style','$homepage_layout_style'),('option_homepage','$homepage') ON DUPLICATE KEY UPDATE `option_name` = VALUES(`option_name`), `option_value` = VALUES(`option_value`); ";
	

	if (!$conn->query($sql) == TRUE) {
		echo "Error: " . $sql . "<br>" . $conn->error;
	} else {
	    echo '<div class="main-content">New record created successfully</div>';	
	    header('Refresh: 1; URL=http://wonderjarcreative.com/wj-admin/index.php?page=options');
	}
	
	// Close connection
	$conn->close();
	
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
					<label class="label-left" for="homepage">Homepage:</label>
					<input type="text" name="homepage" id="homepage">
				</div>
				<div class="form-group">
					<label class="label-left" for="homepage-layout-style">Homepage layout style:</label>
					<select name="homepage-layout-style" id="homepage-layout-style">
						<option value=""></option>
						<option value="single">Single Page</option>
						<option value="sections">Sections</option>
					</select>
				</div>
			</fieldset>
			<input type="submit" value="Submit">
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