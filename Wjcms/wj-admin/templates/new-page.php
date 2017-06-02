<?php
/**
 * Wonderjar Admin New Page Template
 * @author Matt
 * @category admin, template
 * @version 1.0
 * @since 2017-03-17
 *
 */


// Is it an update?
if (isset($_POST['update'])) {

	// Connect to database
	wj_connect();

	// Page id variable
	$pid = $_GET['p_id'];

	// SQL
	$sql = "UPDATE `pages` SET `page_title` = ?, `page_content` = ? WHERE `page_id` = '$pid'";

	if ($stmt = $conn->prepare($sql)) {
			
		$stmt->bind_param("ss", $page_title, $page_content);

		// Set variables to execute
		$page_title = $_POST['page-title'];
		$page_content = $_POST['page-content'];

		$stmt->execute();

		$stmt->close();

		$conn->close();
	}
	header("Location: http://wonderjarcreative.com/wj-admin/index.php?page=new-page&p_id=" . $pid . "");

// Is this a submittal?
} else if (isset($_POST['submit'])) {

	// Connect to database
	wj_connect();


	$sql = "INSERT INTO `pages` (`page_title`, `page_content`, `page_special`, `page_permalink`) VALUES (?,?,?,?)";
		
	if ($stmt = $conn->prepare($sql)) {

		// Bind params
		$stmt->bind_param("ssss", $page_title, $page_content, $page_special, $page_permalink);

		// Set parameters
		$page_title = $_POST['page-title'];
		$page_content = $_POST['page-content'];
		$page_special = '';
		$page_permalink = '';

		$stmt->execute();

	}
	
	$stmt->close();
		
	
	// Unset sql vars
	unset($stmt, $sql);

	$sql = "SELECT `page_id` FROM `pages` WHERE `page_title` = ?";

	if ($stmt = $conn->prepare($sql)) {

		// Bind param page title, set above
		$stmt->bind_param("s", $page_title);

		$stmt->execute();

		$stmt->bind_result($page_id);

		$stmt->fetch();

	}

	$stmt->close();

	// Unset sql vars
	unset($stmt, $sql);

	$sql = "UPDATE `pages` SET `page_permalink` = ? WHERE `page_id` = ?";

	if ($stmt = $conn->prepare($sql)) {

		$stmt->bind_param("ss", $page_permalink, $param_id);

		$page_permalink = 'http://wonderjarcreative.com/index.php?p_id=' . $page_id;
		$param_id = $page_id;

		$stmt->execute();

	}

	// Close db connection
	$conn->close();

	// Output opening HTML
	wj_before_content($type = 'plain-section');

	?>

	<div class="new-page-container">
		<header class="admin-header">
			<h2>Page submitted.</h2>
		</header>
		<div class="form-contain">
			<form id="new-page-form" method="post" action="/wj-admin/index.php?page=new-page">
				<div class="inner-form">
					<div class="inner-left">
						<fieldset>
							<div class="form-group">
								<label class="label-top" for="page-title">New Page Title:</label>
								<input type="text" name="page-title" id="page-title" value="<?php echo $page_title; ?>">
							</div>
							<div class="form-group permagroup">
								<label class="label-top" for="page-permalink">Perma:</label>
								<input type="text" name="page-permalink" id="page-permalink" placeholder="<?php echo $page_permalink; ?>" value="<?php echo $page_permalink; ?>">
							</div>
							<div class="form-group">
								<label class-"label-top" for="page-content">New Page Content:</label>
								<textarea rows="20" cols="100" name="page-content" id="page-content"><?php echo $page_content; ?>
								</textarea>
							</div>
						</fieldset>
					</div>
					<?php wj_sidebar($type = 'new-page'); ?>
				</div>
				<fieldset class="submit-group">
					<input type="submit" name="submit" value="submit">
				</fieldset>
			</form>
		</div>
	</div>

	<?php

	// Output closing HTML
	wj_after_content($type = 'plain-section');

// No? Returning with the page id?
} else if (isset($_GET['p_id'])) {

	// Do you also
	// have an action?
	if (isset($_GET['action'])) {

		// Connect to database
		wj_connect();

		// Variables
		$pid = $_GET['p_id'];
		$action = $_GET['action'];

		if ($action = 'delete') {

			// SQL
			$sql = "DELETE FROM `pages` WHERE `page_id` = '$pid'";

			if ($stmt = $conn->prepare($sql)) {

				// Execute statement
				if ($stmt->execute()) {
					echo 'record id #' . $pid . ' deleted';
					header("Refresh:1; url=/wj-admin/index.php?page=pages");
				}

				$stmt->close();

			}

			$conn->close();

		}

	// No action?
	} else {

		// Connect to database
		wj_connect();

		// Page id variable
		$pid = $_GET['p_id'];

		// SQL
		$sql = "SELECT * FROM `pages` WHERE `page_id` = '$pid'";

		if ($stmt = $conn->prepare($sql)) {

			// Execute statement
			$stmt->execute();

			// Bind result variables
			$stmt->bind_result($page_id, $page_time, $page_special, $page_title, $page_content, $page_permalink);

			// Fetch values
			$stmt->fetch();

			$stmt->close();
		}

		// Close database connection
		$conn->close();

		// Output opening HTML
		wj_before_content($type = 'plain-section');

	?>

	<?php

		
		// Is it the homepage?
		// @function wj_homepage_id($h_id) returns true/false
		$h_id = $_GET['p_id'];

		if (wj_homepage_id($h_id)) {

			include ($_SERVER['DOCUMENT_ROOT'] . '/wj-admin/templates/new-homepage.php');

		} else {

		?>

			<div class="form-contain">
				<header class="admin-header">
					<h2>Page Review</h2>
				</header>
				<div class="new-page">
					<form id="update-page-form" method="post" action="/wj-admin/index.php?page=new-page&p_id=<?php echo $pid; ?>">
						<div class="inner-form">
							<div class="inner-left">	
								<fieldset>
									<div class="form-group">
										<label class="label-top" for="page-title">Page Title:</label>
										<input type="text" name="page-title" id="page-title" value="<?php echo $page_title; ?>">
									</div>
									<div class="form-group permagroup">
										<label class="label-top" for="page-permalink">Perma:</label>
										<input type="text" name="page-permalink" id="page-permalink" placeholder="<?php echo $page_permalink; ?>" value="<?php echo $page_permalink; ?>">
									</div>
									<div class="form-group">
										<label class-"label-top" for="page-content">Page Content:</label>
										<textarea rows="20" cols="100" name="page-content" id="page-content"><?php echo $page_content; ?>
										</textarea>
									</div>
								</fieldset>
							</div>
							<?php wj_sidebar($type = 'new-page'); ?>
						</div>
						<fieldset class="submit-group">
							<input type="submit" name="update" value="update">
						</fieldset>
					</form>
				</div>
			</div>

		<?php } ?>

	<?php

	// Output closing HTML
	wj_after_content($type = 'plain-section');

	}

// No Variables
} else {

	// Output opening HTML
	wj_before_content($type = 'plain-section');

	// New page template
	?>

	<div class="new-page-container">
		<header class="admin-header">
			<h2>New Post</h2>
		</header>
		<div class="form-contain">
			<form id="new-post-form" method="post" action="/wj-admin/index.php?page=new-page">
				<div class="inner-form">
					<div class="inner-left">
						<fieldset>
							<div class="form-group">
								<label class="label-top" for="page-title">New Page Title:</label>
								<input type="text" name="page-title" id="page-title">
							</div>
							<div class="form-group">
								<label class-"label-top" for="page-content">New Page Content:</label>
								<textarea rows="20" cols="100" name="page-content" id="page-content" placeholder="Content goes here..">
								</textarea>
							</div>
						</fieldset>
					</div>
					<?php wj_sidebar($type = 'new-page'); ?>
				</div>
				<fieldset class="submit-group">
					<input type="submit" name="submit" value="submit">
				</fieldset>
			</form>
		</div>
	</div>

	<?php

	// Output closing HTML
	wj_after_content($type = 'plain-section');

// Endif
}