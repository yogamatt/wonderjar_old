<?php
/**
 * Wonderjar Admin Template Part - New Plugin
 * @author Matt
 * @category admin, template-part
 * @version 1.0
 * @since 2017-06-06
 *
 */


// pre-post action
if (!empty($_POST['submit'])):

	submit_plugin();
	header("Location: http://wonderjarcreative.com/wj-admin/index.php?page=plugins");

else:

	// output opening html
	wj_before_content($type = 'plain-section');

	?>


		<div class="new-plugin-container">
			<header class="admin-header">
				<h2>New Plugin</h2>
			</header>
			<div class="form-contain">
				<form id="new-plugin-form" method="post">
					<div class="inner-form">
						<div class="inner-left">
							<fieldset>
								<div class="form-group">
									<label class="label-top" for="plugin-name">Plugin Name:</label>
									<input type="text" name="plugin-name" id="plugin-name">
								</div>
								<div class="form-group">
									<label class-"label-top" for="plugin-url">Plugin Admin File:</label>
									<input type="file" name="plugin-url" id="plugin-url">
								</div>
								<div class="form-group">
									<label class="label-top" for="plugin-description">Plugin Description:</label>
									<textarea rows="6" cols="100" name="plugin-description" id="plugin-description"></textarea>
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

	// output closing html
	wj_after_content($type = 'plain-section');


endif;