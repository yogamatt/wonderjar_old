<?php
/**
 * Features Plugin Part - New
 * @author Matt
 * @category admin, plugin, plugin-part
 * @version 1.0
 * @since 2017-06-10
 *
 */


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
			<h2>New Feature</h2>
		</header>

		<div class="form-contain">
			<form id="new-feature-form" method="post">
				<div class="inner-form">
					<div class="group-container">
						<div class="form-group">
							<label class="label-top" for="feature-title">Feature Title:</label>
							<input type="text" name="feature-title" id="feature-title">
						</div>
						<div class="form-group">
							<label class="label-top" for="feature-order">Order Number:</label>
							<input type="text" name="feature-order" id="feature-order">
						</div>
						<div class="form-group">
							<label class="label-top" for="feature-image">Image:</label>
							<select name="feature-image" id="feature-image">
								<option value=""></option>
								<option value="thinking.png">Thinking</option>
								<option value="retool.png">Retool</option>
								<option value="project.png">Project</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="label-top" for="feature-excerpt">Excerpt:</label>
						<textarea rows="5" cols="50" name="feature-excerpt" id="feature-excerpt"></textarea>
					</div>
					<div class="form-group">
						<label class="label-top" for="feature-content">Content:</label>
						<textarea rows="15" cols="50" name="feature-content" id="feature-content"></textarea>
					</div>
					<div class="submit-group">
						<input type="submit" name="new-feature" value="submit">
					</div>
				</div>
			</form>
		</div>
	</div>

<?php wj_after_content($type = 'main-section'); ?>

<?php

// get footer
include ($_SERVER['DOCUMENT_ROOT'] . '/footer.php');