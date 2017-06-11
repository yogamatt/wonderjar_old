<?php
/**
 * Wonderjar Admin Template-Part - New-Page
 * @author Matt
 * @category admin, template-part
 * @version 1.0
 * @since 2017-06-06
 *
 */

	// Output opening HTML
	wj_before_content($type = 'plain-section');

	// New page template
	?>

	<div class="new-page-container">
		<header class="admin-header">
			<h2>New Post</h2>
		</header>
		<div class="form-contain">
			<form id="new-post-form" method="post">
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