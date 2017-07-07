<?php
/**
 * Features Plugin Part - Single
 * @author Matt
 * @category admin, plugin, plugin-part
 * @version 1.0
 * @since 2017-06-13
 *
 */


// return feature
return_feature();


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
			<h2>Edit Feature</h2>
		</header>

		<div class="form-contain">
			<form id="new-feature-form" method="post">
				<div class="inner-form">
					<div class="group-container">
						<div class="form-group">
							<label class="label-top" for="feature-title">Feature Title:</label>
							<input type="text" name="feature-title" id="feature-title" value="<?php echo $feat_title; ?>">
						</div>
						<div class="form-group">
							<label class="label-top" for="feature-order">Order Number:</label>
							<input type="text" name="feature-order" id="feature-order" value="<?php echo $feat_order; ?>">
						</div>
						<div class="form-group">
							<label class="label-top" for="feature-image">Image:</label>
							<select name="feature-image" id="feature-image">
								<option value=""></option>
								<option value="thinking.png" <?php if ($feat_image == 'thinking.png') echo 'selected'; ?>>Thinking</option>
								<option value="retool.png" <?php if ($feat_image == 'retool.png') echo 'selected'; ?>>Retool</option>
								<option value="project.png" <?php if ($feat_image == 'project.png') echo 'selected'; ?>>Project</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="label-top" for="feature-excerpt">Excerpt:</label>
						<textarea rows="5" cols="50" name="feature-excerpt" id="feature-excerpt"><?php echo $feat_excerpt; ?></textarea>
					</div>
					<div class="form-group">
						<label class="label-top" for="feature-content">Content:</label>
						<textarea rows="15" cols="50" name="feature-content" id="feature-content"><?php echo $feat_content; ?></textarea>
					</div>
					<div class="submit-group">
						<input type="submit" name="edit-feature" value="submit">
					</div>
				</div>
			</form>
		</div>
	</div>

<?php wj_after_content($type = 'main-section'); ?>

<?php

// get footer
include ($_SERVER['DOCUMENT_ROOT'] . '/footer.php');