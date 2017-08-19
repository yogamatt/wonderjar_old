<?php
/**
 * Features Plugin Part - Layout
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

<?php wj_before_content($type = 'plain-section'); ?>

		
		<div class="features-container">
			<header class="admin-header">
				<h2><?php echo $plugin_name; ?></h2>
			</header>

			<div class="features-buttons">
				<button class="wj-admin"><a href="<?php echo $plugin_url . '&type=new'; ?>">New Feature</a></button>
				<button class="wj-admin"><a href="<?php echo $plugin_url . '&type=options'; ?>">Feature Options</a></button>
			</div>

			<div class="features-content">

				<?php return_features($dir, $plugin_id); ?>

			</div>

		</div>


<?php wj_after_content($type = 'plain-section'); ?>

<?php

// get footer
include ($_SERVER['DOCUMENT_ROOT'] . '/footer.php');
