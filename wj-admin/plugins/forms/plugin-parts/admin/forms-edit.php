<?php
/**
 * Forms Plugin Part - New
 * @author Matt
 * @category admin, plugin, plugin-part
 * @version 1.0
 * @since 2017-07-18
 *
 */



// pre-post action
if (!empty($_POST['submit'])):
	
	edit_form();

endif;


$bodyclass = 'wj-admin forms ';

// include header
include ($_SERVER['DOCUMENT_ROOT'] . '/wj-admin/header.php'); ?>


<?php wj_before_content($type = 'plain-section'); ?>

	<div class="forms-container">	
		<header class="admin-header">
			<div class="forms-nav">
				<a href="<?php echo $plugin_url; ?>">Back to forms</a>
			</div>
			<h2>Edit Form</h2>
		</header>
		<form name="new-form" method="post">
			<div class="inner-form">
				<div class="inner-left">
					<fieldset>
						<div class="form-group">
							<label class="label-top" for="form-name">Form Name:</label>
							<input type="text" name="form-name" id="form-name" value="<?php echo get_form_constants()['name']; ?>">
						</div>
						<div class="form-group">
							<label class="label-top" for="form-slug">Form Slug:</label>
							<input type="text" name="form-slug" id="form-slug" value="<?php echo get_form_constants()['slug']; ?>">
						</div>
						<div class="form-group">
							<label class="label-top" for="form-description">Form Description:</label>
							<textarea rows="4" cols="100" name="form-description" id="form-description"><?php echo get_form_constants()['description']; ?></textarea>
						</div>
						<div class="form-group">
							<label class="label-top" for="form-markup">Form Markup:</label>
							<textarea rows="8" cols="100" name="form-markup" id="form-markup"><?php echo get_form_constants()['markup']; ?></textarea>
						</div>
					</fieldset>
				</div>
				<?php wj_sidebar('form-plugin'); ?>
			</div>
			<fieldset class="submit-group">
				<input type="hidden" name="form-id" id="form-id" value="<?php echo get_form_constants()['id']; ?>">
				<input type="submit" name="submit" value="submit">
			</fieldset>
		</form>
	</div>

<?php wj_after_content($type = 'plain-section'); ?>


<?php

// include footer
include ($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>