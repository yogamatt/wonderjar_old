<?php

/**
 * Wonderjar Admin New Page Template
 * @author Matt
 * @category admin, template
 * @version 1.0
 * @since 2017-03-17
 *
 */

// Returning with variables?
if (isset($_POST['submit'])) {

	// Connect to database
	wj_connect();

	// SQL
	$stmt = $conn->prepare("INSERT INTO `pages` (`page_title`, `page_content`) VALUES (?,?) ON DUPLICATE KEY UPDATE `page_title` = VALUES(`page_title`), `page_content` = VALUES(`page_content`);");
	$stmt->bind_param("ss", $page_title, $page_content);

	// Set parameters and execute
	$page_title = $_POST['page-title'];
	$page_content = $_POST['page-content'];

	// Execute statement
	$stmt->execute();
	
	$stmt->close();
	$conn->close();

	?>

	<div class="form-contain">
		<div class="page-submitted">
			<span>Page Submitted</span>
		</div>
		<form name="new-post" method="post" action="/wj-admin/index.php?page=page">
			<fieldset>
				<div class="form-group">
					<label class="label-top" for="page-title">New page title:</label>
					<input type="text" name="page-title" id="page-title" value="<?php echo $page_title; ?>">
				</div>
			</fieldset>
			<fieldset>
				<div class="form-group">
					<label class-"label-top" for="page-content">New page content:</label>
					<textarea rows="20" cols="100" name="page-content" id="page-content"><?php echo $page_content; ?>
					</textarea>
				</div>
			</fieldset>
			<fieldset class="submit-group">
				<input type="submit" name="submit" value="submit">
			</fieldset>
		</form>
	</div>

	<?php

} else if (!isset($_GET['p_id'])) {


	echo 'p_id';


} else {

	// New page template
	?>

	<div class="form-contain">
		<form name="new-post" method="post" action="/wj-admin/index.php?page=page">
			<fieldset>
				<div class="form-group">
					<label class="label-top" for="page-title">New page title:</label>
					<input type="text" name="page-title" id="page-title">
				</div>
			</fieldset>
			<fieldset>
				<div class="form-group">
					<label class-"label-top" for="page-content">New page content:</label>
					<textarea rows="20" cols="100" name="page-content" id="page-content" placeholder="Content goes here..">
					</textarea>
				</div>
			</fieldset>
			<fieldset class="submit-group">
				<input type="submit" name="submit" value="submit">
			</fieldset>
		</form>
	</div>




<?php

// Endif
}