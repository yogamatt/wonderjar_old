<?php
/**
 * Features Plugin Part - Options
 * @author Matt
 * @category admin, plugin, plugin-part
 * @version 1.0
 * @since 2017-08-5
 *
 */


// return features options
return_feature_options();

// start bodyclass
global $bodyclass;
$bodyclass = 'wj-admin plugin features-plugin ';

// get header
include ($_SERVER['DOCUMENT_ROOT'] . '/wj-admin/header.php');

?>

<?php wj_before_content($type = 'main-section'); ?>

	<div class="features-container">
		<header class="admin-header">
			<div class="features-nav">
				<a href="<?php echo $plugin_url; ?>">Back to features</a>
			</div>
			<h2>Feature Options</h2>
		</header>

		<div class="form-contain">
			<form id="feature-options-form" method="post">
				<div class="inner-form">
					<div class="form-group">
						<label class="label-top" for="feature-leading">Leading Text:</label>
						<textarea rows="5" cols="50" name="feature-leading" id="feature-leading"><?php echo $feature_options['leading']; ?></textarea>
					</div>
					<div class="submit-group">
						<input type="submit" name="options" value="submit">
					</div>
				</div>
			</form>
		</div>
	</div>

<?php wj_after_content($type = 'main-section'); ?>

<?php 
// get footer
include ($_SERVER['DOCUMENT_ROOT'] . '/footer.php');



