<?php
/**
 * Scroll Text Plugin Part - Main Admin Layout
 * @author Matt
 * @category admin, plugin, plugin-part
 * @version 1.0
 * @since 2017-06-10
 *
 * @returned @vars in use: $plugin_id, $plugin_name, $plugin_dir, $dir, 
 *			$fc_id, $fc_order, $fc_title, $fc_image, $fc_excrept, $fc_content,
 *			$fc_option_leading
 */



// start bodyclass
global $bodyclass;
$bodyclass = 'wj-admin plugin scroll-text-plugin ';

// get header
include ($_SERVER['DOCUMENT_ROOT'] . '/wj-admin/header.php');

?>

<?php wj_before_content($type = 'plain-section'); ?>

		
		<div class="scroll-container">
			<header class="admin-header">
				<h2><?php echo $plugin_name; ?></h2>
			</header>

			<div class="scroll-buttons">
				<button class="wj-admin"><a href="<?php echo $plugin_url . '&type=new'; ?>">New Scroll Feature</a></button>
			</div>

			<div class="scroll-content">

				<?php get_scroll_list(); ?>

			</div>

		</div>


<?php wj_after_content($type = 'plain-section'); ?>

<?php

// get footer
include ($_SERVER['DOCUMENT_ROOT'] . '/footer.php');
