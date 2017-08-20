<?php
/**
 * Scroll Text Plugin Part - Edit
 * @author Matt
 * @category admin, plugin, plugin-part
 * @version 1.0
 * @since 2017-06-10
 *
 * @returned @vars in use: $plugin_id, $plugin_name, $plugin_url, $plugin_dir, $dir
 */


// form submission
if (!empty($_POST['edit-scroll'])):
	add_new_scroll($dir, $plugin_dir);
	header("Location: " . $dir . "/scroll-text-admin.php?plug_id=" . $plugin_id . "&type=edit&slug=" . $_POST['scroll-slug']);

endif;

if (!empty($_GET['slug'])):

	// delete scroll item
	if (!empty($_GET['delete'])):
		delete_scroll_item();
	endif;
	
	$slug = $_GET['slug'];
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
								<input type="text" name="scroll-title" id="scroll-title" value="<?php echo $scroll['title']; ?>">
							</div>
							<div class="form-group">
								<label class="label-top" for="scroll-slug">Scroll Text Slider Slug:</label>
								<input type="text" name="scroll-slug" id="scroll-slug" value="<?php echo $scroll['slug']; ?>">
							</div>
							<div class="form-group">
								<label class="label-top" for="scroll-order">Order Number:</label>
								<input type="text" name="scroll-order" id="scroll-order" value="<?php echo $scroll['order']; ?>">
							</div>
						</fieldset>

						<?php get_scroll_text_fields($scroll['content'], $plugin_url, $plugin_dir); ?>

						<?php
							if (!empty($_GET['action'])):

								if ($_GET['action'] == 'add-scroll-field'):

									include($plugin_dir . '/plugin-parts/admin-add-field.php');
								endif;
							endif; 
						?>

						<div class="submit-group">
							<button class="add-scroll-field">
								<a href="<?php echo $plugin_url . '&type=edit&slug=' . $slug . '&action=add-scroll-field'; ?>">Add additional field</a>
							</button>
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