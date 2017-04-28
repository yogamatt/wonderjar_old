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


	$sql = "INSERT INTO `pages` (`page_title`, `page_content`, `page_special`) VALUES (?,?,?)";
		
	if ($stmt = $conn->prepare($sql)) {

		// Bind params
		$stmt->bind_param("sss", $page_title, $page_content, $page_special);

		// Set parameters
		$page_title = $_POST['page-title'];
		$page_content = $_POST['page-content'];
		$page_special = '';

		// Execute statement
		$stmt->execute();
		
		// Close statement
		$stmt->close();
		
		// Close db connection
		$conn->close();
	}

	// Output opening HTML
	wj_before_content($type = 'banner-section');

	?>

	<div class="new-page-container">
		<header class="admin-header">
			<h2>Page submitted.</h2>
		</header>
		<div class="new-page">
			<form name="new-page-form" method="post" action="/wj-admin/index.php?page=new-page">
				<div class="page-form">
					<div class="page-left">
						<fieldset>
							<div class="form-group">
								<label class="label-top" for="page-title">New Page Title:</label>
								<input type="text" name="page-title" id="page-title" value="<?php echo $page_title; ?>">
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
	wj_after_content($type = 'banner-section');

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

			} else {

				echo 'noworky ' . $action . 'y'; 
			
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
			$stmt->bind_result($page_id, $page_time, $page_special, $page_title, $page_content);

			// Fetch values
			$stmt->fetch();

			$stmt->close();
		}

		// Close database connection
		$conn->close();

		// Output opening HTML
		wj_before_content($type = 'banner-section');

	?>

		<div class="new-page-container">
			<header class="admin-header">
				<h2>Page Review</h2>
			</header>
			<div class="new-page">
				<form name="update-page-form" method="post" action="/wj-admin/index.php?page=new-page&p_id=<?php echo $pid; ?>">
					<div class="page-form">
						<div class="page-left">	
							<fieldset>
								<div class="form-group">
									<label class="label-top" for="page-title">Page Title:</label>
									<input type="text" name="page-title" id="page-title" value="<?php echo $page_title; ?>">
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

	<?php

	// Output closing HTML
	wj_after_content($type = 'banner-section');

	}

// No Variables
} else {

	// Output opening HTML
	wj_before_content($type = 'banner-section');

	// New page template
	?>

	<div class="new-page-container">
		<header class="admin-header">
			<h2>New Post</h2>
		</header>
		<div class="new-page">
			<form name="new-post-form" method="post" action="/wj-admin/index.php?page=new-page">
				<div class="page-form">
					<div class="page-left">
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
	wj_after_content($type = 'banner-section');

// Endif
}