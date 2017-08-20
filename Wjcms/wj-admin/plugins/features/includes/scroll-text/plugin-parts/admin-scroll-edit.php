<?php
/**
 * Scroll Text Plugin Part - Edit
 * @author Matt
 * @category admin, plugin, plugin-part
 * @version 1.0
 * @since 2017-06-10
 *
 * @returned @vars in use: $plugin_id, $plugin_name, $plugin_dir, $dir
 */


if (!empty($_POST['edit-scroll'])):
	edit_scroll();
elseif (!empty($_GET['slug'])):

	return_scroll();

	// start bodyclass
	global $bodyclass;
	$bodyclass = 'wj-admin plugin scroll-text-plugin scroll-text-plugin-edit ';

	// get header
	include ($_SERVER['DOCUMENT_ROOT'] . '/wj-admin/header.php');

	?>

	<?php wj_before_content($type = 'main-section'); ?>

		<div class="scroll-container">
			<header class="admin-header">
				<div class="scroll-nav">
					<a href="<?php echo $plugin_url; ?>">Back to Scroll Text Plugin</a>
				</div>
				<h2>Edit Scroll Text</h2>
			</header>

			<div class="form-contain">
				<form id="edit-scroll-form" method="post">
					<div class="inner-form">
						<fieldset class="group-container">
							<div class="form-group">
								<label class="label-top" for="scroll-title">Scroll Text Slider Title:</label>
								<input type="text" name="scroll-title" id="scroll-title" placeholder="<?php echo $scroll['title']; ?>">
							</div>
							<div class="form-group">
								<label class="label-top" for="scroll-slug">Scroll Text Slider Slug:</label>
								<input type="text" name="scroll-slug" id="scroll-slug" placeholder="<?php echo $scroll['slug']; ?>">
							</div>
							<div class="form-group">
								<label class="label-top" for="scroll-order">Order Number:</label>
								<input type="text" name="scroll-order" id="scroll-order" placeholder="<?php echo $scroll['order']; ?>">
							</div>
						</fieldset>

						<?php get_scroll_text_fields($scroll['content'], $plugin_dir); ?>

						<div class="submit-group">
							<input type="submit" name="edit-scroll" value="submit">
						</div>
					</div>
				</form>
			</div>
		</div>

	<?php wj_after_content($type = 'main-section'); ?>

	<?php

	// get footer
	include ($_SERVER['DOCUMENT_ROOT'] . '/footer.php');

else: 

	echo 'No Scroll Loaded.';


endif;