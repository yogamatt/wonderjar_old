<?php
/**
 * Wonderjar Admin Template Part - Options Layout
 * @author Matt
 * @category admin, template-part
 * @version 1.0
 * @since 2017-06-06
 *
 */

if (!empty($_POST['submit'])):

	echo 'submit!';
	submit_options();

endif;

// load up option_generals() variables for setting form
// options: $option_header_type, $option_layout
option_generals();

// output opening html
wj_before_content($type = 'main-section');

	?>

	<header class="admin-header">
		<h2>Global Options</h2>
	</header>

	<div class="options-container">
		<div class="form-contain">
			<form name="admin-options" method="post">
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
							 * @function option_pages()
							 * from: /functions.php:1049
							 */

								option_pages();
							?>
						</select>	
					</div>
				</fieldset>
				<input type="submit" name="submit" value="Submit">
			</form>
		</div>
		<?php wj_sidebar($type = 'options'); ?>
	</div>

	<div class="current-options">
		
		<?php

			// connect to database
			wj_connect();

			if ($stmt = $conn->prepare("SELECT `option_type`,`option_name`,`option_value` FROM `options` ORDER BY `id`")) {
			
				$stmt->execute();

				// get result and bind it
				$stmt->bind_result($option_type, $option_name, $option_value);
				
				// while loop
				while ($stmt->fetch()) {
					echo '<p>' . $option_name . ': ' . $option_value . '</p>';
				}

			} else {
				echo 'SQL Failed';
			}

			$stmt->close();
			$conn->close();

		?>

	</div>

<?php

// output closing html
wj_after_content($type = 'main-section');

