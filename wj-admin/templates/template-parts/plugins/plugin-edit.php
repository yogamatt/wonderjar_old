<?php
/**
 * Wonderjar Admin Template Part - Edit Plugin
 * @author Matt
 * @category admin, template-part
 * @version 1.0
 * @since 2017-06-06
 *
 */


// pre-post actions
// notes: @function return_plugin() returns $plugin_id, $plugin_name, $plugin_dir, $plugin_url, $plugin_description
if (!empty($_POST['submit'])):
	
	update_plugin();

else:

	return_plugin();

	?>

	<?php wj_before_content($type = 'plain-section'); ?>

		<div class="new-page-container">
			<header class="admin-header">
				<h2>Edit Plugin</h2>
				<h4><?php echo $plugin_name; ?></h4>
			</header>
			<div class="form-contain">
				<form id="new-plugin-form" method="post">
					<div class="inner-form">
						<div class="inner-left">
							<fieldset>
								<div class="form-group">
									<label class="label-top" for="plugin-name">Plugin Name:</label>
									<input type="text" name="plugin-name" id="plugin-name" value="<?php echo $plugin_name; ?>">
								</div>
								<div class="form-group">
									<label class-"label-top" for="plugin-url">Plugin Admin File:</label>
									<input type="text" name="plugin-url" id="plugin-url" value="<?php echo $plugin_url; ?>" readonly>
								</div>
								<div class="form-group">
									<label class="label-top" for="plugin-description">Plugin Description:</label>
									<textarea rows="6" cols="100" name="plugin-description" id="plugin-description"><?php echo $plugin_description; ?></textarea>
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



	<?php wj_after_content($type = 'plain-section'); ?>

<?php endif; ?>