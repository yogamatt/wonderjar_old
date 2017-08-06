<?php
/**
 * Forms Plugin Part - Layout
 * @author Matt
 * @category admin, plugin, plugin-part
 * @version 1.0
 * @since 2017-07-18
 *
 */



$bodyclass = 'wj-admin plugin-forms ';

// include header
include ($_SERVER['DOCUMENT_ROOT'] . '/wj-admin/header.php'); ?>


<?php wj_before_content($type = 'plain-section'); ?>

		
	<div class="forms-container">
		<header class="admin-header">
			<h2><?php echo $plugin_name; ?></h2>
		</header>

		<div class="forms-buttons">
			<button class="wj-admin"><a href="<?php echo $plugin_url . '&type=new'; ?>">New Form</a></button>
		</div>

		<div class="forms-content">

			<?php forms_list($dir, $plugin_id, $plugin_url); ?>

		</div>

	</div>


<?php wj_after_content($type = 'plain-section'); ?>



<?php

// include footer
include ($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>